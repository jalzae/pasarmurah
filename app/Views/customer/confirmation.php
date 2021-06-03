<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Pasar Murah</title>
	<style type="text/css" media="screen">
		.ExternalClass * {
			line-height: 100%
		}

		/* Début style responsive (via media queries) */

		@media only screen and (max-width: 480px) {
			*[id=email-penrose-conteneur] {
				width: 100% !important;
			}

			table[class=resp-full-table] {
				width: 100% !important;
				clear: both;
			}

			td[class=resp-full-td] {
				width: 100% !important;
				clear: both;
			}

			img[class="email-penrose-img-header"] {
				width: 100% !important;
				max-width: 340px !important;
			}
		}

		/* Fin style responsive */
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js') ?>"></script>
</head>

<body style="background-color:#ecf0f1">
	<div style="background-color:#ecf0f1;" align="center">

		<!-- Début en-tête -->



		<!-- Fin en-tête -->

		<table id="email-penrose-conteneur" style="border-right:1px solid #e2e8ea; border-bottom:1px solid #e2e8ea; border-left:1px solid #e2e8ea; background-color:#ffffff;" width="660" cellspacing="0" cellpadding="0" border="0" align="center">

			<!-- Début bloc "mise en avant" -->

			<tbody>


				<tr>
					<td>
						<table style="width: 100%;background: whitesmoke;font-size: 23px;padding: 13px;cursor: pointer;">
							<tbody>
								<tr>
									<td class="backhome"><i class="fa fa-arrow-left" aria-hidden="true" style="padding-right: 20px;"></i>Back</td>

								</tr>
							</tbody>
						</table>
					</td>
				</tr>

				<!-- Fin bloc "mise en avant" -->
				<!-- Début article 1 -->
				<tr>
					<td>
						<span style="margin: 10px;">Berikut Link pembayaran dan status pembayaran anda</span>
					</td>
				</tr>
				<tr>
					<td>
						<table class="table table-bordered" style="margin: 10px;max-width: 90%;">

							<tbody>

								<tr>
									<?php
									foreach ($order as $obj) {
									?>
										<td>1
										</td>
										<td><?= $obj->entry_date ?>
										</td>
										<td>
											<?php
											if ($obj->status == 0) {
												echo "Menunggu konfirmasi";
											} else if ($obj->status == 1) {
												echo "Barang dikemas";
											} else if ($obj->status == 2) {
												echo "Barang dikirim";
											} else {
												echo "Barang diterima";
											}

											?>
										</td>
										<td>
											Status Bayar : <?= $obj->statusbayar ?>
										</td>
										<td>
											<?php
											if ($obj->statuscode == 200) {
												echo "Sudah Dibayar";
											} else {
												echo "<a href='$obj->redirect_url'  target='_blank' type='button' class='btn btn-primary'>Bayar</a>";
											}
											?>

										</td>
									<?php
									}
									?>
								</tr>

							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<span style="margin: 10px;">Order Detail :</span>
					</td>
				</tr>
				<tr>
					<td>
						<table class="table table-bordered" style="margin: 10px;max-width: 90%;">
							<?php
							foreach ($order as $obj1) {
							?>
								<tbody>
									<tr>
										<td>ID Order </td>

										<td><?= $obj1->id_order_unique ?></td>

									</tr>

									<tr>
										<td>No HP </td>

										<td><?= $obj1->no_hp ?></td>
									</tr>
									<tr>
										<td>Alamat Kirim </td>

										<td><?= $obj1->alamat ?></td>
									</tr>
								</tbody>
							<?php

							}
							?>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<span style="margin: 10px;">List Pesanan :</span>
					</td>
				</tr>
				<tr>
					<td>
						<table class="table table-bordered" style="margin: 10px;max-width: 90%;">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama Barang</th>
									<th scope="col">Qty</th>
									<th scope="col">Price</th>
								</tr>
							</thead>
							<?php

							foreach ($order as $obj) {
								$no = 1;
							?>
								<tbody>
									<?php
									foreach ($obj->item as $obj1) {
									?>
										<tr>
											<th scope="row"><?= $no ?></th>
											<td><?= $obj1->nama_product ?></td>
											<td><?= $obj1->qty ?></td>
											<td><?php
												if ($obj1->diskon == 0 || $obj1->diskon == null) {
													echo number_format($obj1->harga_product, 0, '.', '.');
												} else {

													echo "<strike>" . number_format($obj1->harga_product, 0, '.', '.') . "</strike> Rp." . number_format($obj1->hargadiskon, 0, '.', '.');
												}
												?></td>
										</tr>
									<?php
										$no++;
									}
									?>

								</tbody>

								<tfoot>
									<tr>
										<th scope="row">Ongkir</th>
										<td colspan="3"><?= $obj->ongkir ?></td>
									</tr>
									<tr>
										<th scope="row">Total Belanja</th>
										<td colspan="3"><?= $obj->total ?></td>
									</tr>
									<tr>
										<th scope="row">Total</th>
										<td colspan="3"><?= $obj->total_bayar ?></td>
									</tr>
								</tfoot>
							<?php
							}
							?>
						</table>
					</td>
				</tr>
				<!-- Fin article 1 -->
				<!-- Début article 2 -->



				<!-- Fin article 2 -->
				<!-- Début article 3 -->



				<!-- Fin article 3 -->


			</tbody>
		</table>

		<!-- Début footer -->

		<table id="email-penrose-conteneur" style="padding:20px 0px;" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
			<tbody>
				<tr>
					<td>
						<table class="resp-full-table" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
							<tbody>
								<tr>
									<td class="resp-full-td" style="text-align: center;" width="100%"><span style="font-size:12px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#aeb2b3">This newsletter was sent by XXX.
											<br>
											If you wish to receive news from us, you can <a href="#" style="color:#737677;">unsubscribe here</a>.</span>
										<hr style="margin-left:0px; text-align:left; background-color:#aeb2b3; color:#aeb2b3; height: 1px; border: 0 none;" align="left">
										<span style="font-size:12px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#aeb2b3">Design by Penrose.</span>
									</td>
								</tr>

							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>

		<!-- Fin footer -->

	</div>
	<style type='text/css'>
		.FloatBox {
			width: 400px;
			height: 50px;
			border-radius: 15px;
			position: fixed;
			background-color: #84f870;
			top: 50%;
			left: 50%;
			margin-left: -180px;
			margin-top: 100px;
			display: block ruby;
		}


		@media only screen and (max-width:700px) {
			[class*="FloatBox"] {
				width: 90%;
				height: 50px;
				border-radius: 15px;
				position: fixed;
				background-color: #84f870;
				top: 50%;
				left: 35%;
				margin-left: -180px;
				margin-top: 100px;
				display: block ruby;
			}
		}
	</style>


	<script type="text/javascript">
		function loadtotal() {
			$.ajax({
				type: "post",
				url: "<?= base_url('home/load_total') ?>",
				success: function(response) {
					$("#total").val(response);
				}
			});
		}

		function loadtable() {
			$.ajax({
				type: "post",
				url: "<?= base_url('home/load_cart_user') ?>",
				success: function(response) {
					$("#tablepesanan").html(response);
				}
			});
		}
		$(document).ready(function() {
			loadtable();
			loadtotal();
			$("#formcheckout").submit(function(e) {
				var data = $(this).serialize();
				e.preventDefault();
				$.ajax({
					type: "post",
					url: "<?= base_url('home/checkout_confirmation') ?>",
					data: data,
					success: function(response) {
						window.open('<?= base_url('home/confirmation') ?>', '_blank');
					}
				});
			});
			$(".backhome").click(function(e) {
				window.location.href = "<?= base_url(); ?>";

			});
		});
	</script>

</body>

</html>
