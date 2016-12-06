Steps to implement Eloquent in Codeigniter.

Step 1. your-project-folder/composer.json

add this under requirement.

"require": {
	"php": ">=5.2.4",
	"illuminate/database": "4.2.x",
	"windwalker/renderer": "2.*",
	"illuminate/html": "4.*",
	"illuminate/view": "4.*"
},


Step 2. open Terminal/cmd and write  composer install

Step 3. open config/autoload.php and update to 
$autoload['libraries'] = array('database');

Step 4. go into config/database.php here we creatre instance of capsule. 

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection(array(
    'driver'    => 'mysql',
    'host'      => $db['default']['hostname'],
    'database'  => $db['default']['database'],
    'username'  => $db['default']['username'],
   'password'  => $db['default']['password'],
   'charset'   => 'utf8',
   'collation' => 'utf8_unicode_ci',
   'prefix'    => $db['default']['dbprefix'],
)); 


Step 5. Make this Capsule instance available globally via static methods
$capsule->setAsGlobal();

Step 6. Setup the Eloquent ORM
$capsule->bootEloquent();

Now Eloquent is added to your Codeigniter Project.

Steps to add blade in your project.

Step 1. create My_Controller.php, My_Model.php, My_Loader.php inside the application/core.

Step 2. My_controller.php - add following content. 
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

Step 3. My_Loader.php - add following content. 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Windwalker\Renderer\BladeRenderer;

class MY_Loader extends CI_Loader {

	public function __construct(){
		parent :: __construct();
	}

	public function blade($view, array $parameters = array(), $return = false){
        $CI =& get_instance();
        $CI->config->load('blade', true);
        $renderer = new BladeRenderer(
            [$CI->config->item('views_path', 'blade')],
            ['cache_path'=>$CI->config->item('cache_path', 'blade')]
        );
        if(!$return)
            echo $renderer->render($view, $parameters);
        else
            return $renderer->render($view, $parameters);
    }
}

Step 4. My_Model.php - add following content. 
<?php

class MY_Model extends  CI_Model{

    protected $fields = [];

    protected  $tableName = '';

    private $exist = FALSE;

    /**
     * MY_Model constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->tableName = get_called_class().'s';
    }

    function __get($field) {
        return $this->fields[$field];
    }

    function __set($field, $value) {
        $this->fields[$field] = $value;
    }

    function __isset($field){
        return !empty($this->fields[ $field ]);
    }

    function __debugInfo() {
        return $this->fields;
    }

    public static function all(){
            
    }

    public function save(){
        if($this->exist)
            $this->update();
        else
            $this->insert();
    }

    private function update(){

    }

    private function insert(){

    }

}

Step 5. Create blade.php in application/config.

Step 6. add following content 
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * We are using Blade templating Engine to display our view
 *
 * For more details on blade templating view the documentation at :
 * https://laravel.com/docs/5.1/blade
 */

$config['views_path'] = APPPATH . 'views';
$config['cache_path'] = APPPATH . 'cache/blade';

Step 7. create folder inside the application/cache

Blade is implimented and now you can use it.
 
 
