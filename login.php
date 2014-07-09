<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/myProject/app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        $lang_id = $_GET['lang_id'];
        $lang = new Lang($lang_id);

        // Create welcome variable in view
        $this->view->lang_name = $lang->lang_name;
        $this->view->lang_id = $lang_id;
    }

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<main>
    
    <h2>Login</h2>

    <ul class="notice"></ul>

       <form class="reptile-form" action="process_login.php">
        <input type="email" name="email" title="Email" required maxlength="100">
        <input type="password" name="password" title="Password" required>
        <button type="submit">Submit</button>

    <h2>Not a member yet? Join us!</h2>

    <ul class="notice"></ul>

    <form class="reptile-form" action="process_register.php">
        <input type="text" name="user_name" title="User Name" required>
        <input type="email" name="email" title="Email" required maxlength="100">
        <input type="password" name="password" title="Password" required>
        <input type="password" name="reenter_password" title="Re-Enter Password" required>
        <button type="submit">Submit</button>
    </form>

</main>