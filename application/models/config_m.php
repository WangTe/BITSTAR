<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 数据库配置模型层
 * 
 * @author 风格独特
 */

class Config_m extends CI_Model 
{
	/**
	 * 构造函数，连接数据库
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * 获得配置的值
	 * 
	 * @param string $item 配置的名称
	 * @return mixed 当数据库字段is_json为1时返回数组，为0是返回字符串
	 */
	public function item($item)
	{
		$query = $this->db->select('value, is_json')->where('item', $item)->get('config');
		if($query->num_rows() == 1) {
			$row = $query->row_array();
			
			// json为1时，返回json_decode的结果
			if($row['is_json'] == 1) {
				return json_decode($row['value']);
			}
			
			// json为0时直接返回字符串内容
			if($row['is_json'] == 0) {
				return $row['value'];
			}
		}
		return FALSE;
	}
	
	/**
	 * 设置配置的值
	 * 
	 * @param string $item
	 * @param mixed $value 字符串或者数组
	 * @return bool 成功返回TRUE，失败返回FALSE
	 */
	public function set_item($item, $value) 
	{
		// 判断$value是否为数组，为数组则json编码，否则转化为字符串
		if(is_array($value)) {
			$value = json_encode($value);
			$is_json = 1;
		} else {
			$value = (string) $value;
			$is_json = 0;
		}
		$data = array(
				'item'		=>	$item,
				'value'		=>	$value,
				'is_json'	=>	$is_json
		);
		// 查询数据库中是否有该字段，无则添加，有则修改
		$query = $this->db->select('id')->where('item', $item)->get('config');
		if($query->num_rows() > 0) {
			$this->db->where('item', $item);
			if($this->db->update('config', $data) === FALSE) {
				return FALSE;
			}
		} else {
			if($this->db->insert('config', $data) === FALSE) {
				return FALSE;
			}
		}
		return TRUE;
	}
	
	/**
	 * 删除数据库中的配置值
	 * 
	 * @param string $item
	 * @return bool 成功返回TRUE，失败返回FALSE
	 */
	public function del_item($item) 
	{
		$item = (string) $item;
		$this->db->where('item', $item);
		if($this->db->delete('config') === FALSE) {
			return FALSE;
		}
		return TRUE;
	}
}
