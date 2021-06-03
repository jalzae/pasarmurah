<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Controller\Company;
use Config\Database;

class Companymodel extends Model
{
    public function login_table($user,$pass)
    {
        return $this->db->table('user')
        ->where(['username'=>$user,'password'=>$pass])
        ->get()->getRowArray();
    }
    public function table_token()
    {
        return $this->db->table('user_token');
    }

    ////CRUD category
    public function table_cat()
    {
        return $this->db->table('product_category');
    }

    ///CRUD banner
    public function table_banner()
    {
        return $this->db->table('banner');
    }

    ///CRUD product
    public function table_product()
    {
        return $this->db->table('product');
    }
	public function table_product_category()
	{
		return $this->db->table('product_detail_category');
	}
	public function table_product_gallery()
	{
		return $this->db->table('product_gallery');
	}

	///CRUD info
	public function table_info()
	{
		return $this->db->table('profile');
	}


	////CRUD order
	public function table_order()
	{
		return $this->db->table('tb_order');
	}
	public function table_order_cart()
	{
		return $this->db->table('tb_order_cart');
	}

	////CRUD user
	public function table_user()
	{
		return $this->db->table('tb_order');
	}

	////CRUD ongkir
	public function table_ongkir()
	{
		return $this->db->table('tb_ongkir');
	}
	public function table_ongkir_kota()
	{
		return $this->db->table('tb_ongkir_kota');
	}
}
