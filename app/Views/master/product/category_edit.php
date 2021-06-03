<form id="formadd" method="POST" role="form">
	<div class="form-group">
		<label for="">Category Name</label>
		<?php
		foreach ($category as $obj) {
		?>
			<input type="hidden" class="form-control" name="id" value='<?= $obj->id_category ?>' placeholder="Input category name">
			<input type="text" class="form-control" name="nama" value='<?= $obj->name ?>' required placeholder="Input category name">
		<?php
		}
		?>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$("#formadd").submit(function(e) {
			var data = $(this).serialize();
			e.preventDefault();
			$.ajax({
				method: "post",
				data: data,
				url: "<?= base_url('/company/category_confirm_edit') ?>",
				success: function(response) {
					swal(response);
					loadcat();

				}
			});
			closemodal();
		});
	});
</script>
