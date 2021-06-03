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

	<!-- Fin bloc "mise en avant" -->
	<!-- Début article 1 -->
	<tr>
		<td>


			<div class="w3-content w3-display-container">
				<?php
				foreach ($product as $obj) {
				?>
					<img class="picGallery" src="<?= $obj->image ?>" style="width:100%">
				<?php
				}
				foreach ($pic as $obj) {
				?>
					<img class="picGallery" src="<?= $obj->url ?>" style="width:100%">
				<?php
				}
				?>
				<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)" style="position: absolute;top: 30%;transform: translate(0%,-50%);">❮</button>
				<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)" style="position: absolute;top: 30% ;transform: translate(0%,-50%);display: inline-block;white-space: nowrap;">❯</button>
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
				<hr style="width:100%; margin-left:0px; text-align:left; background-color:#2ecc71; color:#2ecc71; height: 2px; border: 0 none;" align="left">
				<span style="font-size:16px; font-family:'Helvetica Neue', helvetica, arial, sans-serif; color:#313131;margin: 10px;"><?= $obj->deskripsi ?></span>
			</td>
		</tr>
		<tr>
			<td class="resp-full-td" style="padding-top:20px;" width="100%" valign="top">
				<table cellspacing="0" cellpadding="0" border="0" align="right">
					<tbody>
						<tr>
						<tr class="statusqty<?= $obj->id_product ?>" style="background-color: #2ecc71;border-radius: 3px;padding: 6px 24px;">
							<?php
							if ($obj->qty == 0) {
								echo "
																		<td value='$obj->id_product' class='tambahkeuncart' style='background-color:#2ecc71;cursor:pointer; border-radius:3px; padding: 6px 24px;'>
																			Add To Cart
																		</td>";
							} else {
								echo "<td value='$obj->id_product' class='minicart' style='cursor: pointer;background-color:#71eaa4; padding: 6px 24px;'>
																						-
																					</td>
																					<td value='$obj->id_product' class='valueqty'  style='background-color:#71eaa4; padding: 6px 24px;'>
																						$obj->qty
																					</td>
																					<td value='$obj->id_product' class='tambahkeuncart' style='cursor: pointer;background-color:#71eaa4; padding: 6px 24px;'>
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
<?php
	}
?>

</tbody>

<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
		showDivs(slideIndex += n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("picGallery");
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

<script type="text/javascript">
	$(document).ready(function() {
		$("#backmain").click(function() {
			loadin();
			$("#main-item").css("display", "table");
			$("#detail-items").css("display", "none");
			loadout();
		});
		$(".minicart").click(function() {
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
		$(".tambahkeuncart").click(function() {
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
	});
</script>
