<form action="#" id="submitform" method="POST" role="form">
	<legend>Ongkir Edit</legend>
	<?php
	foreach ($ongkir as $obj) {
	?>
		<div class="form-group">
			<label for="">Nama Daerah</label>
			<input type="hidden" class="form-control" name="id" value='<?= $obj->id_ongkir ?>' id="" placeholder="Input daerah" required>
			<input type="text" class="form-control" name="daerah" id="" value='<?= $obj->nama_daerah ?>' placeholder="Input daerah" required>
		</div>

		<div class="form-group">
			<label for="">Ongkos Kirim</label>
			<input type="text" class="form-control" value='<?= $obj->harga ?>' onkeypress="return isNumber(event)" name="harga" id="" placeholder="Input harga" required>
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
				url: "<?= base_url('company/ongkir_update_confirm') ?>",
				data: data,
				success: function(response) {
				
					closemodal();
					$("#ongkir").click();
				}
			});

		});
	});
</script>
