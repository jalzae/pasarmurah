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
					<div class="card-title"> Your Order</div>
					<div class="form-group">
						<label for="my-select">Filter</label>
						<select id="my-select" class="form-control" name="">
							<option value="0">Pilih Status</option>
							<option value="Diproses">Diproses</option>
							<option value="Dipacking">Dipacking</option>
							<option value="Dikirim">Dikirim</option>
							<option value="Terkirim">Terkirim</option>
						</select>
					</div>
					<table id="example1" class="display table table-striped table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Order ID</th>
								<th>Note</th>
								<th>Total</th>
								<th>Tanggal Order</th>
								<th>Status</th>
								<th>Status Bayar</th>
								<th>Detail</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$no = 1;
							foreach ($order as $obj) {
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $obj->id_order_unique ?></td>
									<td><?= $obj->note ?></td>
									<td><?= $obj->total_bayar ?></td>
									<td><?= $obj->entry_date ?></td>
									<?php
									if ($obj->status == 0) {
										$status = "Diproses";
									} else if ($obj->status == 1) {
										$status = "Dipacking";
									} else if ($obj->status == 2) {
										$status = "Dikirim";
									} else {
										$status = "Terkirim";
									}
									?>
									<td><?= $status ?></td>
									<td><?= $obj->statusbayar ?></td>
									<td class="detailthis" data-target="#myModal" data-toggle="modal" value='<?= $obj->id_order ?>'>Detail</td>
									<td class="editthis" data-target="#myModal" data-toggle="modal" value='<?= $obj->id_order ?>'>Edit</td>
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
		var table = $('#example1').DataTable();
		$('#my-select').change(function() {
			table.search($(this).val()).draw();
		});

		$(".editthis").click(function(e) {
			var id = $(this).attr('value');
			e.preventDefault();
			loadin();
			$.ajax({
				method: "post",
				url: "<?= base_url('company/order_edit') ?>",
				data: {
					id: id
				},
				success: function(response) {
					$(".modal-body").html(response);
					loadout();
				}
			});

		});
		$(".detailthis").click(function(e) {
			var id = $(this).attr('value');
			e.preventDefault();
			loadin();
			$.ajax({
				method: "post",
				url: "<?= base_url('company/order_detail') ?>",
				data: {
					id: id
				},
				success: function(response) {
					$(".modal-body").html(response);
					loadout();
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

	.detailthis:hover {
		background: cyan;
		cursor: pointer;
	}
</style>
