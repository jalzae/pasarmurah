<div style="display: inline-block;width: 50%;justify-content: left;margin-top: 10px;">
	<span><?= $item ?> Barang</span>
	<span style="font-weight:bold;">Rp. <?= number_format($harga, 0, '.', '.') ?></span>
</div>
<a href="<?= base_url('/checkout') ?>">
	<button type="button" style="border-radius:3px; padding: 6px 24px;" class="btn btn-primary">Checkout</button>
</a>
