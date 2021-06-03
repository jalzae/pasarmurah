<?php
foreach ($order as $obj) {
	echo '<button class="delcat btn-danger" style="margin: 10px;"  value="' . $obj->id_detail_category . '">';
	echo $obj->name;
	echo '<span aria-hidden="true">&times;</span>
</button>';
}
?>

<script type="text/javascript">
	$(document).ready(function() {
		$(".delcat").click(function() {
			var id = $(this).attr('value');
			$.ajax({
				method: "POST",
				url: "<?= base_url('company/product_category_delete') ?>",
				data: {
					id: id
				},
				success: function(response) {
					swal(response);
				}
			});
			list_category();
		});
	});
</script>
