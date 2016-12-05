<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


use Windwalker\Renderer\BladeRenderer;

/**
 * Class MY_Loader
 *
 * Extending the Default CI Loader Class
 */
class MY_Loader extends CI_Loader {

    /**
     * MY_Loader constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $view
     * @param array $parameters
     * @return string
     *
     * Extended Loader class to have a new function to generate blade template files
     * You may load a blade template by "$this->load->blade('view_file', $data)"
     *
     * For full documentation of Blade see : https://laravel.com/docs/5.1/blade
     *
     * NOTE : All blade template files must have an extension of ".blade.php" and must be placed
     * in the "views/blade". You can configure this from "config/blade.php"
     *
     */
    public function blade($view, array $parameters = array(), $return = false)
    {
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
