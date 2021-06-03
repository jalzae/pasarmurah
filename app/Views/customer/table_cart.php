<label for="">Pesanan Anda</label>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Qty</th>
			<th>Harga</th>

			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($cart as $obj) {
		?>
			<tr>
				<td><?= $no ?></td>
				<td><img src="<?= $obj->image ?>" width="100px"><br><?= $obj->nama_product ?></td>
				<td><button type=""><i value='<?= $obj->id_cart ?>' class="kurangqty fa fa-arrow-left" aria-hidden="true"></i></button><span style="margin: 10px;"> <?= $obj->qty ?></span><button type=""><i class="tambahqty fa fa-arrow-right" value='<?= $obj->id_cart ?>' aria-hidden="true"></i></button></td>
				<td>
					<?php
					if ($obj->diskon != 0 || $obj->diskon != null) {
						echo "<strike>" . number_format($obj->harga_product, 0, '.', '.') . "</strike> Rp." . number_format($obj->hargadiskon, 0, '.', '.');
					} else {
						echo number_format($obj->harga_product, 0, '.', '.');
					}
					?>
				</td>
				<td class="delthis" value='<?= $obj->id_cart ?>' style="cursor:pointer;">Delete</td>
			</tr>
			<tr class="product<?= $obj->id_cart ?>">
				<td colspan="5">

					<form action="#" class="formnote" method="POST" role="form">

						<div class="form-group" style="display: flex;">
							<input type="hidden" class="form-control" value='<?= $obj->id_cart ?>' name="id" placeholder="Tambahkan Note" required>
							<input type="text" class="form-control" name="note" value='<?= $obj->note ?>' placeholder="Tambahkan Note" required style="max-width: 70%;">
							<button type=" submit" class="btn btn-primary" style="max-width: 25%;margin-left: 2px;">Submit</button>
						</div>
					</form>

				</td>
			</tr>
		<?php
			$no++;
		}
		?>
	<tfoot>
		<tr>
			<td>Total :</td>
			<td colspan="5">Rp. <?= number_format($total, 0, '.', '.') ?></td>
		</tr>
	</tfoot>

	</tbody>
</table>

<!-- Modal -->

<script type="text/javascript">
	$(document).ready(function() {
		$(".kurangqty").click(function() {
			var id = $(this).attr('value');
			$.ajax({
				type: "post",
				data: {
					id: id
				},
				url: "<?= base_url('home/kurangqty') ?>",
				success: function(response) {
					loadtable();
					loadtotal();
				}
			});
		});
		$(".tambahqty").click(function() {
			var id = $(this).attr('value');
			$.ajax({
				type: "post",
				data: {
					id: id
				},
				url: "<?= base_url('home/tambahqty') ?>",
				success: function(response) {
					loadtable();
					loadtotal();
				}
			});
		});
		$(".delthis").click(function() {
			var id = $(this).attr('value');
			$.ajax({
				type: "post",
				data: {
					id: id
				},
				url: "<?= base_url('home/delitem') ?>",
				success: function(response) {
					alert(response);
					loadtable();
					loadtotal();
				}
			});
		});
		$(".notethis").click(function() {
			var id = $(this).attr('value');
			$.ajax({
				type: "post",
				data: {
					id: id
				},
				url: "<?= base_url('home/cart_note') ?>",
				success: function(response) {
					$(".modal-body").html(response);


				}
			});
		});
		$(".formnote").submit(function(e) {
			var data = $(this).serialize();
			e.preventDefault();
			$.ajax({
				type: "post",
				url: "<?= base_url('home/cart_note_confirm') ?>",
				data: data,
				success: function(response) {

					$(".modalclose").click();
				}
			});
		});
	});
</script>
