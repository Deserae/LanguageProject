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

        // Create variable in view
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

        // Execute
        $results = db::execute($sql);

        $listing = new Listing();

        $post_html = '';
        while ($row = $results->fetch_assoc()) {
            //$href = 'post.php?lang_id=' .$lang_id. '&category_id=' .$row['category_id'];
            $href = 'post.php?&post_id=' .$row['post_id'] . '&lang_id=' . $lang_id .'&category_id=' . $category_id;

            $post_html .= $listing->get($href, $row['post_name']);
        }

        $this->view->post_html = $post_html;



    }

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<main>
    
    <h2>
        <div>
            <div><?php echo $lang_name; ?> > <?php echo $category_name; ?> 
                <a href="/myProject/createPost.php?lang_id=<?php echo $lang_id; ?>&category_id=<?php echo $category_id; ?>">+ New Entry</a>
            </div>  
        </div>
    </h2>

    <div class="allPosts">

        <?php echo $post_html; ?>
        
<!--<div class="listing post">
        <div class="voteNum"></div>
        <div class="subInfo">
            <a href="post.php">Post</a>
        </div>
    </div>
 -->  

        
    </div>  <!-- end of .allPosts  -->

</main>
