<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/myProject/app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        $lang_id = $_GET['lang_id'];
        $lang = new Lang($lang_id);

        // Create variable in view
        $this->view->lang_name = $lang->lang_name;
        $this->view->lang_id = $lang_id;


        // SQL
        $sql = "
            SELECT *
            FROM category
            ";

        // Execute
        $results = db::execute($sql);

        $listing = new Listing();

        $listing_html = '';
        while ($row = $results->fetch_assoc()) {
            $href = 'category.php?lang_id=' .$lang_id. '&category_id=' .$row['category_id'];
            $listing_html .= $listing->get($href, $row['category_name']);
        }

        $this->view->listing_html = $listing_html;
  


    }

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<main>
    <h2>
        <div>
            <?php echo $lang_name; ?>
        </div>
    </h2>

    <div class="categories">
        
    <?php echo $listing_html; ?>
        
    </div>  <!-- end of .categories  -->

</main>