<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Product Add</h2>
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
					<div class="card-title">Add Your Product</div>

					<form id="productform" action="#" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label for="">Product Name</label>
							<input type="text" class="form-control" id="namep" name="name" required placeholder="Input product Name">
						</div>
						<div class="form-group">
							<label for="">Product Description</label>
							<textarea name="desc" placeholder="Product Description..." id="desc" class="form-control" rows="3" required="required"></textarea>
						</div>
						<div class="form-group">
							<label for="">Product Image Header</label>
							<input type="file" onchange="readURL(this);" class="form-control-file" name="fileupload" required id="exampleFormControlFile1">
							<label for="">Product Image Preview</label>
							<img id="blah" src="http://placehold.it/180" style="max-width: 400px;max-height:250px;" class="form-control-file" alt="your image" />
						</div>


						<div class="form-group">
							<label for="">Product Price</label>
							<input name="price" type="number" onkeypress="return isNumber(event)" class="form-control" id="price" required placeholder="Input product price">
						</div>
						<div class="form-group">
							<label for="">Product Pcs</label>
							<input name="pcs" type="text" class="form-control" id="pcs" required placeholder="Input product price">
						</div>


						<button type="submit" class="btn btn-primary">Submit Product</button>
					</form>

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
		$("#productform").submit(function(e) {
			loadin();
			e.preventDefault();
			data = new FormData(this);
			data.append("fileupload", $('#exampleFormControlFile1').val());
			data.append("name", $('#namep').val());
			data.append("desc", $('#desc').val());
			data.append("price", $('#price').val());
			data.append("pcs", $('#pcs').val());

			$.ajax({
				type: "POST",
				url: "<?= base_url('company/product_add_confirm') ?>",
				data: data,
				processData: false,
				contentType: false,
				dataType: 'html',
				success: function(response) {
					$(".content").html(response);
					loadout();
				}
			});
			return false;

		});
	});
</script>
