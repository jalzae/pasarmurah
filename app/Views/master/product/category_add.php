
<form id="formadd" method="POST" role="form">
    <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" class="form-control" name="nama" placeholder="Input category name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script type="text/javascript">
$(document).ready(function() {
    $("#formadd").submit(function (e) { 
        var data=$(this).serialize();
            e.preventDefault();
            $(".loader-wrapper").fadeIn("slow");
            $.ajax({
                method: "post",
                data:data,
                url:"<?= base_url('/company/category_added') ?>",
                success: function (response) {
                    swal(response);
                    loadcat();
                   
                    $(".loader-wrapper").fadeOut("slow");
                }
            });
            closemodal();
        });
});
</script>
