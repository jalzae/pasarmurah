<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Information</h2>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
			</div>
		</div>
	</div>
</div>

<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">Set Your Store</div>
					<?php
					foreach ($info as $obj)
					{
					?>
					<form class="productform" action="#" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label for=""><?= $obj->nama_setting ?></label>
							<input type="hidden" class="form-control" id="namep" name="idi" value='<?= $obj->id_profile ?>' required placeholder="Input product Name">
							<input type="text" class="form-control" value='<?= $obj->value ?>' id="namep" name="name" required placeholder="Input product Name">
						</div>

						<button type="submit" class="btn btn-primary">Update Info</button>
					</form>
					<?php
					}
					?>

				</div>
			</div>
		</div>


	</div>

</div>

</div>

<script type="text/javascript">
	function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if ((charCode > 31 && charCode < 48) || charCode > 57) {
			return false;
		}
		return true;
	}

	function readURL(input) {
		var ext = $('#exampleFormControlFile1').val().split('.').pop().toLowerCase();
		if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
			swal('invalid extension!');
			$('#exampleFormControlFile1').val('');
		} else {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#blah')
						.attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".productform").submit(function(e) {
			loadin();
			e.preventDefault();
			data = $(this).serialize();

			$.ajax({
				type: "POST",
				url: "<?= base_url('company/info_update') ?>",
				data: data,
				success: function(response) {
					swal(response);
					loadout();
				}
			});
			return false;

		});
	});
</script>
