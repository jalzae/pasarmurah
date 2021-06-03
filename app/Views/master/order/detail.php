<?php
foreach ($order as $obj) {
?>
	<form id="editform" method="POST" role="form">
		<legend>Detail Status Order</legend>

		<div class="form-group">
			<label for="">No Order</label>
			<input type="text" name="id" readonly value='<?= $obj->id_order_unique ?>' class="form-control" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">Status</label>
			<select value='<?= $obj->status ?>' disabled name="status" id="input" class="form-control" required="required">
				<option value="0">Diproses</option>
				<option value="1">Dipacking</option>
				<option value="2">Dibayar</option>
				<option value="3">Diterima</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Total </label>
			<input type="text" name="id" readonly value='Rp. <?= number_format($obj->total_bayar, 0, '.', '.') ?>' class="form-control" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">Alamat </label>
			<textarea name="" readonly id="input" class="form-control" rows="3" required="required"><?= $obj->alamat ?></textarea>
		</div>
		<div class="form-group">
			<label for="">No HP </label>
			<input type="text" name="id" readonly value='<?= $obj->no_hp ?>' class="form-control" placeholder="Input field">
		</div>

	</form>


	<table class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Harga </th>
				<th>Qty</th>
				<th>Note</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($cart as $obj) {
			?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $obj->nama_product ?></td>
					<td><?= number_format($obj->harga_product, 0, '.', '.') ?></td>
					<td><?= $obj->qty ?></td>
					<td><?= $obj->note ?></td>
				</tr>
			<?php
				$no++;
			}
			?>
		</tbody>
	</table>

<?php
}
?>
