<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 新闻更新模块
 * 
 * @author 风格独特
 */
class News_update_m extends CI_Model 
{
	/**
	 * 抓取网页超时常量
	 * @var integer
	 */
	const GET_TIME_OUT = 5;
	
	const JWC_NEWS = 1;
	
	const BIT_NEWS = 2;
	
	const BIT_NOTICE = 3;
	
	const P_JWC_WEEK = '/<font color=red><b>(.*?)<\/b><\/font>/s';
	
	const P_JWC_NEWS = '/<TD width="15%" align="center" style="word-wrap:break-word;">(.*?)<\/TD>.*?<A class="middle" title="(.*?)" href="(.*?)".*?<A class="middle" title="(.*?)" href="(.*?)"/s';
	
	const P_BIT_NEWS = '/<td><a class="biaozhun".*?href="(.*?)".*?blank>(.*?)<\/a><font.*?\((.*?)\)<\/font><\/td>/s';
	
	const P_BIT_NOTICE = '/<td class="biaozhun"><a href="(.*?)" class="huizi">(.*?)<\/a>.*?\((.*?)\)<\/td>/s';
	
	const P_BIT_INDEX_NEWS = '/<li><span>\((.*?)\)<\/span><a href="(.*?)" target="_blank">(.*?)<\/a><\/li>/s';
	
	const P_BIT_INDEX_NOTICE = '/<td width="80%" class="biaozhun"><a href="(.*?)" class="huizi" target=_blank>(.*?)<\/a><\/td>(.*?)<td width="17%" class="huizi">\((.*?)\)<\/td>/s';
	
	/**
	 * 流上下文
	 */
	var $context;
	
	/**
	 * 构造函数，用来连接数据库
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('config_m');
		$this->_stream_context();
	}
	
	/**
	 * 设置流上下文
	 */
	private function _stream_context() 
	{
		$opts = array(
				'http'		=> 	array(
					'method' 	=> 	"GET",
					'timeout' 	=> 	5,
				)
			);
		$this->context = stream_context_create($opts);
	}
	
	/**
	 * 获取教务处数据
	 */
	private function _get_jwcdata() 
	{
		$content = file_get_contents('http://jwc.bit.edu.cn/index.php', FALSE, $this->context);
		if($content === FALSE) {
			return FALSE;
		}

		$this->config_m->set_item('jwc_last_update', time());
		if(preg_match(News_update_m::P_JWC_WEEK, $content, $m_week) > 0) {
			$week = trim($m_week[1]);
			$this->config_m->set_item('jwc_week', $week);
		}
		if(preg_match_all(News_update_m::P_JWC_NEWS, $content, $m_news, PREG_SET_ORDER) > 0) {
			$this->_clear_oldnews(News_update_m::JWC_NEWS);
			foreach ($m_news as $news) {
				$title = iconv('GBK', 'UTF-8', trim(strip_tags($news[4])));
				$url = 'http://jwc.bit.edu.cn' . iconv('GBK', 'UTF-8', trim($news[3]));
				$date = iconv('GBK', 'UTF-8', trim($news[1]));
				$this->add_jwc($title, $url, $date);
			}
		}
		return TRUE;
	}
	
	/**
	 * 获取北理首页新闻和通知公告数据
	 */
	private function _get_bitindex() 
	{
		$content = file_get_contents('http://www.bit.edu.cn', FALSE, $this->context);
		if($content === FALSE) {
			return FALSE;
		}
		
		$this->config_m->set_item('bitnews_last_update', time());
		$this->config_m->set_item('bitnotice_last_update', time());
		
		// 更新首页头条新闻部分
		if(preg_match_all(News_update_m::P_BIT_INDEX_NEWS, $content, $m_news, PREG_SET_ORDER) > 0) {
			$this->_clear_oldnews(News_update_m::BIT_NEWS);
			foreach ($m_news as $news) {
				$title = trim(strip_tags($news[3]));
				$url = 'http://www.bit.edu.cn/' . trim($news[2]);
				$date = trim($news[1]);
				$this->add_bitnews($title, $url, $date);
			}
		}
		
		// 更新首页通知公告部分
		if(preg_match_all(News_update_m::P_BIT_INDEX_NOTICE, $content, $m_notice, PREG_SET_ORDER) > 0) {
			$this->_clear_oldnews(News_update_m::BIT_NOTICE);
			foreach ($m_notice as $notice) {
				$title = trim(strip_tags($notice[2]));
				$url = (strlen($notice[1]) > 26) ? trim($notice[1]) : 'http://www.bit.edu.cn/' . trim($notice[1]);
				$date = trim($notice[3]);
				$this->add_bitnotice($title, $url, $date);
			}
		}
	}
	
