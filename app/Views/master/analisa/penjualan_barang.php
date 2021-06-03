<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Hasil Analisa Penjualan </h2>
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
			

					<table id="example1" class="display table table-striped table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Barang</th>
								<th>Total Terjual</th>
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
									<td><?= $obj->hasil ?></td>
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


	});
</script>

