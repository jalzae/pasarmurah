<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \Firebase\JWT\JWT;
use App\Models\Companymodel;
use App\Models\Modelhome;
use Exception;

include APPPATH . 'ThirdParty/Firebase/JWT/JWT.php';


header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

class Company extends Controller
{

	////CRUD dashboardview
	public function privateKey()
	{
		$privateKey = '<<<EOD
        -----BEGIN RSA PRIVATE KEY-----
        MIICXAIBAAKBgQC8kGa1pSjbSYZVebtTRBLxBz5H4i2p/llLCrEeQhta5kaQu/Rn
        vuER4W8oDH3+3iuIYW4VQAzyqFpwuzjkDI+17t5t0tyazyZ8JXw+KgXTxldMPEL9
        5+qVhgXvwtihXC1c5oGbRlEDvDF6Sa53rcFVsYJ4ehde/zUxo6UvS7UrBQIDAQAB
        AoGAb/MXV46XxCFRxNuB8LyAtmLDgi/xRnTAlMHjSACddwkyKem8//8eZtw9fzxz
        bWZ/1/doQOuHBGYZU8aDzzj59FZ78dyzNFoF91hbvZKkg+6wGyd/LrGVEB+Xre0J
        Nil0GReM2AHDNZUYRv+HYJPIOrB0CRczLQsgFJ8K6aAD6F0CQQDzbpjYdx10qgK1
        cP59UHiHjPZYC0loEsk7s+hUmT3QHerAQJMZWC11Qrn2N+ybwwNblDKv+s5qgMQ5
        5tNoQ9IfAkEAxkyffU6ythpg/H0Ixe1I2rd0GbF05biIzO/i77Det3n4YsJVlDck
        ZkcvY3SK2iRIL4c9yY6hlIhs+K9wXTtGWwJBAO9Dskl48mO7woPR9uD22jDpNSwe
        k90OMepTjzSvlhjbfuPN1IdhqvSJTDychRwn1kIJ7LQZgQ8fVz9OCFZ/6qMCQGOb
        qaGwHmUK6xzpUbbacnYrIM6nLSkXgOAwv7XXCojvY614ILTK3iXiLBOxPu5Eu13k
        eUz9sHyD6vkgZzjtxXECQAkp4Xerf5TGfQXGXhxIX52yH+N2LtujCdkQZjXAsGdm
        B2zNzvrlgRmgBrklMTrMYgm1NPcW+bRLGcwgW2PTvNM=
        -----END RSA PRIVATE KEY-----
        EOD;';
		return $privateKey;
	}

	public function get_token($id)
	{
		$token = $this->model->table_token()->where(['token' => $id])->get(1)->getRowArray();
		return $token['token'];
	}

	public function key_midtrans()
	{
		return $auth = "TWlkLXNlcnZlci1vekdfYWZyc011UU5vWkl2R1N6Y0d2bUE6";
	}

	public function cek_token()
	{
		$auth = 0;
		$token = session('token');
		if ($token != null) {
			$secret_key = $this->privateKey();
			$token1 = $this->get_token($token);

			if ($token1) {
				try {

					$decoded = JWT::decode($token1, $secret_key, array('HS256'));

					// Access is granted. Add code of the operation here
					if ($decoded) {
						// response true
						$output = [
							'message' => 'Access granted'
						];
						return $auth = 1;
					} else {
						$output = [
							'message' => 'Access denied',
						];
						return $auth = 0;
					}
				} catch (Exception $e) {
					return $auth = 0;
				}
			} else {

				$output = [
					'message' => 'Access denied',
				];
				return $auth = 0;
			}
		} else {
			return $auth = 0;
		}
	}

