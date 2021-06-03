<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Product Control</h2>
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
					<div class="card-title">Control Your Product</div>

					<table id="example1" class="display table table-striped table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Desc</th>
								<th>Detail</th>
								<th>Edit</th>
								<th>Unpublish</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$no = 1;
							foreach ($product as $obj) {
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $obj->nama_product ?></td>
									<td><img  src="<?= $obj->image ?>" style="max-width: 200px;max-height:125px;" class="form-control-file" alt="your image" />
									</td>
									<td><?= $obj->deskripsi ?></td>
									<td><?= $obj->harga_product ?></td>
									<td class="editthis" data-target="#myModal" data-toggle="modal" value='<?= $obj->id_product ?>'>Edit</td>
									<?php
									if ($obj->is_publish != 0) {
										echo " <td class='unpublish' value='$obj->id_product '>Unpublish</td>";
									} else {

										echo " <td class='publish' value=' $obj->id_product '>Publish</td>";
									}
									?>


									<td class="deletethis" value='<?= $obj->id_product ?>'>Delete</td>
								</tr>
							<?php
								$no++;
							}
							?>
						</tbody>

					</table>

				</div>
			</div>
		</div>


	</div>

</div>

</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('#example1').DataTable();
		$(".editthis").click(function(e) {
			var id = $(this).attr('value');
			e.preventDefault();
			loadin();
			$.ajax({
				method: "post",
				url: "<?= base_url('company/product_edit') ?>",
				data: {
					id: id
				},
				success: function(response) {
					$(".modal-body").html(response);
					loadout();
				}
			});

		});
		$(".deletethis").click(function(e) {
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
						e.preventDefault();
						$.ajax({
							method: "post",
							url: "<?= base_url('company/product_delete') ?>",
							data: {
								id: id
							},
							success: function(response) {
								if (response == 1) {
									swal("Poof! Your product file has been deleted!", {
										icon: "success",
									});
								} else {
									swal("Delete Fail", {
										icon: "warning",
									});
								}
								$("#product_control").click();
							}
						});

					} else {
						swal("Your product is safe!");
					}
				});



		});

		$(".unpublish").click(function(e) {
			var id = $(this).attr('value');
			e.preventDefault();

			$.ajax({
				method: "post",
				url: "<?= base_url('company/product_unpublish') ?>",
				data: {
					id: id
				},
				success: function(response) {
					swal(response);
					$("#product_control").click();
				}
			});

		});
		$(".publish").click(function(e) {
			var id = $(this).attr('value');
			e.preventDefault();

			$.ajax({
				method: "post",
				url: "<?= base_url('company/product_publish') ?>",
				data: {
					id: id
				},
				success: function(response) {
					swal(response);
					$("#product_control").click();
				}
			});

		});

	});
</script>

<style type='text/css'>
	.editthis:hover {
		background: cyan;
		cursor: pointer;
	}

	.deletethis:hover {
		background: cyan;
		cursor: pointer;
	}

	.publish:hover {
		background: cyan;
		cursor: pointer;
	}

	.unpublish:hover {
		background: cyan;
		cursor: pointer;
	}
</style>
