<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
		  $cookie_enable = $this->config->item('referal_cookie_enable');
		if($cookie_enable==1){
			
		$base_url =  $this->config->item("base_url");
			$username = $_GET['username'];
			$cookie_name = "user";
			$cookie_value = $username;
			$controller = $this->router->fetch_class();
			$method = $this->router->fetch_method();
		 	$include_cookie = $this->config->item('include_cookie');
			$routes_data = $this->router->routes;
			//debug($routes_data);die;
			if(in_array($controller.'/'.$method ,$include_cookie) && !empty($username)){
			  setcookie($cookie_name, $cookie_value, time() + (10 * 365 * 24 * 60 * 60),'/', $_SERVER["SERVER_NAME"], 0);
			}
			
			if(empty($username) && in_array($controller.'/'.$method ,$include_cookie)){
				if(!empty($_COOKIE['user'])){
					$post_data = array_search($controller.'/'.$method,$routes_data);
				    //redirect($base_url.'/'.$controller.'/'.$method.'/?username='.$_COOKIE["user"]);
				    redirect($base_url.'/'.$post_data.'/?username='.$_COOKIE["user"]);
				}
			 }
		}
		
	}

	public static function &get_instance()
	{
		return self::$instance;
	}
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */