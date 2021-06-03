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

		.btn-primary {
			width: 640px;
		}

		/* Début style responsive (via media queries) */

		@media only screen and (max-width: 660px) {
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

			.btn-primary {
				width: 100%;
			}
		}

		/* Fin style responsive */
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js') ?>"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
									<td><a href="<?= base_url() ?>"><i class="fa fa-arrow-left" aria-hidden="true" style="padding-right: 20px;"></i>Back</a></td>

								</tr>
							</tbody>
						</table>
					</td>
				</tr>

				<!-- Fin bloc "mise en avant" -->
				<!-- Début article 1 -->
				<tr>

					<td>
						<form method="post" action="<?= base_url('home/confirmation') ?>" style="margin: 10px;" id="formcheckout">
							<div class="form-group">
								<label for="">Nama Penerima</label>
								<input type="text" class="form-control" name="name" id="penerima" required placeholder="Nama Penerima">

							</div>
							<div class="form-group">
								<label for="">Alamat Penerima</label>
								<textarea id="alamat" name="alamat" placeholder="Alamat Tujuan" class="form-control" rows="3" required="required"></textarea>

							</div>
							<div class="form-group">
								<label for="">Kota</label>
								<select name="kota" id="kota" class="form-control" required="required">
									<option value="0">Pilih Kota</option>
									<?php
									foreach ($ongkir as $obj) {

										echo '<option  value2="' . $obj->id_kota . '" value="' . $obj->nama_kota . '">' . $obj->nama_kota . ' </option>';
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="">Daerah (Ongkir)</label>

								<select name="daerah" id="daerah" class="form-control" required="required">
									<option value="0">Pilih Kota</option>
								</select>

							</div>


							<div class="form-group">
								<label for="">No Hp</label>
								<input type="text" class="form-control" name="nohp" id="nohp" onkeypress="return isNumber(event)" maxlength="13" required pattern="[0-9].{10,}" title="10 character numbering or more">
							</div>
							<div class=" form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Digunakan untuk pengiriman slip tf">
							</div>
							<div class=" form-group">
								<label for="">Catatan Untuk Seller</label>

								<textarea name="catatan" id="input" class="form-control" rows="3"></textarea>

							</div>
							<div class="form-group">
								<label for="">Total Harga</label>
								<input type="text" class="form-control" name="total" value='<?= $total ?>' readonly id="total" required placeholder="">
							</div>

							<div>
								<button type="submit" id="submitform" class="btn btn-primary" style="bottom:0px;position: fixed;">Checkout</button>
							</div>
						</form>
						<div id="tablepesanan" class="form-group" style="margin: 10px;">

						</div>
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
		function isNumber(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if ((charCode > 31 && charCode < 48) || charCode > 57) {
				return false;
			}
			return true;
		}
	</script>
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
			$("#kota").change(function(e) {
				var id = $('option:selected', this).attr('value2');
				e.preventDefault();
				$.ajax({
					type: "post",
					url: "<?= base_url('home/load_ongkir') ?>",
					data: {
						id: id
					},
					success: function(response) {
						$("#daerah").html(response);
					}
				});
			});
			$("#submitform").click(function(e) {

				var daerah = $("#daerah").val();
				var kota = $("#kota").val();
				var penerima = $("#penerima").val();
				var nohp = $("#nohp").val();
				var alamat = $("#alamat").val();
				e.preventDefault();
				if ((daerah == 0) && (kota == 0) && (penerima == "") && (nohp == "") && (alamat == "")) {
					alert("Form Wajib Harus Diisi");
					return false;
				} else {
					$("#formcheckout").submit();
				}
			});

		});
	</script>

</body>

</html>
