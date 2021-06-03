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

			.btn-primary {
				width: 100%;
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
						<table style="width: 100%;font-size: 23px;padding: 13px;cursor: pointer;">
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
						<form method="post" action="#" style="margin: 10px;" id="formcheckout">
							<div class="form-group">
								<label for="">Masukan ID Unique Order</label>
								<input type="text" class="form-control" name="id" id="" required placeholder="Masukan ID Unique Order">

							</div>

							<div>
								<button type="submit" class="btn btn-primary">Check Order</button>
							</div>
						</form>

					</td>
				</tr>
				<tr>
					<td>
						<table style="width: 100%;background: whitesmoke;font-size: 23px;padding: 13px;cursor: pointer;">
							<tbody id="confirm_check">

							</tbody>
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



	<script type="text/javascript">
		$(document).ready(function() {
			$("#formcheckout").submit(function(e) {

				var data = $(this).serialize();
				e.preventDefault();
				$.ajax({
					type: "post",
					url: "<?= base_url('home/check_order_id') ?>",
					data: data,
					success: function(response) {
						$("#confirm_check").html(response);
					}
				});
			});

		});
	</script>

</body>

</html>
