 <table id="example1" class="display table table-striped table-hover" style="width:100%">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Category </th>
 			<th>Edit</th>
 			<th>Delete</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no = 1;
			foreach ($category as $obj) {
			?>
 			<tr>
 				<td><?= $no ?></td>
 				<td><?= $obj->name ?></td>
 				<td class="editthis" data-target="#myModal" data-toggle="modal" value="<?= $obj->id_category ?>">Edit</td>
 				<td class="deletethis" value="<?= $obj->id_category ?>">Delete</td>
 			</tr>

 		<?php
				$no++;
			}
			?>
 	</tbody>
 </table>

 <script type="text/javascript">
 	$(document).ready(function() {
 		$('#example1').DataTable();
 		$(".editthis").click(function(e) {
 			var id = $(this).attr('value');
 			$(".loader-wrapper").fadeIn("slow");
 			$.ajax({
 				method: "post",
 				data: {
 					id: id
 				},
 				url: "<?= base_url('/company/category_edit') ?>",
 				success: function(response) {
 					$(".modal-body").html(response);
 					$(".loader-wrapper").fadeOut("slow");
 				}
 			});
 		});
 		$(".deletethis").click(function(e) {
 			e.preventDefault();
 			var id = $(this).attr('value');
 			swal({
 					title: "Are you sure?",
 					text: "Once deleted, you will not be able to recover this data!",
 					icon: "warning",
 					buttons: true,
 					dangerMode: true,
 				})
 				.then((willDelete) => {
 					if (willDelete) {
 						$.ajax({
 							method: "post",
 							data: {
 								id: id
 							},
 							url: "<?= base_url('/company/category_del') ?>",
 							success: function(response) {
 								swal(response);
 								$("#category_control").click();
 							}
 						});


 					} else {
 						swal("Your data file is safe!");
 					}
 				});


 		});
 	});
 </script>
