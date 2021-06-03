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

		.w3-display-right {
			right: 28.3%;
		}

		/* Début style responsive (via media queries) */

		@media only screen and (max-width: 670px) {
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

			.w3-display-right {
				position: absolute;
				top: 50%;
				right: 0;
				transform: translate(0%, -50%);
				display: inline-block;
				white-space: nowrap;
			}
		}



		.mySlides {
			display: none;
		}

		/* Fin style responsive */
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
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
									<td><a style="padding-right: 20px;" href="<?= base_url() ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a></td>

								</tr>
							</tbody>
						</table>
					</td>
				</tr>

				<!-- Fin bloc "mise en avant" -->
				<!-- Début article 1 -->
				<tr>
					<td>


						<div class="w3-content w3-display-container">
							<?php
							foreach ($product as $obj) {
							?>
								<img class="mySlides" src="<?= base_url('assets/product/' . $obj->image) ?>" style="width:100%">
							<?php
							}
							foreach ($pic as $obj) {
							?>
								<img class="mySlides" src="<?= base_url('assets/product_gallery/' . $obj->image) ?>" style="width:100%">
							<?php
							}
							?>
							<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)" style="position: absolute;top: 50%;transform: translate(0%,-50%);">❮</button>
							<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)" style="position: absolute;top: 50% ;transform: translate(0%,-50%);display: inline-block;white-space: nowrap;">❯</button>
						</div>
					</td>
				</tr>
				<?php
				foreach ($product as $obj) {
				?>
					<tr>
						<td class="resp-full-td" style="text-align : justify;" width="100%" valign="top">
							<a href="#" style="outline:none; text-decoration:none;margin: 10px;">
								<span style="font-size:25px; font-weight: bold; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131;"><?= $obj->nama_product ?></span></a>
							<hr style="width:100%; margin-left:0px; text-align:left; background-color:#2ecc71; color:#2ecc71; height: 2px; border: 0 none;" align="left">
							<a href="#" style="outline:none; text-decoration:none;margin: 10px;"><span style="font-size:20px; font-weight: bold; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131;">Rp. <?= number_format($obj->harga_product, 0, '.', '.') ?></span></a>
							<hr style="width:100%; margin-left:0px; text-align:left; background-color:#2ecc71; color:#2ecc71; height: 2px; border: 0 none;" align="left">
							<span style="font-size:16px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131;margin: 10px;"><?= $obj->deskripsi ?></span>
						</td>
					</tr>
					<tr>
						<td class="resp-full-td" style="padding-top:20px;" width="100%" valign="top">
							<table cellspacing="0" cellpadding="0" border="0" align="right">
								<tbody>
									<tr>
										<td>
											<button style="background-color: #2ecc71;border-radius: 3px;margin: 10px;"><a value="1" style="font-family:'helvetica neue', helvetica, arial, sans-serif; color:#ffffff; text-align: center; text-decoration: none; display:block; font-weight : 200; font-size: 16px;margin: 10px;" href="#">Add To Cart</a></button>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				<?php
				}
				?>

			</tbody>
		</table>
	</div>

	</tr>
	<!-- Fin article 1 -->
	<!-- Début article 2 -->



	<!-- Fin article 2 -->
	<!-- Début article 3 -->



	<!-- Fin article 3 -->


	</tbody>
	</table>

	<!-- Début footer -->



	<!-- Fin footer -->

	</div>



	<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
			showDivs(slideIndex += n);
		}

		function showDivs(n) {
			var i;
			var x = document.getElementsByClassName("mySlides");
			if (n > x.length) {
				slideIndex = 1
			}
			if (n < 1) {
				slideIndex = x.length
			}
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			x[slideIndex - 1].style.display = "block";
		}
	</script>


</body>

</html>