	public function __construct()
	{
		$this->model = new Companymodel();
		$this->privateKey = '<<<EOD
        -----BEGIN RSA PRIVATE KEY-----
        MIICXAIBAAKBgQC8kGa1pSjbSYZVebtTRBLxBz5H4i2p/llLCrEeQhta5kaQu/Rn
        vuER4W8oDH3+3iuIYW4VQAzyqFpwuzjkDI+17t5t0tyazyZ8JXw+KgXTxldMPEL9
        5+qVhgXvwtihXC1c5oGbRlEDvDF6Sa53rcFVsYJ4ehde/zUxo6UvS7UrBQIDAQAB
        AoGAb/MXV46XxCFRxNuB8LyAtmLDgi/xRnTAlMHjSACddwkyKem8//8eZtw9fzxz
        bWZ/1/doQOuHBGYZU8aDzzj59FZ78dyzNFoF91hbvZKkg+6wGyd/LrGVEB+Xre0J
        Nil0GReM2AHDNZUYRv+HYJPIOrB0CRczLQsgFJ8K6aAD6F0CQQDzbpjYdx10qgK1
        cP59UHiHjPZYC0loEsk7s+hUmT3QHerAQJMZWC11Qrn2N+ybwwNblDKv+s5qgMQ5
        5tNoQ9IfAkEAxkyffU6ythpg/H0Ixe1I2rd0GbF05biIzO/i77Det3n4YsJVlDck
        ZkcvY3SK2iRIL4c9yY6hlIhs+K9wXTtGWwJBAO9Dskl48mO7woPR9uD22jDpNSwe
        k90OMepTjzSvlhjbfuPN1IdhqvSJTDychRwn1kIJ7LQZgQ8fVz9OCFZ/6qMCQGOb
        qaGwHmUK6xzpUbbacnYrIM6nLSkXgOAwv7XXCojvY614ILTK3iXiLBOxPu5Eu13k
        eUz9sHyD6vkgZzjtxXECQAkp4Xerf5TGfQXGXhxIX52yH+N2LtujCdkQZjXAsGdm
        B2zNzvrlgRmgBrklMTrMYgm1NPcW+bRLGcwgW2PTvNM=
        -----END RSA PRIVATE KEY-----
        EOD;';
	}
	public function index()
	{
		if (session('id_user') != null) {
			$auth = $this->cek_token();
			if ($auth == 1) {
				return view('master/dashboard');
			} else {
				return redirect()->to(base_url('/'));
			}
		} else {
			return redirect()->to(base_url('/'));
		}
	}

