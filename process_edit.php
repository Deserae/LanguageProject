<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/myProject/app/core/initialize.php');

// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        // send the $_POST data to the database

        $post_id = $_POST['post_id'];
        $post = new Post($post_id);

        $post->content = $_POST['updatedContent'];
        $post->name = $_POST['post_name'];

        $post->update();

    }

}
$controller = new Controller();