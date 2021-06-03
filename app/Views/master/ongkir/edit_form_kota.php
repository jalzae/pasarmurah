<form action="#" id="submitform" method="POST" role="form">
	<legend>Kota Edit</legend>
	<?php
	foreach ($ongkir as $obj) {
	?>
		<div class="form-group">
			<label for="">Nama Kota</label>
			<input type="hidden" class="form-control" name="id" value='<?= $obj->id_kota ?>' id="" placeholder="Input daerah" required>
			<input type="text" class="form-control" name="daerah" id="" value='<?= $obj->nama_kota ?>' placeholder="Input daerah" required>
		</div>


	<?php
	}
	?>

	<button type="submit" class="btn btn-primary">Update</button>
</form>


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
	$(document).ready(function() {
		$("#submitform").submit(function(e) {
			var data = $(this).serialize();
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "<?= base_url('company/kota_update_confirm') ?>",
				data: data,
				success: function(response) {

					closemodal();
					$("#ongkir_kota").click();
				}
			});

		});
	});
</script>