	public function dashboard()
	{
		if (session('id_user')) {
			$auth = $this->cek_token();
			if ($auth == 1) {
				return view('master/dashboard');
			} else {
				return redirect()->to(base_url('/'));
			}
		}
	}
	public function login()
	{

		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));

		////md5 baru sha1

		$password = sha1(md5($password));

		$cek = $this->model->login_table($username, $password);
		if ($cek['username'] == $username && $cek['password'] == $password) {

			$secret_key = $this->privateKey;
			$issuer_claim = $cek['id_user'] . $cek['username']; // this can be the servername. Example: https://domain.com
			$audience_claim = "THE_AUDIENCE";
			$issuedat_claim = time(); // issued at
			$notbefore_claim = $issuedat_claim + 10; //not before in seconds
			$expire_claim = $issuedat_claim + 3600; // expire time in seconds
			$token = array(
				"iss" => $issuer_claim,
				"aud" => $audience_claim,
				"iat" => $issuedat_claim,
				"nbf" => $notbefore_claim,
				"exp" => $expire_claim,

			);

			$token = JWT::encode($token, $secret_key);

			$cek['token'] = $token;

			if ($token) {
				$datatoken = [
					'token' => $token,
					'id_user' => $cek['id_user'],
					'entry_date' => $new_date,
					'entry_user' => $username,
					'update_date' => $new_date,
					'update_user' => $username,
				];
				$this->model->table_token()->delete(['id_user' => $cek['id_user']]);
				$this->model->table_token()->insert($datatoken);
			}

			session()->set($cek);
			echo "sukses";
			return redirect()->to(base_url('/company/index'));
		} else {
			echo "fail";
		}
	}
	public function logout()
	{
		$id = session('id_user');
		$unset = [
			'id_user' => null,
		];
		$auth = $this->cek_token();
		if ($auth == 1) {
			$this->model->table_token()->delete(['id_user' => $id]);
			session()->set($unset);
			return redirect()->to(base_url('/'));
		} else {
			echo "gagal logout";
			return redirect()->to(base_url('/'));
		}
	}


	///CRUD menu
	public function product_add()
	{
		return view('master/product/content');
	}
	public function product_control()
	{
		$data = [
			'product' => $this->model->table_product()->get()->getResult(),
		];
		return view('master/product/list', $data);
	}
	public function category_control()
	{
		return view('master/product/category');
	}
	public function banner()
	{
		return view('master/banner/banner');
	}
	public function info()
	{
		$data = [
			'info' => $this->model->table_info()->get()->getResult(),
		];
		return view('master/info/content', $data);
	}
	public function order()
	{
		$data = [
			'order' => $this->model->table_order()->get()->getResult(),
		];
		foreach ($data['order'] as $obj) {
			$idorder = $obj->id_order_unique;
			$response = $this->cek_status_bayar($idorder);
			if ($response->status_code == 201) {
				$obj->statusbayar = $response->transaction_status;
			} else if ($response->status_code == 200) {
				$obj->statusbayar = $response->transaction_status;
			} else if ($response->status_code == 407) {
				$obj->statusbayar = $response->transaction_status;
			} else {
				$obj->statusbayar = $response->status_message;
			}
		}
		return view('master/order/content', $data);
	}
	public function ongkir()
	{
		$data = [
			'ongkir' => $this->model->table_ongkir()->join('tb_ongkir_kota', 'tb_ongkir_kota.id_kota=tb_ongkir.id_kota')->get()->getResult(),
		];
		return view('master/ongkir/content', $data);
	}
	public function ongkir_kota()
	{
		$data = [
			'ongkir' => $this->model->table_ongkir_kota()->get()->getResult(),
		];
		return view('master/ongkir/kota', $data);
	}

	////CRUD info
	public function info_update()
	{
		$id = $this->request->getPost('idi');
		$value = $this->request->getPost('name');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		$data = [
			'value' => $value,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$simpan = $this->model->table_info()->update($data, ['id_profile' => $id]);
		if ($simpan) {
			echo "updated";
		} else {
			echo "Fail to Update";
		}
	}

	////CRUD banner
	public function banner_load()
	{
		$data = [
			'category' => $this->model->table_banner()->get()->getResult(),
		];
		return view('master/banner/banner_load', $data);
	}
	public function banner_add()
	{
		return view('master/banner/banner_add');
	}
	public function banner_add_confirm()
	{
		$name = $this->request->getPost('name');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));


		helper(['form', 'url']);
		helper('filesystem');
		$file = $this->request->getFile('fileupload');

		$originalName = $file->getClientName(); // Mengetahui Nama Asli
		$tempfile = $file->getTempName(); // Mengetahui Nama TMP File name
		$ext = $file->getClientExtension(); // Mengetahui extensi File
		$type = $file->getClientMimeType(); // Mengetahui Mime File
		$size_kb = $file->getSize('kb'); // Mengetahui Ukuran File dalam kb
		$size_mb = $file->getSize('mb'); // Mengetahui Ukuran File dalam mb
		$countimage = $this->model->table_banner()->countAllResults(false);
		$customName = 'banner' . $countimage . '.' . $ext;
		$baseimg = base_url('assets/banner/');
		$direktori = ROOTPATH . 'assets/banner'; //definisikan direktori upload
		$map = directory_map($direktori, FALSE, TRUE); // List direktori
		$data = [

			'nama_banner' => $name,
			'url' => $baseimg . '/' . $customName,
			'entry_date' => $new_date,
			'entry_user' => $user,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$store = $this->model->table_banner()->insert($data);
		if ($store) {
			/* Cek File apakah ada */
			foreach ($map as $key) {
				if ($key == $customName) {
				}
			}
			//Metode Upload Pilih salah satu
			//$path = $this->request->getFile('uploadedFile')->store($direktori, $namabaru);
			//$file->move($direktori, $namabaru)
			if ($file->move($direktori, $customName)) {

				echo "Berhasil diupload";
			} else {
				echo "gagal diupload";
			}
		} else {
			echo "gagal diupload";
		}
	}
	public function banner_del()
	{
		$id = $this->request->getPost('id');
		$update = $this->model->table_banner()->delete(['id_banner' => $id]);
		if ($update) {
			echo "Deleted";
		} else {
			echo "Fail to Delete";
		}
	}


	////CRUD product
	public function product_add_confirm()
	{

		$name = $this->request->getPost('name');
		$desc = $this->request->getPost('desc');
		$price = $this->request->getPost('price');
		$pcs = $this->request->getPost('pcs');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));


		helper(['form', 'url']);
		helper('filesystem');
		$file = $this->request->getFile('fileupload');

		$originalName = $file->getClientName(); // Mengetahui Nama Asli
		$tempfile = $file->getTempName(); // Mengetahui Nama TMP File name
		$ext = $file->getClientExtension(); // Mengetahui extensi File
		$type = $file->getClientMimeType(); // Mengetahui Mime File
		$size_kb = $file->getSize('kb'); // Mengetahui Ukuran File dalam kb
		$size_mb = $file->getSize('mb'); // Mengetahui Ukuran File dalam mb
		$countimage = $this->model->table_product()->countAllResults(false);
		$customName = 'productImage' . $countimage . '.' . $ext;
		$baseimg = base_url('assets/product/');
		$direktori = ROOTPATH . 'assets/product'; //definisikan direktori upload
		$map = directory_map($direktori, FALSE, TRUE); // List direktori



		$data = [

			'nama_product' => $name,
			'image' => $baseimg . '/' . $customName,
			'harga_product' => $price,
			'deskripsi' => $desc,
			'satuan' => $pcs,
			'is_publish' => 0,
			'entry_date' => $new_date,
			'entry_user' => $user,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$store = $this->model->table_product()->insert($data);
		if ($store) {
			/* Cek File apakah ada */
			foreach ($map as $key) {
				if ($key == $originalName) {
					delete_files($direktori, $customName); //Hapus terlebih dahulu jika file ada
				}
			}
			//Metode Upload Pilih salah satu
			//$path = $this->request->getFile('uploadedFile')->store($direktori, $namabaru);
			//$file->move($direktori, $namabaru)
			if ($file->move($direktori, $customName)) {

				$user = session('username');
				$data['order'] =  $this->model->table_product()->where(['entry_user' => $user])->orderBy('id_product', 'DESC')->get(1)->getResult();
				$data['cat'] = $this->model->table_cat()->get()->getResult();
				foreach ($data['order'] as $obj) {
					$id = $obj->id_product;
				}
				$data['gallery'] = $this->model->table_product_gallery()->where(['id_product' => $id])->get()->getResult();
				return view('master/product/product_detail', $data);
			} else {
				echo "<script>swal('gagal diupload');</script>";
			}
		} else {
			echo "<script>swal('gagal diupload');</script>";
		}
	}
	public function product_detail()
	{

		$user = session('username');
		$data['order'] =  $this->model->table_product()->where(['entry_user' => $user])->orderBy('id_product', 'DESC')->get(1)->getResult();
		$data['cat'] = $this->model->table_cat()->get()->getResult();
		foreach ($data['order'] as $obj) {
			$id = $obj->id_product;
		}
		$data['gallery'] = $this->model->table_product_gallery()->where(['id_product' => $id])->get()->getResult();
		return view('master/product/product_detail', $data);
	}
	public function product_edit()
	{
		$id = $this->request->getPost('id');
		$data['order'] =  $this->model->table_product()->where(['id_product' => $id])->orderBy('id_product', 'DESC')->get(1)->getResult();
		$data['cat'] = $this->model->table_cat()->get()->getResult();
		$data['gallery'] = $this->model->table_product_gallery()->where(['id_product' => $id])->get()->getResult();
		return view('master/product/product_edit', $data);
	}
	public function product_edit_confirm()
	{
		$id = $this->request->getPost('id');
		$name = $this->request->getPost('name');
		$desc = $this->request->getPost('desc');
		$price = $this->request->getPost('price');
		$pcs = $this->request->getPost('pcs');
		$disc = $this->request->getPost('discount');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));

		$data = [

			'nama_product' => $name,
			'harga_product' => $price,
			'deskripsi' => $desc,
			'satuan' => $pcs,
			'diskon' => $disc,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$store = $this->model->table_product()->update($data, ['id_product' => $id]);
		if ($store) {
			/* Cek File apakah ada */
			echo "Berhasil Update";
		} else {
			echo "Gagal Update";
		}
	}
	public function product_category()
	{
		$id = $this->request->getPost('id');
		$data['order'] =  $this->model->table_product_category()->join('product_category', 'product_category.id_category=product_detail_category.id_category')->where(['product_detail_category.id_product' => $id])->orderBy('product_detail_category.id_product', 'DESC')->get()->getResult();
		return view('master/product/category_list', $data);
	}
	public function product_category_add()
	{
		$id = $this->request->getPost('idproduct');
		$namecat = $this->request->getVar('cate');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));

		$idcat = $this->model->table_cat()->where(['name' => $namecat])->get()->getRowArray();
		$count = $this->model->table_cat()->where(['name' => $namecat])->countAllResults(false);
		$countid = $this->model->table_product_category()->where(['id_product' => $id, 'id_category' => $idcat['id_category']])->countAllResults(false);
		if ($count != 0) {
			if ($countid == 0) {
				$data = [
					'id_product' => $id,
					'id_category' => $idcat['id_category'],
					'entry_date' => $new_date,
					'update_date' => $new_date,
					'entry_user' => $user,
					'update_user' => $user,
				];

				$simpan = $this->model->table_product_category()->insert($data);
				if ($simpan) {
					echo "Berhasil menambah Category";
				} else {
					echo "Gagal menambah Category";
				}
			} else {
				echo "Category sudah ada !!";
			}
		} else {
			echo "Gagal menambah category";
		}
	}
	public function product_category_delete()
	{
		$id = $this->request->getPost('id');
		$simpan = $this->model->table_product_category()->delete(['id_detail_category' => $id]);
		if ($simpan) {
			echo "Berhasil menghapus Category";
		} else {
			echo "Gagal menghapus Category";
		}
	}
	public function product_delete()
	{
		$id = $this->request->getPost('id');
		$update = $this->model->table_product()->delete(['id_product' => $id]);
		if ($update) {
			echo "1";
		} else {
			echo "0";
		}
	}
	public function product_unpublish()
	{
		$id = $this->request->getPost('id');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		$data = [
			'is_publish' => 0,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$update = $this->model->table_product()->update($data, ['id_product' => $id]);
		if ($update) {
			echo "Data Unpublished";
		} else {
			echo "Data Unpublished FAILED";
		}
	}
	public function product_publish()
	{
		$id = $this->request->getPost('id');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		$data = [
			'is_publish' => 1,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$model = new Companymodel();
		$update = $model->table_product()->update($data, ['id_product' => $id]);
		if ($update) {
			echo "Data Published";
		} else {
			echo "Data Published FAILED";
		}
	}
	public function product_gallery_add()
	{
		$id = $this->request->getPost('id');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		helper(['form', 'url']);
		helper('filesystem');
		$file = $this->request->getFile('fileupload');

		$originalName = $file->getClientName(); // Mengetahui Nama Asli
		$tempfile = $file->getTempName(); // Mengetahui Nama TMP File name
		$ext = $file->getClientExtension(); // Mengetahui extensi File
		$type = $file->getClientMimeType(); // Mengetahui Mime File
		$size_kb = $file->getSize('kb'); // Mengetahui Ukuran File dalam kb
		$size_mb = $file->getSize('mb'); // Mengetahui Ukuran File dalam mb
		$countimage = $this->model->table_product_gallery()->where(['id_product' => $id])->countAllResults(false);
		$customName = 'productImageGallery' . $countimage . '.' . $ext;
		$baseimg = base_url('assets/product_gallery/');
		$direktori = ROOTPATH . 'assets/product_gallery'; //definisikan direktori upload
		$map = directory_map($direktori, FALSE, TRUE); // List direktori



		$data = [

			'id_product' => $id,
			'url' => $baseimg . '/' . $customName,
			'entry_date' => $new_date,
			'entry_user' => $user,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$store = $this->model->table_product_gallery()->insert($data);
		if ($store) {
			/* Cek File apakah ada */
			foreach ($map as $key) {
				if ($key == $originalName) {
					delete_files($direktori, $customName); //Hapus terlebih dahulu jika file ada
				}
			}
			//Metode Upload Pilih salah satu
			//$path = $this->request->getFile('uploadedFile')->store($direktori, $namabaru);
			//$file->move($direktori, $namabaru)
			if ($file->move($direktori, $customName)) {

				echo "Berhasil diupload";
			} else {
				echo "gagal diupload";
			}
		} else {
			echo "gagal diupload";
		}
	}
	public function product_gallery_del()
	{
		$id = $this->request->getPost('id');
		$del = $this->model->table_product_gallery()->delete(['id_product_gallery' => $id]);
		if ($del) {
			echo "Deleted";
		} else {
			echo "Failed";
		}
	}
	public function product_gallery_change()
	{
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));

		$id = $this->request->getPost('id');
		$gal = $this->model->table_product_gallery()->where(['id_product_gallery' => $id])->get()->getRowArray();
		$idproduct = $gal['id_product'];
		$urlgal = $gal['url'];
		$prod = $this->model->table_product()->where(['id_product' => $idproduct])->get()->getRowArray();
		$urlprod = $prod['image'];

		$datag = [
			'url' => $urlprod,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$datap = [
			'image' => $urlgal,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$chang1 = $this->model->table_product_gallery()->update($datag, ['id_product_gallery' => $id]);
		$chang2 = $this->model->table_product()->update($datap, ['id_product' => $idproduct]);

		if ($chang1 && $chang2) {
			echo "Sukses mengganti Head";
		} else {
			echo "gagal mengganti head";
		}
	}
	public function product_gallery()
	{
		$id = $this->request->getPost('id');
		$data['gallery'] =  $this->model->table_product_gallery()->join('product', 'product.id_product=product_gallery.id_product')->where(['product_gallery.id_product' => $id])->orderBy('product_gallery.id_product', 'ASC')->get()->getResult();
		$img = $this->model->table_product()->where(['id_product' => $id])->get()->getRowArray();
		$data['imgURL'] = $img['image'];
		return view('master/product/product_gallery', $data);
	}




	////CRUD category
	public function category_load()
	{

		$data = [
			'category' => $this->model->table_cat()->get()->getResult(),
		];
		return view('master/product/category_load', $data);
	}
	public function category_load_json()
	{
		$data = [
			'category' => $this->model->table_cat()->get()->getResult(),
		];
		return json_encode($data['category']);
	}
	public function category_add()
	{
		return view('master/product/category_add');
	}
	public function category_added()
	{
		$nama = $this->request->getPost('nama');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		$data = [
			'name' => $nama,
			'entry_date' => $new_date,
			'update_date' => $new_date,
			'entry_user' => $user,
			'update_user' => $user,
		];
		$simpan = $this->model->table_cat()->insert($data);
		if ($simpan) {
			echo "Data category added";
		} else {
			echo "Data category fail to add";
		}
	}
	public function category_edit()
	{
		$id = $this->request->getPost('id');
		$data['category'] = $this->model->table_cat()->where(['id_category' => $id])->get()->getResult();
		return view('master/product/category_edit', $data);
	}
	public function category_confirm_edit()
	{
		$id = $this->request->getPost('id');
		$nama = $this->request->getPost('nama');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		$data = [
			'name' => $nama,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$simpan = $this->model->table_cat()->update($data, ['id_category' => $id]);
		if ($simpan) {
			echo "Data category updated";
		} else {
			echo "Data category fail to update";
		}
	}
	public function category_del()
	{
		$id = $this->request->getPost('id');
		$simpan = $this->model->table_cat()->delete(['id_category' => $id]);
		if ($simpan) {
			echo "Data category deleted";
		} else {
			echo "Data category fail to deleted";
		}
	}


	////CRUD midtrans
	public function cek_status_bayar($idorder)
	{
		$curl = curl_init();
		$auth = $this->key_midtrans();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.midtrans.com/v2/' . $idorder . '/status',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Accept: application/json',
				'Content-Type: application/json',
				'Authorization: Basic ' . $auth,
				'Cookie: __cfduid=de273f026b20f2c46d93ae781e912a4d01620093902'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response = json_decode($response);
	}


	///CRUD order
	public function order_edit()
	{
		$id = $this->request->getPost('id');
		$this->home = new Modelhome();
		$data = [
			'order' => $this->home->table_order()->where(['id_order' => $id])->get()->getResult(),
		];
		return view('master/order/edit', $data);
	}
	public function order_detail()
	{
		$id = $this->request->getPost('id');
		$this->home = new Modelhome();
		$data = [
			'order' => $this->home->table_order()->where(['id_order' => $id])->get()->getResult(),
			'cart' => $this->home->table_order_cart()->join('product', 'product.id_product=tb_order_cart.id_product')->where(['tb_order_cart.id_order' => $id])->get()->getResult(),
		];

		return view('master/order/detail', $data);
	}
	public function order_edit_confirm()
	{
		$id = $this->request->getPost('id');
		$status = $this->request->getPost('status');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		$this->home = new Modelhome();
		$data = [
			'status' => $status,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$update = $this->home->table_order()->update($data, ['id_order' => $id]);
		if ($update) {
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	///CRUD analisa
	public function analisa_barang()
	{
		$data['product'] = $this->model->table_product()->get()->getResult();

		foreach ($data['product'] as $key) {
			$idpro = $key->id_product;
			$totalhasil = 0;
			$key->cart = $this->model->table_order_cart()->where(['id_product' => $idpro])->get()->getResult();
			foreach ($key->cart as $key1) {
				$totalhasil += $key1->qty;
			}
			$key->hasil = $totalhasil;
		}
		return view('master/analisa/penjualan_barang', $data);
	}
	public function analisa_harian()
	{
		$data['product'] = $this->model->table_order()->where(['status' => 3])->get()->getResult();
		return view('master/analisa/penjualan_harian', $data);
	}
	public function analisa_harian_filter()
	{
		$tgl = $this->request->getPost('tgl');
		$tglawal = $tgl . ' 00:00:01';
		$tglakhir = $tgl . ' 23:59:59';
		$data['product'] = $this->model->table_order()->where(['status' => 3, 'entry_date >=' => $tglawal, 'entry_date <=' => $tglakhir])->get()->getResult();
		return view('master/analisa/penjualan_harian_filter', $data);
	}
	public function analisa_bulanan()
	{
		$data['product'] = $this->model->table_order()->where(['status' => 3])->get()->getResult();
		return view('master/analisa/penjualan_bulanan', $data);
	}
	public function analisa_bulanan_filter()
	{
		$tgl = $this->request->getPost('tgl');
		$tgl1 = date("Yyyy-mm-tt", strtotime($tgl));
		$tglawal = $tgl . '-01 00:00:01';
		$tglakhir = $tgl1 . ' 23:59:59';
		$data['product'] = $this->model->table_order()->where(['status' => 3, 'entry_date >=' => $tglawal, 'entry_date <=' => $tglakhir])->get()->getResult();
		return view('master/analisa/penjualan_harian_filter', $data);
	}

	////CRUD ongkir
	public function ongkir_add()
	{
		$data['kota'] = $this->model->table_ongkir_kota()->get()->getResult();
		return view('master/ongkir/add_form', $data);
	}
	public function ongkir_add_confirm()
	{
		$dar = $this->request->getPost('daerah');
		$hrg = $this->request->getPost('harga');
		$kota = $this->request->getPost('kota');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));

		$data = [
			'id_kota' => $kota,
			'nama_daerah' => $dar,
			'harga' => $hrg,
			'entry_date' => $new_date,
			'update_date' => $new_date,
			'entry_user' => $user,
			'update_user' => $user,
		];
		$save = $this->model->table_ongkir()->insert($data);
		if ($save) {
			echo "Data input succes";
		} else {
			echo "data input failure";
		}
	}
	public function ongkir_del()
	{
		$id = $this->request->getPost('id');
		$save = $this->model->table_ongkir()->delete(['id_ongkir' => $id]);
		if ($save) {
			echo "Data delete succes";
		} else {
			echo "data delete failure";
		}
	}
	public function ongkir_update()
	{
		$id = $this->request->getPost('id');
		$data['ongkir'] = $this->model->table_ongkir()->where(['id_ongkir' => $id])->get()->getResult();
		return view('master/ongkir/edit_form', $data);
	}
	public function ongkir_update_confirm()
	{
		$id = $this->request->getPost('id');
		$dar = $this->request->getPost('daerah');
		$hrg = $this->request->getPost('harga');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));

		$data = [
			'nama_daerah' => $dar,
			'harga' => $hrg,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$save = $this->model->table_ongkir()->update($data, ['id_ongkir' => $id]);
		if ($save) {
			echo "Data update succes";
		} else {
			echo "data update failure";
		}
	}
	public function kota_add()
	{
		return view('master/ongkir/add_form_kota');
	}
	public function kota_add_confirm()
	{
		$dar = $this->request->getPost('daerah');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));

		$data = [
			'nama_kota' => $dar,
			'entry_date' => $new_date,
			'update_date' => $new_date,
			'entry_user' => $user,
			'update_user' => $user,
		];
		$save = $this->model->table_ongkir_kota()->insert($data);
		if ($save) {
			echo "Data input succes";
		} else {
			echo "data input failure";
		}
	}
	public function kota_del()
	{
		$id = $this->request->getPost('id');
		$save = $this->model->table_ongkir_kota()->delete(['id_kota' => $id]);
		if ($save) {
			echo "1";
		} else {
			echo "0";
		}
	}
	public function kota_update()
	{
		$id = $this->request->getPost('id');
		$data['ongkir'] = $this->model->table_ongkir_kota()->where(['id_kota' => $id])->get()->getResult();
		return view('master/ongkir/edit_form_kota', $data);
	}
	public function kota_update_confirm()
	{
		$id = $this->request->getPost('id');
		$dar = $this->request->getPost('daerah');
		$user = session('username');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));

		$data = [
			'nama_kota' => $dar,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$save = $this->model->table_ongkir_kota()->update($data, ['id_kota' => $id]);
		if ($save) {
			echo "Data update succes";
		} else {
			echo "data update failure";
		}
	}

	public function test()
	{

		$data = [
			'category' => $this->model->table_cat()->get()->getResult(),
		];
		return view('master/product/category_load', $data);
	}
}
