<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function get_product_image($id=null)
	{
		$ci=& get_instance();
		$ci->load->model('home_model');
		return $product_image = $ci->home_model->get_product_image($id);
	}
	function get_product_sale_price($id=null)
	{
		$ci=& get_instance();
		$ci->load->model('home_model');
		return $product_image = $ci->home_model->get_product_sale_price($id);
	}
?>