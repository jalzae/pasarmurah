<?php

namespace App\Controllers;

use App\Models\Modelhome;

header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
class Home extends BaseController
{

	////CRUD dashboard client
	public function index()
	{
		helper('cookie');
		$ip = get_cookie('user');

		if (is_null($ip)) {
			$ip = $this->get_ip();
		}

		$this->home = new Modelhome();
		$cek = $this->home->table_cust()->where(['id_cust' => $ip])->countAllResults(false);
		$user = $ip;
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		if ($cek == 0) {
			$data = [
				'id_cust' => $user,
				'entry_date' => $new_date,
				'update_date' => $new_date,
				'entry_user' => $user,
				'update_user' => $user,
			];
			$this->home->table_cust()->insert($data);
		} else {
			$data = [
				'update_date' => $new_date,
				'update_user' => $user,
			];
			$this->home->table_cust()->update($data, ['id_cust' => $ip]);
		}
		$data = [
			'product' => $this->home->table_product(),
			'cat' => $this->home->table_cat(),
			'banner' => $this->home->table_banner(),
			'perPage' => 1,
			'total' => $this->home->count(),
			'pager' =>  $this->home->table_product(),
		];
		foreach ($data['product'] as $key) {
			$idp = $key->id_product;
			$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->countAllResults(false);
			if ($cek == 0) {
				$key->qty = 0;
			} else {
				$qtypu = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->get()->getRowArray();
				$key->qty = $qtypu['qty'];
			}

			if (($key->diskon != null) || ($key->diskon != 0)) {
				$key->statusdiskon = 1;
				$diskon = $key->harga_product * $key->diskon / 100;
				$key->hargadiskon = $key->harga_product - $diskon;
			} else {
				$key->statusdiskon = 0;
				$key->hargadiskon = $key->harga_product;
			}
		}
		$data['namatoko'] = $this->home->profile()->get(1)->getResult();
		$data['logo'] = $this->home->profile()->get(1, 1)->getResult();
		$data['alamat'] = $this->home->profile()->get(1, 2)->getResult();
		$data['notelf'] = $this->home->profile()->get(1, 3)->getResult();
		$data['deskripsi'] = $this->home->profile()->get(1, 4)->getResult();
		setcookie('user', $ip);
		return view('index2', $data);
	}
	public function key_midtrans()
	{
		return $auth = "TWlkLXNlcnZlci1vekdfYWZyc011UU5vWkl2R1N6Y0d2bUE6";
	}
	public function get_ip()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //Checking IP From Shared Internet
		{
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //To Check IP is Pass From Proxy
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REQUEST_TIME'];
		}

