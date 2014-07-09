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

        $post_id = $_GET['post_id'];
        $post = new Post($post_id);

        // Create welcome variable in view
        $this->view->lang_name = $lang->lang_name;
        $this->view->lang_id = $lang_id;

        $this->view->category_name = $category->category_name;
        $this->view->category_id = $category_id;

        $this->view->content = $post->content;
        $this->view->post_id = $post_id; 

        $this->view->post_name = $post->post_name;


        // SQL
        // $sql = "
        //     SELECT *
        //     FROM post
        //     WHERE post_id = '{$post_id}''
        //     ";

        //execute
        // $results = db::execute($sql);
        // $post=$results->fetch_assoc();

    }

}

$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<main>
    
    <h2>Edit Post</h2>
    <h2><?php echo $lang_name; ?> > <?php echo $category_name; ?> > <?php echo $post_name; ?></h2>

    <ul class="notice"></ul>

    <form class="reptile-form" action="process_edit.php">
        
        <input type="text" name="post_name" title="Post Name" value="<?php echo $post_name; ?>" required>

        <div class="field-input" data-name="content" data-custom-validation="validateContent">
             <textarea name="editor"><?php echo $content; ?></textarea>
        </div>
        <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
        <input type="hidden" name="updatedContent" id="updatedContent">
        <button type="submit" id="editButton">Submit</button>
    </form>

</main>