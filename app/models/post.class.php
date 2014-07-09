<?php

/**
 * Post
 */
class Post extends Model {

    /**
     * Insert User. Note that while normally the User class is used in object
     * context, when creating new users we must use the class in static context
     * since won't have the opportunity to create the new User without having
     * a user_id to pass in. 
     *
     * Example:
     * User::insert($values);
     */
    public static function insert($input) {

        // Note that Server Side validation is not being done here
        // and should be implemented by you


        // Prepare SQL Values
        $sql_values = [
            'post_name' => $input['post_name'],
            'content' => $input['content'],
            'user_id' => 1,
            'lang_id' => $input['lang_id'],
            'category_id' => $input['category_id']
        ];

        // Ensure values are encompased with quote marks
        $sql_values = db::array_in_quotes($sql_values);

        // Insert
        $results = db::insert('post', $sql_values);
        
        // Get Recent Insert ID
        $post_id = $results->insert_id;

        // Return a new instance of this user as an object
        return new Post($post_id);

    }


    public function update() {
        $update = "
            UPDATE post
            SET post_name = '{$this->post_name}' , content = '{$this->content}'
            WHERE post_id = {$this->post_id}
        ";

        db::execute($update);

    }


}                                                                                                                                                                                                                                                                                                      