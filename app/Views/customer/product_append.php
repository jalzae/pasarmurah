<?php
foreach ($product as $obj) {
?>

	<td>
		<table class="resp-full-product" cellspacing="0" cellpadding="0" border="0" align="center">
			<tbody>
				<tr>
					<td width="100%">
						<table class="resp-full-img" style="border-collapse:collapse; " cellspacing="0" cellpadding="0" border="0" align="left">
							<tbody>
								<tr>
									<td class="resp-full-td" style="text-align: center;">
										<img src='<?= $obj->image ?>' style="width:100%;border-radius:3px;" alt="Image article 1" border="0" class="img-index">
									</td>
								</tr>
							</tbody>
						</table>


					</td>
					<td>
						<table class="resp-full-ket" style="border-collapse:collapse;" cellspacing="0" cellpadding="0" border="0" align="right">
							<tbody>
								<tr>
									<td class="resp-full-detail" style="text-align : justify;width:55%;" valign="top">
										<a class="detail-product" href="#" value=" <?= $obj->id_product ?>" style="outline:none; text-decoration:none"><span style="font-size:25px; font-weight: bold; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131;"><?= $obj->nama_product ?></span></a>
										<hr style="width:100px; margin-left:0px; text-align:left; background-color:#2ecc71; color:#2ecc71; height: 2px; border: 0 none;" align="left" />
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
										<hr style="width:100px; margin-left:0px; text-align:left; background-color:#2ecc71; color:#2ecc71; height: 2px; border: 0 none;" align="left" />
										<span style="font-size:16px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131"><?= $obj->deskripsi ?></span>
									</td>
									<td class="resp-full-cart" style="max-width: 45%;" width=" 100%" valign="top">
										<table cellspacing="0" cellpadding="0" border="0" align="right">
											<tbody>
												<tr class="statusqty<?= $obj->id_product ?>" style="background-color: #2ecc71;border-radius: 3px;padding: 6px 24px;">
													<?php
													if ($obj->qty == 0) {
														echo "
																		<td value='$obj->id_product' class='addcart2' style='background-color:#2ecc71;cursor:pointer; border-radius:3px; padding: 6px 24px;'>
																			Tambah
																		</td>";
													} else {
														echo "<td value='$obj->id_product' class='mincart2' style='cursor: pointer;padding: 2px 15px;background-color:#71eaa4; '>
																						-
																					</td>
																					<td value='$obj->id_product' class='valueqty' style='padding: 2px 15px;background-color:#71eaa4;'>
																						$obj->qty
																					</td>
																					<td value='$obj->id_product' class='addcart2' style='cursor: pointer;background-color:#71eaa4; padding: 2px 15px;'>
																						+
																					</td>";
													}
													?>
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
<?php
}

?>
<script type="text/javascript">
	$(document).ready(function() {

		$(".addcart2").click(function() {
			var id = $(this).attr('value');
			$.ajax({
				type: "post",
				url: "<?= base_url('home/addcart') ?>",
				data: {
					id: id
				},
				success: function(response) {
					checkcart();
				}
			});
		});
		$(".mincart2").click(function() {
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
		$(".detail-product").click(function(e) {
			loadin();
			var id = $(this).attr('value');
			$.ajax({
				type: "post",
				url: "<?= base_url('home/product_details') ?>",
				data: {
					id: id
				},
				success: function(response) {
					$("#main-item").css("display", "none");
					$("#detail-items").html(response);
					$("#detail-items").css("display", "table");
					loadout();
				}
			});
		});
	});
</script>