	/**
	 * 获取北理新闻数据
	 */
	private function _get_bitnews() 
	{
		$content = file_get_contents('http://www.bit.edu.cn/xww/', FALSE, $this->context);
		if($content === FALSE) {
			return FALSE;
		}
		
		$this->config_m->set_item('bitnews_last_update', time());
		if(preg_match_all(News_update_m::P_BIT_NEWS, $content, $m_news, PREG_SET_ORDER) > 0) {
			$this->_clear_oldnews(News_update_m::BIT_NEWS);
			foreach ($m_news as $news) {
				$title = trim(strip_tags($news[2]));
				$url = 'http://www.bit.edu.cn/xww/' . trim($news[1]);
				$date = trim($news[3]);
				$this->add_bitnews($title, $url, $date);
			}
		}
	}
	
	/**
	 * 获取北理首页公告
	 */
	private function _get_bitnotice() 
	{
	$content = file_get_contents('http://www.bit.edu.cn/ggfw/tzgg17/index.htm', FALSE, $this->context);
		if($content === FALSE) {
			return FALSE;
		}
		
		$this->config_m->set_item('bitnotice_last_update', time());
		if(preg_match_all(News_update_m::P_BIT_NOTICE, $content, $m_notice, PREG_SET_ORDER) > 0) {
			$this->_clear_oldnews(News_update_m::BIT_NOTICE);
			foreach ($m_notice as $notice) {
				$title = trim(strip_tags($notice[2]));
				$url = (strlen($notice[1]) > 15) ? trim($notice[1]) : 'http://www.bit.edu.cn/ggfw/tzgg17/' . trim($notice[1]);
				$date = trim($notice[3]);
				$this->add_bitnotice($title, $url, $date);
			}
		}
	}
	
	/**
	 * 外部调用接口
	 */
	public function update() {
		$this->_get_jwcdata();
		$this->_get_bitindex();
// 		$this->_get_bitnews();
// 		$this->_get_bitnotice();
	}
	
	/**
	 * 添加新闻部分
	 * 
	 * @param integer $source
	 * @param integer $title
	 * @param integer $url
	 * @param integer $date
	 * @return boolean
	 */
	private function _add_news($source, $title, $url, $date) 
	{
		$data = array(
					'title'		=>	$title, 
					'url'		=>	$url,
					'date'		=>	$date,
					'source'	=>	(int) $source,
				);
		if($this->db->insert('news_update', $data) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * 添加教务处新闻
	 * 
	 * @param string $title
	 * @param string $url
	 * @param string $date
	 * @return boolean
	 */
	public function add_jwc($title, $url, $date) 
	{
		if($this->_add_news(News_update_m::JWC_NEWS, $title, $url, $date) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * 添加北理首页新闻
	 * 
	 * @param string $title
	 * @param string $url
	 * @param string $date
	 * @return boolean
	 */
	public function add_bitnews($title, $url, $date) 
	{
		if($this->_add_news(News_update_m::BIT_NEWS, $title, $url, $date) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * 添加北理首页通知公告
	 * 
	 * @param string $title
	 * @param string $url
	 * @param string $date
	 * @return boolean
	 */
	public function add_bitnotice($title, $url, $date) 
	{
		if($this->_add_news(News_update_m::BIT_NOTICE, $title, $url, $date) === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	public function get_news($source, $num) 
	{
		$return = array();
		$this->db->where('source', (int) $source);
		$this->db->order_by('id ASC');
		$this->db->limit((int) $num);
		$query = $this->db->get('news_update');
		if($query->num_rows() > 0) {
			$return = $query->result_array();
		}
		return $return;
	}
	
	/**
	 * 清楚新闻来源
	 * 
	 * @param string $source
	 * @return boolean
	 */
	private function _clear_oldnews($source) 
	{
		$this->db->where('source', (int) $source);
		if($this->db->delete('news_update') === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * 
	 * @param integer $nid
	 * @param integer $source
	 * @todo 未使用该功能
	 * @return boolean
	 */
	private function _exist_nid($nid, $source) 
	{
		$this->db->select('nid');
		$this->db->where('nid', (int) $nid);
		$this->db->where('source', (int) $source);
		$query = $this->db->get('news_update');
		if($query->num_rows() > 0) {
			return TRUE;
		}
		return FALSE;
	}
}
