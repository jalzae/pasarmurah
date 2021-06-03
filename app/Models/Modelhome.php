<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Controller\Home;
use Config\Database;

class Modelhome extends Model
{
		protected $table = 'product';
    public function __construct()
    {
        $this->db=db_connect();
    }

	public function table_product()
	{
		return $this->db->table('product')->where(['is_publish' => 1])->get(4)->getResult();
	}
	public function table_product2()
	{
		return $this->db->table('product');
	}
	public function table_product_id($id)
	{
		return $this->db->table('product')->where(['is_publish' => 1,'id_product'=>$id])->get()->getResult();
	}
	public function table_pic($id)
	{
		return $this->db->table('product_gallery')->where(['id_product' => $id])->get()->getResult();
	}
	public function table_cat()
	{
		return $this->db->table('product_category')->get()->getResult();
	}
	public function table_cat_id($id)
	{
		return $this->db->table('product_detail_category')->where(['id_product'=>$id])->get()->getResult();
	}
	public function table_banner()
	{
		return $this->db->table('banner')->get()->getResult();
	}
	public function table_count()
	{
		return $this->db->table('product')->where(['is_publish' => 1])->countAllResults(false);
	}
	public function table_cust()
	{
			return $this->db->table('customer');
	}
	public function table_cart()
	{
		return $this->db->table('product_cart');
	}
	public function table_order()
	{
		return $this->db->table('tb_order');
	}
	public function table_order_cart()
	{
		return $this->db->table('tb_order_cart');
	}
	public function	table_ongkir()
	{
		return $this->db->table('tb_ongkir');
	}
	public function	table_ongkir_kota()
	{
		return $this->db->table('tb_ongkir_kota');
	}
	public function	profile()
	{
		return $this->db->table('profile');
	}
}
