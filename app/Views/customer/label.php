<tbody>


	<tr>
		<td>
			<table id="backmain" style="width: 100%;background: whitesmoke;font-size: 23px;padding: 13px;cursor: pointer;">
				<tbody>
					<tr>
						<td><span style="padding-right: 20px;" href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</span></td>

					</tr>
				</tbody>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<form id="searchthis" class="example" action="#" method="post">
				<input type="text" required placeholder="Search.." name="search">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</td>
	</tr>

	<!-- Fin bloc "mise en avant" -->
	<!-- Début article 1 -->

	<?php
	foreach ($product as $obj) {
	?>
		<tr id="resultsearch">
			<td style="border-bottom: 1px solid #e2e8ea">
				<table class="resp-full-product" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td width="100%">
								<table class="resp-full-img" style="border-collapse:collapse; " cellspacing="0" cellpadding="0" border="0" align="left">
									<tbody>
										<tr>
											<td class="resp-full-td" style="text-align: center;">
												<img src='<?= $obj->image ?>' style="width:100px;border-radius:3px;" alt="Image article 1" border="0" class="img-index">
											</td>
										</tr>
									</tbody>
								</table>

								<table class="resp-full-ket" style="border-collapse:collapse;" cellspacing="0" cellpadding="0" border="0" align="right">
									<tbody>
										<tr>
											<td class="resp-full-detail" style="text-align : justify;width:55%;" valign="top">
												<a class="detail-product" href="#" value=" <?= $obj->id_product ?>" style="outline:none; text-decoration:none"><span style="font-size:25px; font-weight: bold; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131;"><?= $obj->nama_product ?></span></a>
												<hr style="width:100px; margin-left:0px; text-align:left; background-color:#2ecc71; color:#2ecc71; height: 2px; border: 0 none;" align="left">

												<?php
												if ($obj->diskon != 0 || $obj->diskon == null) {
												?>
													<a href="#" style="outline:none; text-decoration:none;"><span style="font-size:14px; font-weight: bold; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131;">
															<strike>Rp. <?= number_format($obj->harga_product, 0, '.', '.') ?></strike></span><br>
														<span style="font-size:12px; font-weight: bold; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#060505;background: #ef8080;">Disc <?= $obj->diskon ?><i class="fa fa-percent" aria-hidden="true"></i>
														</span>
														<span style="font-size:20px; font-weight: bold; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131;">Rp. <?= number_format($obj->hargadiskon, 0, '.', '.') ?></span></a>

												<?php } else { ?>
													<a href="#" style="outline:none; text-decoration:none;"><span style="font-size:20px; font-weight: bold; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131;">Rp. <?= number_format($obj->harga_product, 0, '.', '.') ?></span></a>

												<?php
												}
												?>

												<br>

												<hr style="width:100px; margin-left:0px; text-align:left; background-color:#2ecc71; color:#2ecc71; height: 2px; border: 0 none;" align="left">
												<span style="font-size:16px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131"><?= $obj->deskripsi ?></span>
											</td>
											<td class="resp-full-cart" style="max-width: 45%;" width=" 100%" valign="top">
												<table cellspacing="0" cellpadding="0" border="0" align="right">
													<tbody>
														<tr>
														<tr class="statusqty<?= $obj->id_product ?>" style="background-color: #2ecc71;border-radius: 3px;padding: 6px 24px;">
															<?php
															if ($obj->qty == 0) {
																echo "
																		<td value='$obj->id_product' class='tambahcart' style='background-color:#2ecc71;cursor:pointer; border-radius:3px; padding: 6px 24px;'>
																			Tambah
																		</td>";
															} else {
																echo "<td value='$obj->id_product' class='miniicart' style='cursor: pointer;background-color:#71eaa4; padding: 2px 15px;'>
																						-
																					</td>
																					<td value='$obj->id_product' class='valueqty'  style='background-color:#71eaa4; padding: 2px 15px;'>
																						$obj->qty
																					</td>
																					<td value='$obj->id_product' class='tambahcart' style='cursor: pointer;background-color:#71eaa4;padding: 2px 15px;'>
																						+
																					</td>";
															}
															?>
														</tr>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>

					</tbody>
				</table>
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


<script type="text/javascript">
	$(document).ready(function() {
		$("#backmain").click(function() {
			loadin();
			$("#main-item").css("display", "table");
			$("#detail-items").css("display", "none");
			loadout();
		});
		$(".miniicart").click(function() {
			var id = $(this).attr('value');
			$.ajax({
				type: "post",
				url: "<?= base_url('home/mincart') ?>",
				data: {
					id: id
				},
				success: function(response) {
					$(".statusqty" + id).html(response);
					checkcart();
				}
			});
		});
		$(".tambahcart").click(function() {
			var id = $(this).attr('value');
			$.ajax({
				type: "post",
				url: "<?= base_url('home/addcart') ?>",
				data: {
					id: id
				},
				success: function(response) {
					$(".statusqty" + id).html(response);
					checkcart();
				}
			});
		});
		$(".example").submit(function(e) {
			loadin();
			var data = $(this).serialize();
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "<?= base_url('home/search_inside') ?>",
				data: data,
				success: function(response) {
					$("#resultsearch").html(response);
					loadout();
				}
			});
		});
	});
</script>
