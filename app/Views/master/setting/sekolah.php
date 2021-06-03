
<div id="row">
<?php
foreach ($info as $obj)
{
?>
<form action="#" class="formthis" method="post">
<div class="form-group">
  <label for=""><?= $obj->nama ?></label>
  <input type="hidden" class="form-control" name="id"  value="<?= $obj->id_setting ?>">
  <input type="text" class="form-control" name="value"  value="<?= $obj->value ?>">
</div>

<button type="submit" class="btn btn-primary">Update</button>

</form>
<?php
}
?>
</div>
<script type='text/javascript'>
$(document).ready(function(){
$(".formthis").submit(function (e) { 
    e.preventDefault();
    var data=$(this).serialize();
    $.ajax({
        type: "post",
        url: "/smpit/master/update_sekolah",
        data: data,
        success: function (response) {
            loadin();
            swal(response);
            loadout();
        }
    });
});


});
</script>