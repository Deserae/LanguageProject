<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/myProject/app/core/initialize.php');

// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        // send the $_POST data to the database

        // $post_id = $_POST['post_id'];
        // $post = new Post($post_id);

        // $post->content = $_POST['Content'];

        $params = array(
            "lang_id" => $_POST['lang_id'],
            "category_id" => $_POST['category_id'],
            "user_id" => 1,
            "content" => $_POST['newPost'],
            "post_name"=>$_POST['post_name']
            );
       

        // $result = array_merge($_POST, (array)$params);
        Post::insert($params);



        $this->view['message'] = 'Thanks for the submission!';

        // $this->view['redirect'] = '/myProject/index.php';
    }

}
$controller = new Controller();