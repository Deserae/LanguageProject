<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/myProject/app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        $lang_id = $_GET['lang_id'];
        $lang = new Lang($lang_id);

        $category_id = $_GET['category_id'];
        $category = new category($category_id);

        // Create welcome variable in view
        $this->view->lang_name = $lang->lang_name;
        $this->view->lang_id = $lang_id;

        $this->view->category_name = $category->category_name;
        $this->view->category_id = $category_id;

        // SQL
        $sql = "
            SELECT *
            FROM post
            WHERE category_id = '{$category_id}' AND lang_id = '{$lang_id}'
            ";
    }

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<main>
    
    <h2>Create a new Post</h2>
    <h2><?php echo $lang_name; ?> > <?php echo $category_name; ?></h2>

    <ul class="notice"></ul>

    <form class="reptile-form" action="process_post.php">
        
        <input type="text" name="post_name" title="Post" required>

        <div class="field-input" data-name="content" data-custom-validation="validateContent">
             <textarea>Your content here.</textarea>
        </div>

        <button type="submit">Submit</button>
    </form>

</main>