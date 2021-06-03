
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

