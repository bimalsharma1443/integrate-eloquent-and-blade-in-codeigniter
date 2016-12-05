<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Class MY_Controller
 *
 * Using this class to Extend CI_Controller Class
 * All Other Controllers will extend this class
 * instead of extending the CI_Controller Class
 */

class MY_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }
}
