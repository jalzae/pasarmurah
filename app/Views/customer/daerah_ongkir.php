<?php
foreach ($ongkir as $obj) {

	echo '<option value="' . $obj->id_ongkir . '">' . $obj->nama_daerah . ' (Rp. ' . number_format($obj->harga, "0", ".", ".") . ')</option>';
}
?>
