<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Banner</h2>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
                            <a href="#" class="btn btn-secondary btn-round" value="a" id="addbutton" data-toggle="modal" data-target="#myModal">Add Banner </a>
                          
							</div>
						</div>
					</div>
				</div>

<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Banner List</div>
									
        <table id="example1" class="display table table-striped table-hover" style="width:100%">
           
            
        </table>
                                    
								</div>
								</div>
							</div>

                            
						</div>
					
					</div>
					
</div>


<script type="text/javascript">
function loadcat(){
    $(".loader-wrapper").fadeIn("slow");
    $.ajax({
                method: "post",
                url:"<?= base_url('/company/banner_load') ?>",
                success: function (data) {
                    $("#example1").html(data);
                    $('#example1').DataTable();
                    $(".loader-wrapper").fadeOut("slow");
                }
            });
}
///TODO function load category
    $(document).ready(function() {
        loadcat();
       
        $("#addbutton").click(function (e) { 
            $(".loader-wrapper").fadeIn("slow");
            $.ajax({
                method: "post",
                url:"<?= base_url('/company/banner_add') ?>",
                success: function (response) {
                    $(".modal-body").html(response);
                    $(".loader-wrapper").fadeOut("slow");
                }
            });
        });
    });
</script>

<style type='text/css'>
.editthis:hover {
    background:cyan;
    cursor: pointer;
}
.deletethis:hover {
    background:cyan;
    cursor: pointer;
}
.publish:hover {
    background:cyan;
    cursor: pointer;
}
</style>