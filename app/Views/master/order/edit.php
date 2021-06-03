<?php
foreach ($order as $obj) {
?>
	<form id="editform" method="POST" role="form">
		<legend>Edit Status Order</legend>

		<div class="form-group">
			<label for=""><?= $obj->id_order_unique ?></label>
			<input type="hidden" name="id" value='<?= $obj->id_order ?>' class="form-control" placeholder="Input field">

			<select value='<?= $obj->status ?>' name="status" id="input" class="form-control" required="required">
				<option value="0">Diproses</option>
				<option value="1">Dipacking</option>
				<option value="2">Dibayar</option>
				<option value="3">Diterima</option>
			</select>

		</div>



		<button type="submit" class="btn btn-primary">Update</button>
	</form>
<?php
}
?>

<script type='text/javascript'>
	$(document).ready(function() {
		$("#editform").submit(function(e) {
			var data = $(this).serialize();
			e.preventDefault();
			$.ajax({
				type: "post",
				url: "<?= base_url('company/order_edit_confirm') ?>",
				data: data,
				success: function(response) {
					swal(response);
					$("#order").click();	
				}
			});
			closemodal();
		});
	});
</script>
