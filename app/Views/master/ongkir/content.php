<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Harga Ongkir </h2>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				<a href="#" class="btn btn-secondary btn-round" value="a" id="addbutton" data-toggle="modal" data-target="#myModal">Add Ongkir </a>

			</div>
		</div>
	</div>
</div>

<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-body">


					<table id="example1" class="display table table-striped table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Kota</th>
								<th>Nama Daerah</th>
								<th>Harga Ongkir</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$no = 1;
							foreach ($ongkir as $obj) {
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $obj->nama_kota ?></td>
									<td><?= $obj->nama_daerah ?></td>
									<td>Rp. <?= number_format($obj->harga, 0, '.', '.') ?></td>
									<td class="editthis" data-target="#myModal" data-toggle="modal" value='<?= $obj->id_ongkir ?>'>Edit</td>
									<td class="deletethis" value='<?= $obj->id_ongkir ?>'>Delete</td>
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

<style type='text/css'>
	.editthis:hover {
		background: cyan;
		cursor: pointer;
	}

	.deletethis:hover {
		background: cyan;
		cursor: pointer;
	}
</style>


<script type="text/javascript">
	$(document).ready(function() {
		$('#example1').DataTable();
		$("#addbutton").click(function(e) {
			$(".loader-wrapper").fadeIn("slow");
			$.ajax({
				method: "post",
				url: "<?= base_url('/company/ongkir_add') ?>",
				success: function(response) {
					$(".modal-body").html(response);
					$(".loader-wrapper").fadeOut("slow");
				}
			});
		});
		$(".editthis").click(function(e) {
			var id = $(this).attr('value');
			e.preventDefault();
			loadin();
			$.ajax({
				method: "post",
				url: "<?= base_url('company/ongkir_update') ?>",
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
							url: "<?= base_url('company/ongkir_del') ?>",
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
								$("#ongkir").click();
							}
						});

					} else {
						swal("Your product is safe!");
					}
				});



		});


	});
</script>
