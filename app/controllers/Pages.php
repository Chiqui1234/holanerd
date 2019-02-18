<?php
/* You have created a class named Pages, with a view method that accepts one argument named $page. The Pages class is extending the CI_Controller class.
This means that the new pages class can access the methods and variables defined in the CI_Controller class (system/core/Controller.php).

The controller is what will become the center of every request to your web application. In very technical CodeIgniter discussions, it may be referred to
as the super object. Like any php class, you refer to it within your controllers as $this. Referring to $this is how you will load libraries, views, and
generally command the framework.*/

class Pages extends CI_Controller {

    public function view($page = 'home') {
    if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
        // Whoops, we don't have a page for that!
        show_404();
    }

    $data['title'] = ucfirst($page); // Capitalize the first letter
    $this -> load -> helper('url');
    $this -> load -> view('templates/header', $data);
    $this -> load -> view('pages/'.$page, $data);
    $this -> load -> view('templates/sidebar', $data);
    $this -> load -> view('templates/footer', $data);
    }
}