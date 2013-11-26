<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 调试用的控制器
 * 
 * @author 风格独特
 */

class Debug extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
	}
	
	public function index()
	{
		/**
		 * config_m测试用
		 */
		/*$this->load->model('config_m');
		$this->config_m->item('aa', 'aaa');
		var_dump($this->config_m->item('aa'));
		$this->load->model('config_m');
		$a = $this->config_m->item('bb');
		$this->output->set_output($a[1]);*/
// 		$this->load->model('news_update_m');
// 		$this->output->set_output($this->news_update_m->update());

		print_r($_SERVER);
	}
	
	public function test() 
	{
		$this->load->model('config_m');
		$a = $this->config_m->item('aa');
		$data['aa'] = $a;
		$this->load->view('test', $data);
	}
}