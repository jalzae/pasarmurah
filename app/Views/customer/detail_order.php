<tr>
	<td>
		<span style="margin: 10px;">Berikut Link pembayaran dan status pembayaran anda</span>
	</td>
</tr>
<tr>
	<td>
		<table class="table table-bordered" style="margin: 10px;max-width: 90%;">

			<tbody>

				<tr>
					<?php
					foreach ($order as $obj) {
					?>
						<td>1
						</td>
						<td><?= $obj->entry_date ?>
						</td>
						<td>
							<?php
							if ($obj->status == 0) {
								echo "Menunggu konfirmasi";
							} else if ($obj->status == 1) {
								echo "Barang dikemas";
							} else if ($obj->status == 2) {
								echo "Barang dikirim";
							} else {
								echo "Barang diterima";
							}

							?>
						</td>
						<td>
							Status Bayar : <?= $obj->statusbayar ?>
						</td>
						<td>
							<?php
							if ($obj->statuscode == 200) {
								echo "Sudah Dibayar";
							} else {
								echo "<a href='$obj->redirect_url'  target='_blank' type='button' >Bayar</a>";
							}
							?>

						</td>
					<?php
					}
					?>
				</tr>

			</tbody>
		</table>
	</td>
</tr>
<tr>
	<td>
		<span style="margin: 10px;">Order Detail :</span>
	</td>
</tr>
<tr>
	<td>
		<table class="table table-bordered" style="margin: 10px;max-width: 90%;">
			<?php
			foreach ($order as $obj1) {
			?>
				<tbody>
					<tr>
						<td>ID Order </td>

						<td><?= $obj1->id_order_unique ?></td>

					</tr>

					<tr>
						<td>No HP </td>

						<td><?= $obj1->no_hp ?></td>
					</tr>
					<tr>
						<td>Alamat Kirim </td>

						<td><?= $obj1->alamat ?></td>
					</tr>
				</tbody>
			<?php

			}
			?>
		</table>
	</td>
</tr>
<tr>
	<td>
		<span style="margin: 10px;">List Pesanan :</span>
	</td>
</tr>
<tr>
	<td>
		<table class="table table-bordered" style="margin: 10px;max-width: 90%;">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nama Barang</th>
					<th scope="col">Qty</th>
					<th scope="col">Price</th>
				</tr>
			</thead>
			<?php

			foreach ($order as $obj) {
				$no = 1;
			?>
				<tbody>
					<?php
					foreach ($obj->item as $obj1) {
					?>
						<tr>
							<th scope="row"><?= $no ?></th>
							<td><?= $obj1->nama_product ?></td>
							<td><?= $obj1->qty ?></td>
							<td><?php
								if ($obj1->diskon == 0 || $obj1->diskon == null) {
									echo number_format($obj1->harga_product, 0, '.', '.');
									} else {

									echo "<strike>" . number_format($obj1->harga_product, 0, '.', '.') . "</strike> Rp." . number_format($obj1->hargadiskon, 0, '.', '.');

								}
								?></td>
						</tr>
					<?php
						$no++;
					}
					?>

				</tbody>

				<tfoot>
					<tr>
						<th scope="row">Total Belanja </th>
						<td colspan="3"><?= $obj->total ?></td>
					</tr>
					<tr>
						<th scope="row">Ongkir</th>
						<td colspan="3"><?= $obj->ongkir ?></td>
					</tr>
					<tr>
						<th scope="row">Total Bayar</th>
						<td colspan="3"><?= $obj->total_bayar ?></td>
					</tr>
				</tfoot>
			<?php
			}
			?>
		</table>
	</td>
</tr>