		return $ip;
	}
	public function product_details()
	{
		helper('cookie');
		$user = get_cookie('user');
		$id = $this->request->getPost('id');
		$this->home = new Modelhome();
		$data = [
			'product' => $this->home->table_product_id($id),
			'cat' => $this->home->table_cat_id($id),
			'pic' => $this->home->table_pic($id),
		];
		foreach ($data['product'] as $key) {
			$idp = $key->id_product;
			$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->countAllResults(false);
			if ($cek == 0) {
				$key->qty = 0;
			} else {
				$qtypu = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->get()->getRowArray();
				$key->qty = $qtypu['qty'];
			}

			if (($key->diskon != null) || ($key->diskon != 0)) {
				$key->statusdiskon = 1;
				$diskon = $key->harga_product * $key->diskon / 100;
				$key->hargadiskon = $key->harga_product - $diskon;
			} else {
				$key->statusdiskon = 0;
				$key->hargadiskon = $key->harga_product;
			}
		}

		if (empty($data['product'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Product Tidak ditemukan !');
		}
		return view('customer/product_details', $data);
	}
	public function check_order()
	{
		return view('customer/check_order');
	}
	public function product_more()
	{
		helper('cookie');
		$user = get_cookie('user');
		$this->home = new Modelhome();
		$counter = $this->request->getPost('id');
		$limit = $this->home->table_product2()->where(['is_publish' => 1])->countAllResults(false);
		$totalpost = $limit;
		if ($counter < $totalpost) {
			$data['product'] = $this->home->table_product2()->where(['is_publish' => 1])->get(3, $counter)->getResult();
			foreach ($data['product'] as $key) {
				$idp = $key->id_product;
				$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->countAllResults(false);
				if ($cek == 0) {
					$key->qty = 0;
				} else {
					$qtypu = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->get()->getRowArray();
					$key->qty = $qtypu['qty'];
				}

				if (($key->diskon != null) || ($key->diskon != 0)) {
					$key->statusdiskon = 1;
					$diskon = $key->harga_product * $key->diskon / 100;
					$key->hargadiskon = $key->harga_product - $diskon;
				} else {
					$key->statusdiskon = 0;
					$key->hargadiskon = $key->harga_product;
				}
			}
			return view('customer/product_append', $data);
		} else {
			echo "1";
		}
	}
	public function carabayar()
	{
		return view('customer/cara_bayar');
	}
	public function about()
	{
		return view('customer/about');
	}
	public function label()
	{
		helper('cookie');
		$user = get_cookie('user');
		$id	= $this->request->getPost('id');
		$this->home = new Modelhome();
		$data = [
			'product' => $this->home->table_product2()->join('product_detail_category', 'product_detail_category.id_product=product.id_product')->where(['product.is_publish' => 1, 'product_detail_category.id_category' => $id])->get()->getResult(),
		];
		foreach ($data['product'] as $key) {
			$idp = $key->id_product;
			$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->countAllResults(false);
			if ($cek == 0) {
				$key->qty = 0;
			} else {
				$qtypu = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->get()->getRowArray();
				$key->qty = $qtypu['qty'];
			}

			if (($key->diskon != null) || ($key->diskon != 0)) {
				$key->statusdiskon = 1;
				$diskon = $key->harga_product * $key->diskon / 100;
				$key->hargadiskon = $key->harga_product - $diskon;
			} else {
				$key->statusdiskon = 0;
				$key->hargadiskon = $key->harga_product;
			}
		}

		return view('customer/label', $data);
	}
	public function search()
	{
		helper('cookie');
		$query = $this->request->getPost('search');
		$user = get_cookie('user');
		$this->home = new Modelhome();
		$result	= $this->home->table_product2()->like('nama_product', $query, 'both')->orLike('deskripsi', $query, 'both')->countAllResults(false);
		$data = [
			'product' => $this->home->table_product2()->like('nama_product', $query, 'both')->orLike('deskripsi', $query, 'both')->get()->getResult(),
		];
		foreach ($data['product'] as $key) {
			$idp = $key->id_product;
			$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->countAllResults(false);
			if ($cek == 0) {
				$key->qty = 0;
			} else {
				$qtypu = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->get()->getRowArray();
				$key->qty = $qtypu['qty'];
			}

			if (($key->diskon != null) || ($key->diskon != 0)) {
				$key->statusdiskon = 1;
				$diskon = $key->harga_product * $key->diskon / 100;
				$key->hargadiskon = $key->harga_product - $diskon;
			} else {
				$key->statusdiskon = 0;
				$key->hargadiskon = $key->harga_product;
			}
		}
		if ($result == 0) {
			echo "Cant Found with that query";
		} else {
			return view('customer/label', $data);
		}
	}
	public function search_inside()
	{
		helper('cookie');
		$query = $this->request->getPost('search');
		$user = get_cookie('user');
		$this->home = new Modelhome();
		$result	= $this->home->table_product2()->like('nama_product', $query, 'both')->orLike('deskripsi', $query, 'both')->countAllResults(false);
		$data = [
			'product' => $this->home->table_product2()->like('nama_product', $query, 'both')->orLike('deskripsi', $query, 'both')->get()->getResult(),
		];
		foreach ($data['product'] as $key) {
			$idp = $key->id_product;
			$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->countAllResults(false);
			if ($cek == 0) {
				$key->qty = 0;
			} else {
				$qtypu = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->get()->getRowArray();
				$key->qty = $qtypu['qty'];
			}

			if (($key->diskon != null) || ($key->diskon != 0)) {
				$key->statusdiskon = 1;
				$diskon = $key->harga_product * $key->diskon / 100;
				$key->hargadiskon = $key->harga_product - $diskon;
			} else {
				$key->statusdiskon = 0;
				$key->hargadiskon = $key->harga_product;
			}
		}
		if ($result == 0) {
			echo "Cant Found with that query";
		} else {
			return view('customer/label_inside', $data);
		}
	}

	///CURD transaksi
	public function checkout()
	{
		helper('cookie');
		$user = get_cookie('user');

		$total = 0;
		$this->home = new Modelhome();
		$data = [
			'cart' => $this->home->table_cart()->join('product', 'product.id_product=product_cart.id_product')->where(['product_cart.user' => $user])->get()->getResult(),
		];
		foreach ($data['cart'] as $key) {
			$harga = $key->qty * $key->harga_product;
			$total += $harga;
		}
		$data['total'] = $total;
		$data['ongkir'] = $this->home->table_ongkir_kota()->get()->getResult();
		return view('customer/checkout', $data);
	}
	public function product($id)
	{

		$this->home = new Modelhome();
		$data = [
			'product' => $this->home->table_product_id($id),
			'cat' => $this->home->table_cat_id($id),
			'pic' => $this->home->table_pic($id),
		];

		if (empty($data['product'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Product Tidak ditemukan !');
		}
		return view('customer/product', $data);
	}

	public function checkout_confirm($data)
	{
		$curl = curl_init();
		$auth = $this->key_midtrans();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://app.midtrans.com/snap/v1/transactions',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_HTTPHEADER => array(
				'Accept: application/json',
				'Content-Type: application/json',
				'Authorization: Basic ' . $auth,
				'Cookie: __cfduid=de273f026b20f2c46d93ae781e912a4d01620093902'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return json_decode($response);
	}
	public function checkout_check()
	{
		$curl = curl_init();
		$auth = $this->key_midtrans();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.midtrans.com/v2/ORDER-101-1619344129/status',
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
		echo $response;
	}





	public function merch_id()
	{
		$merchid = "G936360632";

		return $merchid;
	}
	public function client_key()
	{
		$clientkey = "SB-Mid-client-IqPsbP0WrhuR0RAe";

		return $clientkey;
	}
	public function server_key()
	{
		$server_key = "SB-Mid-server-3cTpWGN9oqSOe9GHAxk7VLSt";

		return $server_key;
	}

	///CRUD customer transaction
	public function addcart()
	{
		helper('cookie');
		$id = $this->request->getPost('id');
		$user = get_cookie('user');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		if ($user != null) {
			$this->home = new Modelhome();
			$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $id])->countAllResults(false);
			if ($cek == 0) {
				$data = [
					'user' => $user,
					'id_product' => $id,
					'qty' => 1,
					'entry_date' => $new_date,
					'update_date' => $new_date,
					'entry_user' => $user,
					'update_user' => $user,
				];
				$update = $this->home->table_cart()->insert($data);
				if ($update) {
					$cartfunc['product'] = $this->home->table_product2()->where(['id_product' => $id])->get()->getResult();
					foreach ($cartfunc['product'] as $key) {
						$idp = $key->id_product;
						$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->countAllResults(false);
						if ($cek == 0) {
							$key->qty = 0;
						} else {
							$qtypu = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->get()->getRowArray();
							$key->qty = $qtypu['qty'];
						}
					}

					return view('customer/index_cart_func', $cartfunc);
				} else {
				}
			} else {
				$lastdata = $this->home->table_cart()->where(['user' => $user, 'id_product' => $id])->get()->getRowArray();
				$idproduct = $lastdata['id_cart'];
				$qty = $lastdata['qty'] + 1;
				$data = [
					'qty' => $qty,
					'update_date' => $new_date,
					'update_user' => $user,
				];

				$update = $this->home->table_cart()->update($data, ['id_cart' => $idproduct]);
				if ($update) {
					$cartfunc['product'] = $this->home->table_product2()->where(['id_product' => $id])->get()->getResult();
					foreach ($cartfunc['product'] as $key) {
						$idp = $key->id_product;
						$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->countAllResults(false);
						if ($cek == 0) {
							$key->qty = 0;
						} else {
							$qtypu = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->get()->getRowArray();
							$key->qty = $qtypu['qty'];
						}
					}

					return view('customer/index_cart_func', $cartfunc);
				} else {
					echo "gagal";
				}
			}
		} else {
			redirect()->to(base_url(''));
		}
	}
	public function mincart()
	{
		helper('cookie');
		$id = $this->request->getPost('id');
		$user = get_cookie('user');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		if ($user != null) {
			$this->home = new Modelhome();


			$lastdata = $this->home->table_cart()->where(['user' => $user, 'id_product' => $id])->get()->getRowArray();
			$idproduct = $lastdata['id_cart'];
			$qty = $lastdata['qty'] - 1;
			$data = [
				'qty' => $qty,
				'update_date' => $new_date,
				'update_user' => $user,
			];
			if ($qty == 0) {
				$update = $this->home->table_cart()->delete(['id_cart' => $idproduct]);
				if ($update) {
					$cartfunc['product'] = $this->home->table_product2()->where(['id_product' => $id])->get()->getResult();
					foreach ($cartfunc['product'] as $key) {
						$idp = $key->id_product;
						$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->countAllResults(false);
						if ($cek == 0) {
							$key->qty = 0;
						} else {
							$qtypu = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->get()->getRowArray();
							$key->qty = $qtypu['qty'];
						}
					}

					return view('customer/index_cart_func', $cartfunc);
				} else {
					echo "gagal";
				}
			} else {
				$update = $this->home->table_cart()->update($data, ['id_cart' => $idproduct]);
				if ($update) {
					$cartfunc['product'] = $this->home->table_product2()->where(['id_product' => $id])->get()->getResult();
					foreach ($cartfunc['product'] as $key) {
						$idp = $key->id_product;
						$cek = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->countAllResults(false);
						if ($cek == 0) {
							$key->qty = 0;
						} else {
							$qtypu = $this->home->table_cart()->where(['user' => $user, 'id_product' => $idp])->get()->getRowArray();
							$key->qty = $qtypu['qty'];
						}
					}

					return view('customer/index_cart_func', $cartfunc);
				} else {
					echo "gagal";
				}
			}
		} else {
			redirect()->to(base_url(''));
		}
	}
	public function checkcart()
	{
		helper('cookie');
		$user = get_cookie('user');
		$this->home = new Modelhome();

		$cart = $this->home->table_cart()->where(['user' => $user])->countAllResults(false);

		if ($cart != 0) {
			echo "1";
		} else {
			echo "0";
		}
	}
	public function loadcart()
	{
		helper('cookie');
		$user = get_cookie('user');
		$this->home = new Modelhome();

		$cart = $this->home->table_cart()->where(['user' => $user])->countAllResults(false);
		$barnag = $this->home->table_cart()->join('product', 'product.id_product=product_cart.id_product')->where(['product_cart.user' => $user])->get()->getResult();
		$totalharga = 0;
		foreach ($barnag as $key) {

			if ($key->diskon != 0 || $key->diskon != null) {
				$diskon = $key->diskon;
			} else {
				$diskon = 0;
			}
			$diskonan = $key->harga_product * $diskon / 100;
			$hasilharga = $key->harga_product - $diskonan;
			$harga = $key->qty * $hasilharga;
			$totalharga += $harga;
		}
		$data = [
			'harga' => $totalharga,
			'item' => $cart,
		];

		return view('customer/float_cart', $data);
	}
	public function load_total()
	{
		helper('cookie');
		$user = get_cookie('user');
		$this->home = new Modelhome();

		$barnag = $this->home->table_cart()->join('product', 'product.id_product=product_cart.id_product')->where(['product_cart.user' => $user])->get()->getResult();
		$totalharga = 0;
		foreach ($barnag as $key) {
			if ($key->diskon != 0 || $key->diskon != null) {
				$diskon = $key->diskon;
			} else {
				$diskon = 0;
			}
			$diskonan = $key->harga_product * $diskon / 100;
			$hasilharga = $key->harga_product - $diskonan;
			$harga = $key->qty * $hasilharga;
			$totalharga += $harga;
		}


		echo $totalharga;
	}
	public function load_cart_user()
	{
		helper('cookie');
		$user = get_cookie('user');
		$total = 0;
		$this->home = new Modelhome();
		$data = [
			'cart' => $this->home->table_cart()->join('product', 'product.id_product=product_cart.id_product')->where(['product_cart.user' => $user])->get()->getResult(),
		];
		foreach ($data['cart'] as $key) {
			if ($key->diskon != 0 || $key->diskon != null) {
				$diskon = $key->diskon;
			} else {
				$diskon = 0;
			}
			$diskonan = $key->harga_product * $diskon / 100;
			$hasilharga = $key->harga_product - $diskonan;
			$key->hargadiskon = $hasilharga;
			$harga = $key->qty * $hasilharga;
			$total += $harga;
		}
		$data['total'] = $total;

		return view('customer/table_cart', $data);
	}
	public function tambahqty()
	{
		helper('cookie');
		$id = $this->request->getPost('id');
		$user = get_cookie('user');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		$this->home = new Modelhome();
		$cek = $this->home->table_cart()->where(['id_cart' => $id])->get()->getRowArray();
		$qty = $cek['qty'] + 1;
		$data = [
			'qty' => $qty,
			'update_date' => $new_date,
			'update_user' => $user,
		];

		$this->home->table_cart()->update($data, ['id_cart' => $id]);
	}
	public function kurangqty()
	{
		helper('cookie');
		$id = $this->request->getPost('id');
		$user = get_cookie('user');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		$this->home = new Modelhome();
		$cek = $this->home->table_cart()->where(['id_cart' => $id])->get()->getRowArray();
		$qty = $cek['qty'] - 1;
		$data = [
			'qty' => $qty,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		if ($qty < 1) {
			$this->home->table_cart()->delete(['id_cart' => $id]);
		} else {
			$this->home->table_cart()->update($data, ['id_cart' => $id]);
		}
	}
	public function delitem()
	{
		$id = $this->request->getPost('id');
		$this->home = new Modelhome();
		$del = $this->home->table_cart()->delete(['id_cart' => $id]);
		if ($del) {
			echo "Deleted";
		} else {
			echo "Failed";
		}
	}
	public function cart_note()
	{
		$id = $this->request->getPost('id');
		$this->home = new Modelhome();
		$data['cart'] = $this->home->table_cart()->where(['id_cart' => $id])->get()->getResult();
		return view('customer/cart_comment', $data);
	}
	public function cart_note_confirm()
	{
		helper('cookie');
		$id = $this->request->getPost('id');
		$note = $this->request->getPost('note');
		$user = get_cookie('user');
		$new_date = date("Y-m-d H:i:s", strtotime("+12 hours"));
		$this->home = new Modelhome();
		$data = [
			'note' => $note,
			'update_date' => $new_date,
			'update_user' => $user,
		];
		$simpan = $this->home->table_cart()->update($data, ['id_cart' => $id]);
		if ($simpan) {
			echo "Success";
		} else {
			echo "failed";
		}
	}
	public function confirmation()
	{
		helper('cookie');
		$this->home = new Modelhome();
		$user = get_cookie('user');
		$cart = $this->home->table_cart()->join('product', 'product.id_product=product_cart.id_product')->where(['product_cart.user' => $user])->countAllResults(false);
		if ($cart != 0) {
			$name = $this->request->getPost('name');
			$alamat = $this->request->getPost('alamat');
			$kota = $this->request->getPost('kota');
			$pos =  '';
			$nohp = $this->request->getPost('nohp');
			$email =  $this->request->getPost('email');
			$total = $this->request->getPost('total');
			$daerah = $this->request->getPost('daerah');
			$catta = $this->request->getPost('catatan');

			if ($email == "") {
				$email = 'noreply@example.com';
			}

			$today = date("Y-m-d 00:00:00", strtotime("+12 hours"));
			$today1	= date("Y-m-d 00:00:00", strtotime("+36 hours"));

			$new_date = date("Y-m-d  H:i:s", strtotime("+12 hours"));

			$orderdate = date("Ymd", strtotime("+12 hours"));


			$fetchdaerah = $this->home->table_ongkir()->where(['id_ongkir' => $daerah])->get()->getRowArray();
			$namadaerah = $fetchdaerah['nama_daerah'];
			$ongkir = $fetchdaerah['harga'];
			$data['item'] = $this->home->table_cart()->join('product', 'product.id_product=product_cart.id_product')->where(['product_cart.user' => $user])->get()->getResult();
			$totalharga = 0;

			$data['item_details'][] = [
				"id" => 'Ongkir',
				"price" =>  $ongkir,
				"quantity" =>  1,
				"name" => 'Ongkir ' . $namadaerah,
			];
			$total = $total + $ongkir;
			$noorder = $this->home->table_order()->where(['entry_date >=' => $today, 'entry_date <=' => $today1])->countAllResults(false);
			$noorder = substr(str_repeat(0, 5) . $noorder, -5);
			$tborder = [
				'id_order_unique' => $orderdate . $noorder,
				'user' => $user,
				'total_bayar' => $total,
				'status' => 0,
				'no_hp' => $nohp,
				'ongkir' => $ongkir,
				'note' => $catta,
				'alamat' => $alamat . ' kota:' . $kota . ' Kode Pos:' . $pos,
				'entry_date' => $new_date,
				'update_date' => $new_date,
				'entry_user' => $user,
				'update_user' => $user,
			];
			$this->home->table_order()->insert($tborder);

			$lastorder = $this->home->table_order()->where(['entry_user' => $user])->orderBy('id_order', 'DESC')->get()->getRowArray();

			$idlast = $lastorder['id_order'];

			foreach ($data['item'] as $obj) {
				if ($obj->diskon != 0 || $obj->diskon != null) {
					$diskon = $obj->diskon;
				} else {
					$diskon = 0;
				}
				$diskonan = $obj->harga_product * $diskon / 100;
				$hasilharga = $obj->harga_product - $diskonan;
				$obj->hargadiskon = $hasilharga;

				$data['item_details'][] = [
					"id" => $obj->id_product,
					"price" =>  $obj->hargadiskon,
					"quantity" =>  $obj->qty,
					"name" => $obj->nama_product
				];
				$tbordercart = [
					'id_order' => $idlast,
					'id_product' => $obj->id_product,
					'qty' => $obj->qty,
					'note' => $obj->note,
					'entry_date' => $new_date,
					'update_date' => $new_date,
					'entry_user' => $user,
					'update_user' => $user,
				];

				$this->home->table_cart()->delete(['id_cart' => $obj->id_cart]);
				$this->home->table_order_cart()->insert($tbordercart);


				$harga = $obj->qty * $hasilharga;

				$totalharga += $harga;
			}

			$totalharga += $ongkir;

			$data['transaction_details'] = [
				"order_id" => $orderdate . $noorder,
				"gross_amount" => $totalharga
			];
			$data['customer_details'] = [
				"first_name" => $name,
				"last_name" => "",
				"email" => $email,
				"phone" => $nohp,
				"billing_address" => array(
					"first_name" => $name,
					"last_name" => "",
					"email" => $email,
					"phone" => $nohp,
					"address" => $alamat,
					"city" => $kota,
					"postal_code" => $pos,
					"country_code" => "IDN"

				),
				'shipping_address' => array(
					"first_name" => $name,
					"last_name" => "",
					"email" => $email,
					"phone" => $nohp,
					"address" => $alamat,
					"city" => $kota,
					"postal_code" => $pos,
					"country_code" => "IDN"
				),
			];
			$a = json_encode($data['transaction_details']);
			$b = json_encode($data['item_details']);
			$c = json_encode($data['customer_details']);

			$data = '{
		"transaction_details":' . $a . ',
		"credit_card": {
			"secure": true
		},
		"item_details": ' . $b . ',
		"customer_details": ' . $c . '}';


			$response = $this->checkout_confirm($data);


			$dataorder = [
				'redirect_url' => $response->redirect_url,
			];

			$this->home->table_order()->update($dataorder, ['id_order' => $idlast]);
			return redirect()->to(base_url('/checkout_status/' . $idlast));
		} else {
			echo "<script>alert('keranjang anda kosong');</script>";
			return redirect()->to(base_url('/'));
		}
	}
	public function load_ongkir()
	{
		$id = $this->request->getPost('id');
		$this->home = new Modelhome();
		$data['ongkir'] = $this->home->table_ongkir()->where(['id_kota' => $id])->get()->getResult();
		return view('customer/daerah_ongkir', $data);
	}
	public function confirmation_view($id)
	{
		helper('cookie');
		$user = get_cookie('user');
		$this->home = new Modelhome();
		$data = [
			'order' => $this->home->table_order()->where(['user' => $user, 'id_order' => $id])->get()->getResult(),
		];

		foreach ($data['order'] as $obj) {
			$totalharga = 0;
			$obj->item = $this->home->table_order_cart()->join('product', 'product.id_product=tb_order_cart.id_product')->where(['tb_order_cart.id_order' => $obj->id_order])->get()->getResult();
			foreach ($obj->item as $obj1) {
				if ($obj1->diskon != 0 || $obj1->diskon != null) {
					$diskon = $obj1->diskon;
				} else {
					$diskon = 0;
				}
				$diskonan = $obj1->harga_product * $diskon / 100;
				$hasilharga = $obj1->harga_product - $diskonan;
				$obj1->hargadiskon = $hasilharga;

				$harga = $obj1->qty * $hasilharga;
				$totalharga += $harga;
			}
			$obj->total = $totalharga;
			$idorder = $obj->id_order_unique;


			$response = $this->cek_status_bayar($idorder);
			if ($response->status_code == 201 || $response->status_code == 200 || $response->status_code == 407) {
				$obj->statusbayar = $response->transaction_status;
			} else {
				$obj->statusbayar = $response->status_message;
			}
			$obj->statuscode = $response->status_code;
		}


		return view('customer/confirmation', $data);
	}
	public function check_order_id()
	{
		$name = $this->request->getPost('id');

		$this->home = new Modelhome();
		$cek = $this->home->table_order()->where(['id_order_unique' => $name])->countAllResults(false);
		if ($cek == 1) {
			$order = $this->home->table_order()->where(['id_order_unique' => $name])->get()->getRowArray();
			$id = $order['id_order'];
			$data = [
				'order' => $this->home->table_order()->where(['id_order' => $id])->get()->getResult(),
			];
			foreach ($data['order'] as $obj) {
				$totalharga = 0;
				$obj->item = $this->home->table_order_cart()->join('product', 'product.id_product=tb_order_cart.id_product')->where(['tb_order_cart.id_order' => $obj->id_order])->get()->getResult();
				foreach ($obj->item as $obj1) {
					if ($obj1->diskon != 0 || $obj1->diskon != null) {
						$diskon = $obj1->diskon;
					} else {
						$diskon = 0;
					}
					$diskonan = $obj1->harga_product * $diskon / 100;
					$hasilharga = $obj1->harga_product - $diskonan;
					$obj1->hargadiskon = $hasilharga;

					$harga = $obj1->qty * $hasilharga;
					$totalharga += $harga;
				}
				$obj->total = $totalharga;

				$idorder = $obj->id_order_unique;

				$response = $this->cek_status_bayar($idorder);
				if ($response->status_code == 201 || $response->status_code == 200 || $response->status_code == 407) {
					$obj->statusbayar = $response->status_message;
				} else {
					$obj->statusbayar = $response->status_message;
				}
				$obj->statuscode = $response->status_code;
			}
			return view('customer/detail_order', $data);
		} else {
			echo "<span class='appendata'>Data Tidak Ditermukan</span>";
		}
	}


	////CrUD midtrans
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


	///GOES ADMIN
	public function dashboard()
	{
		return view('index');
	}

	public function test()
	{
		$this->home = new Modelhome();
		$data['namatoko'] = $this->home->profile()->get(1)->getResult();


		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}





	//--------------------------------------------------------------------

}
