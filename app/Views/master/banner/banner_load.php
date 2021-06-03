<thead>
	<tr>
		<th>No</th>
		<th>Name </th>
		<th>Image </th>
		<th>Delete</th>
	</tr>
</thead>
<tbody>
	<?php
	$no = 1;
	foreach ($category as $obj) {
	?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $obj->nama_banner ?></td>
			<td><img src="<?=  $obj->url ?>" style="max-width: 200px;max-height:125px;" class="form-control-file" alt="your image" />
			</td>
			<td class="deletethis" value="<?= $obj->id_banner ?>">Delete</td>
		</tr>

	<?php
		$no++;
	}
	?>
</tbody>


<script type="text/javascript">
	$(document).ready(function() {

		$(".deletethis").click(function(e) {
			e.preventDefault();
			var id = $(this).attr('value');
			swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this data!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							method: "post",
							data: {
								id: id
							},
							url: "<?= base_url('/company/banner_del') ?>",
							success: function(response) {
								swal(response);
								$("#banner").click();
							}
						});


					} else {
						swal("Your data file is safe!");
					}
				});


		});
	});
</script>
