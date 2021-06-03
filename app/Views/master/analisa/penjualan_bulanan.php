<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Hasil Analisa Harian </h2>
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
					<form method="post" id="formthis">
						<div class="form-group">
							<!-- Date input -->
							<label class="control-label" for="date">Date</label>
							<input placeholder="masukkan tanggal " type="text" class="form-control datepicker" name="tgl">
						</div>
						<div class="form-group">
							<!-- Submit button -->
							<button class="btn btn-primary " name="submit" type="submit">Submit</button>
						</div>
					</form>

					<table id="example1" class="display table table-striped table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>ID Order</th>
								<th>Total Harga</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$no = 1;
							foreach ($product as $obj) {
							?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $obj->id_order_unique ?></td>
									<td><?= $obj->total_bayar ?></td>
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
		$(".datepicker").datepicker({
			format: 'yyyy-mm',
			viewMode: "months",
			minViewMode: "months"
		});
		var table = $('#example1').DataTable();
		$("#formthis").submit(function(e) {
			var data = $(this).serialize();
			loadin();
			e.preventDefault();
			$.ajax({
				type: "post",
				url: "<?= base_url('company/analisa_bulanan_filter') ?>",
				data: data,
				success: function(response) {
					$("#example1").DataTable();
					loadout();
				}
			});
		});

	});
</script>
