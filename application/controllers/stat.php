<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stat extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('news_update_m');
		$this->load->model('config_m');
		$this->load->model('stat_m');
		$this->load->library('user_agent');
	}
	
	/**
	 * 更新新闻和点击统计
	 */
	public function index() {
		$this->_update_news();
		$this->_access_log();
	}
	
	private function _update_news() 
	{
		$interval = 3600; // 更新时间
		$last_time = $this->config_m->item('bitnews_last_update');
		if(time() - $last_time > $interval) {
			$this->news_update_m->update();
		}
	}
	
	private function _access_log() 
	{
		$data = array();
		$data['session'] = $this->stat_m->get_session();
		$data['user_agent'] = $this->input->user_agent();
		$data['ip'] = $this->input->ip_address();
		$data['referer'] = $this->input->post('referer', TRUE);
		echo $data['referer'];
		$data['browser'] = $this->agent->browser() . $this->agent->version();
		$data['os'] =  $this->agent->platform();
		$data['width'] = (int) $this->input->post('width');
		$data['height'] = (int) $this->input->post('height');
		$this->stat_m->log($data);
	}
}
