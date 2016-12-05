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