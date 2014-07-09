<?php

/**
 * User
 */
class Lang extends Model {

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
            'lang_name' => $input['lang_name']
        ];

        // Ensure values are encompased with quote marks
        $sql_values = db::array_in_quotes($sql_values);

        // Insert
        $results = db::insert('lang', $sql_values);
        
        // Get Recent Insert ID
        $lang_id = $results->insert_id;

        // Return a new instance of this user as an object
        return new Lang($lang_id);

    }

}