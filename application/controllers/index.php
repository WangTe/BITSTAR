<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller 
{	
	/**
	 * 构造函数，防止index函数变成构造函数
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('config_m');
		$this->load->model('news_update_m');
		$this->load->library('user_agent');
	}

	/**
	 * 首页
	 */
	public function index() 
	{
		$data['jwc_week'] = $this->config_m->item('jwc_week');
		$data['date'] = date('Y年m月d日', time());
		$data['week'] = $this->_get_weekbytime(time());
		$data['last_update'] = date('Y-m-d H:i', $this->config_m->item('bitnews_last_update'));
		$data['jwc_news'] = $this->news_update_m->get_news(News_update_m::JWC_NEWS, 5);
		$data['bit_news'] = $this->news_update_m->get_news(News_update_m::BIT_NEWS, 5);
		$data['bit_notice'] = $this->news_update_m->get_news(News_update_m::BIT_NOTICE, 7);
		
		$this->load->view('index', $data);
	}
	
	private function _get_weekbytime($time) 
	{
		$numbers = array('日', '一', '二', '三', '四', '五', '六');
		$week = date('w', $time);
		if(isset($numbers[$week])) {
			return '星期' . $numbers[$week];
		}
		return '';
	}
}
