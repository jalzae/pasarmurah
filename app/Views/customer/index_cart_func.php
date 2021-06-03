<?php
foreach ($product as $obj) {
	if ($obj->qty == 0) {
		echo "
	<td value='$obj->id_product' class='addkeuncart' style='background-color:#2ecc71;cursor:pointer; border-radius:3px; padding: 6px 24px;'>
		Tambah
	</td>";
	} else {
		echo "<td value='$obj->id_product' class='minkeuncart' style='cursor: pointer;background-color:#71eaa4; padding: 2px 15px;'>
					-
				</td>
				<td value='$obj->id_product' class='valueqty'  style='background-color:#71eaa4; padding: 2px 15px;'>
					$obj->qty
				</td>
				<td value='$obj->id_product' class='addkeuncart' style='cursor: pointer;background-color:#71eaa4; padding: 2px 15px;'>
					+
				</td>";
	}
}
?>

<script type="text/javascript">
	$(document).ready(function() {
		counter = 3;

	
		$(".addkeuncart").click(function() {
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
		$(".minkeuncart").click(function() {
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





	});
</script>
