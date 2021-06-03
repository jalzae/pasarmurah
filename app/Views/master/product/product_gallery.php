<div class="gallery_list row">
	<?php
	foreach ($gallery as $obj) {
	?>
		<div class="column">
			<button class="delpic btn-danger" value='<?= $obj->id_product_gallery ?>' style="margin: 3px;width:100%">Delete</button>
			<button class="changpic btn-primary" value='<?= $obj->id_product_gallery ?>' style="margin: 3px;width:100%">Change</button>
			<img src="<?= $obj->url ?>" style="margin: 3px;max-width:100%;" alt="<?= $obj->id_product_gallery ?>" onclick="myFunction(this);">
		</div>
	<?php
	}
	?>

</div>

<!-- The expanding image container -->
<div class="container">

	<!-- Expanded image -->
	<img id="expandedImg" src="<?= $imgURL ?>" style="width:100%">

	<!-- Image text -->

</div>
<script type="text/javascript">
	$(document).ready(function() {
				$(".delpic").click(function(e) {
					e.preventDefault();
					var id = $(this).attr('value');
					$.ajax({
						type: "post",
						url: "<?= base_url('company/product_gallery_del') ?>",
						data: {
							id: id
						},
						success: function(response) {
							swal(response);
							list_gallery();
						}
					});

				});

				$(".changpic").click(function(e) {
					e.preventDefault();
					var id = $(this).attr('value');
					$.ajax({
						type: "post",
						url: "<?= base_url('company/product_gallery_change') ?>",
						data: {
							id: id
						},
						success: function(response) {
							swal(response);
							list_gallery();
						}
					});

				});
			});
</script>
