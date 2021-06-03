<form action="#" id="submitform" method="POST" role="form">
	<legend>Ongkir Add</legend>

	<div class="form-group">
		<label for="">Nama Daerah</label>
		<input type="text" class="form-control" name="daerah" id="" placeholder="Input daerah" required>
	</div>
	<div class="form-group">
		<label for="">Nama Kota</label>

		<select name="kota" id="input" class="form-control" required="required">
			<?php
			foreach ($kota as $obj) {
			?>
				<option value="<?= $obj->id_kota ?>"><?= $obj->nama_kota ?></option>
			<?php
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label for="">Ongkos Kirim</label>
		<input type="text" class="form-control" onkeypress="return isNumber(event)" name="harga" id="" placeholder="Input harga" required>
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
				url: "<?= base_url('company/ongkir_add_confirm') ?>",
				data: data,
				success: function(response) {
					swal(response);
					closemodal();
					$("#ongkir").click();
				}
			});

		});
	});
</script>
