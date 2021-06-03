<?php
foreach ($cart as $obj) {
?>

	<form action="#" id="formnote" method="POST" role="form">

		<div class="form-group">
			<label for="">Masukan Note</label>
			<input type="hidden" class="form-control" name="id" value='<?= $obj->id_cart ?>' placeholder="Input field">
			<input type="text" class="form-control" value='<?= $obj->note ?>' name="note" placeholder="Input field">
		</div>
		<button type="submit" class="btn btn-primary" style="max-width: 100%;">Submit Note</button>
	</form>

<?php
}
?>


<script type="text/javascript">
	$(document).ready(function() {
		$("#formnote").submit(function(e) {
			var data = $(this).serialize();
			e.preventDefault();
			$.ajax({
				type: "post",
				url: "<?= base_url('home/cart_note_confirm') ?>",
				data: data,
				success: function(response) {
					alert(response);
					$(".modalclose").click();
				}
			});
		});
	});
</script>
