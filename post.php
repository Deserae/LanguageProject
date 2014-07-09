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


        // Create variable in view
        $this->view->lang_name = $lang->lang_name;
        $this->view->lang_id = $lang_id;

        $this->view->category_name = $category->category_name;
        $this->view->category_id = $category_id;

        $this->view->content = $post->content;
        $this->view->post_id = $post_id; 

        $this->view->post_name = $post->post_name;
    }

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<main>
    
    <h2>
        <div>
            <div> <?php echo $lang_name; ?> > <?php echo $category_name; ?> > <?php echo $post_name; ?>
                <a href="/myProject/editPost.php?lang_id=<?php echo $lang_id; ?>&post_id=<?php echo $post_id; ?>&category_id=<?php echo $category_id; ?>">+ Edit</a>
            </div>  
        </div>
    </h2>

    <div class="allPosts">
        <div class="singlePost">
        <?php echo html_entity_decode($content); ?>
        </div>
    </div>    

</main>