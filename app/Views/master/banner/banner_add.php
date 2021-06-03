         <form id="productform" action="#" method="POST" enctype="multipart/form-data">

         	<div class="form-group">
         		<label for="">Banner Name</label>
         		<input type="text" class="form-control" id="bannername" required placeholder="Input product Name">
         	</div>

         	<div class="form-group">
         		<label for="">Banner Image </label>
         		<input type="file" onchange="readURL(this);" class="form-control-file" name="fileupload" required="" id="exampleFormControlFile1">
         		<img id="blah" src="http://placehold.it/180" style="max-width: 660px;max-height:150px;" class="form-control-file" alt="your image" />
         	</div>

         	<button type="submit" class="btn btn-primary">Submit Banner</button>
         </form>


         <script type="text/javascript">
         	function readURL(input) {
         		var ext = $('#exampleFormControlFile1').val().split('.').pop().toLowerCase();
         		if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
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
         			e.preventDefault();
         			data = new FormData(this);
         			data.append("name", $('#bannername').val());
         			data.append("fileupload", $('#exampleFormControlFile1').val());


         			$.ajax({
         				type: "POST",
         				url: "<?= base_url('company/banner_add_confirm') ?>",
         				data: data,
         				processData: false,
         				contentType: false,
						 dataType:'html',
         				success: function(response) {
         					swal(response);
         					$("#banner").click();
         					closemodal();
         				}
         			});

         		});
         	});
         </script>
