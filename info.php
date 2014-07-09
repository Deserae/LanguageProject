<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/myProject/app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        // Create welcome variable in view
        $this->view->welcome = 'Welcome to MVC';
    }

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<main>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet eros sed mauris viverra ullamcorper. In ornare mi in eleifend molestie. Suspendisse sed lorem ut turpis consequat gravida. Sed laoreet, mi vel volutpat vulputate, libero sapien egestas justo, at lobortis est lacus non nisl. Nunc a mollis metus. Proin lobortis mauris nulla, at rhoncus eros aliquet sed. Proin et bibendum justo. Morbi ut leo laoreet, posuere nulla non, tempor nisi. Aenean sed quam ornare diam porta accumsan. Maecenas et pretium magna. In viverra porttitor mi, id ultricies dui hendrerit in. Nunc vitae luctus felis, eget aliquet neque. Nulla vitae feugiat tellus.</p>
</main>
