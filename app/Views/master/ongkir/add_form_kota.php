<form action="#" id="submitform" method="POST" role="form">
	<legend>Kota Add</legend>

	<div class="form-group">
		<label for="">Nama Kota</label>
		<input type="text" class="form-control" name="daerah" id="" placeholder="Input daerah" required>
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
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
				url: "<?= base_url('company/kota_add_confirm') ?>",
				data: data,
				success: function(response) {
				swal(response);
				closemodal();
				$("#ongkir_kota").click();
				}
			});

		});
	});
</script>
