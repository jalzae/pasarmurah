<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Product Detail</h2>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
			</div>
		</div>
	</div>
</div>

<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">Product Details</div>



					<div class="form-group">
						<label for="">Product Name</label>
						<?php
						foreach ($order as $obj) {
						?>
							<input type="text" class="form-control" id="namep" value='<?= $obj->nama_product ?>' readonly name="name" required placeholder="Input product Name">
						<?php
						}
						?>
					</div>
					<form method="post" action="#" id="addcategory">
						<div class="form-group" style="display: inline-grid;">
							<?php
							foreach ($order as $obj) {
								$imgURL = $obj->image;
							?>
								<input type="hidden" class="form-control" id="idproduct" name="idproduct" value='<?= $obj->id_product ?>' required placeholder="Input product Name">
							<?php
							}
							?>
							<div class="autocomplete" style="width:400px;">
								<label for="">Product Category</label>
								<input type="text" id="myInput" name="cate" autocomplete="off" class="form-control" required="required"></input>
								<br>

							</div>
							<button type="submit" class="pushcat btn btn-primary">Add Category</button>

						</div>
					</form>
					<div id="listcategory">


					</div>

					<br>
					<form id="productdetails" action="#" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">Product Image Gallery</label>
							<input type="file" onchange="readURL(this);" class="form-control-file" name="fileupload" required id="exampleFormControlFile1">
							<label for="">Product Image Preview</label>
							<img id="blah" src="http://placehold.it/180" style="max-width: 400px;max-height:250px;" class="form-control-file" alt="your image" />
						</div>
						<button type="submit" class="btn btn-primary">Add Gallery</button>
					</form>
					<div class="card-body" style="width:400px" ;>
						<div id="listgallery" class=" card-title">Product Gallery Review </div>
						
					</div>


					<div class="form-group">
						<label for="">Product Discount in %</label>
						<input name="price" type="number" onkeypress="return isNumber(event)" class="form-control" id="price" required placeholder="Input product price">
					</div>



					<button type="submit" class="publish btn btn-primary">Publish !</button>


				</div>
			</div>
		</div>


	</div>

</div>

</div>

<style>
	/* The grid: Four equal columns that floats next to each other */
	.column {
		float: left;
		width: 25%;
		padding: 10px;
	}

	/* Style the images inside the grid */
	.column img {
		opacity: 0.8;
		cursor: pointer;
	}

	.column img:hover {
		opacity: 1;
	}

	/* Clear floats after the columns */
	.row:after {
		content: "";
		display: table;
		clear: both;
	}

	/* The expanding image container (positioning is needed to position the close button and the text) */
	.container {
		position: relative;

	}

	/* Expanding image text */
	#imgtext {
		position: absolute;
		bottom: 15px;
		left: 15px;
		color: white;
		font-size: 20px;
	}

	/* Closable button inside the image */
	.closebtn {
		position: absolute;
		top: 10px;
		right: 15px;
		color: white;
		font-size: 35px;
		cursor: pointer;
	}

	.autocomplete {
		/*the container must be positioned relative:*/
		position: relative;
		display: inline-block;
	}

	input {
		border: 1px solid transparent;
		background-color: whitesmoke;
		padding: 10px;
		font-size: 16px;
	}

	input[type=text] {
		background-color: white;
		width: 100%;
	}

	input[type=submit] {
		background-color: DodgerBlue;
		color: #fff;
	}

	.autocomplete-items {
		position: absolute;
		border: 1px solid #d4d4d4;
		border-bottom: none;
		border-top: none;
		z-index: 99;
		/*position the autocomplete items to be the same width as the container:*/
		top: 100%;
		left: 0;
		right: 0;
	}

	.autocomplete-items div {
		padding: 10px;
		cursor: pointer;
		background-color: #fff;
		border-bottom: 1px solid #d4d4d4;
	}

	.autocomplete-items div:hover {
		/*when hovering an item:*/
		background-color: #e9e9e9;
	}

	.autocomplete-active {
		/*when navigating through the items using the arrow keys:*/
		background-color: DodgerBlue !important;
		color: #ffffff;
	}
</style>

<script>
	var countries = [
		<?php
		foreach ($cat as $obj) {

			echo "'" . $obj->name . "',";
		}
		?>
	];

	function myFunction(imgs) {
		// Get the expanded image
		var expandImg = document.getElementById("expandedImg");
		// Get the image text

		// Use the same src in the expanded image as the image being clicked on from the grid
		expandImg.src = imgs.src;
		// Use the value of the alt attribute of the clickable image as text inside the expanded image

		// Show the container element (hidden with CSS)
		expandImg.parentElement.style.display = "block";
	}

	function list_category() {
		data = new FormData();
		data.append("id", $('#idproduct').val());
		loadin();
		$.ajax({
			type: "POST",
			url: "<?= base_url('company/product_category') ?>",
			data: data,
			processData: false,
			contentType: false,
			dataType: 'html',
			success: function(response) {
				$("#listcategory").html(response);
				loadout();
			}
		});
	}

	function autocomplete(inp, arr) {
		/*the autocomplete function takes two arguments,
		the text field element and an array of possible autocompleted values:*/
		var currentFocus;
		/*execute a function when someone writes in the text field:*/
		inp.addEventListener("input", function(e) {
			var a, b, i, val = this.value;
			/*close any already open lists of autocompleted values*/
			closeAllLists();
			if (!val) {
				return false;
			}
			currentFocus = -1;
			/*create a DIV element that will contain the items (values):*/
			a = document.createElement("DIV");
			a.setAttribute("id", this.id + "autocomplete-list");
			a.setAttribute("class", "autocomplete-items");
			/*append the DIV element as a child of the autocomplete container:*/
			this.parentNode.appendChild(a);
			/*for each item in the array...*/
			for (i = 0; i < arr.length; i++) {
				/*check if the item starts with the same letters as the text field value:*/
				if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
					/*create a DIV element for each matching element:*/
					b = document.createElement("DIV");
					/*make the matching letters bold:*/
					b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
					b.innerHTML += arr[i].substr(val.length);
					/*insert a input field that will hold the current array item's value:*/
					b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
					/*execute a function when someone clicks on the item value (DIV element):*/
					b.addEventListener("click", function(e) {
						/*insert the value for the autocomplete text field:*/
						inp.value = this.getElementsByTagName("input")[0].value;
						/*close the list of autocompleted values,
						(or any other open lists of autocompleted values:*/
						closeAllLists();
					});
					a.appendChild(b);
				}
			}
		});
		/*execute a function presses a key on the keyboard:*/
		inp.addEventListener("keydown", function(e) {
			var x = document.getElementById(this.id + "autocomplete-list");
			if (x) x = x.getElementsByTagName("div");
			if (e.keyCode == 40) {
				/*If the arrow DOWN key is pressed,
				increase the currentFocus variable:*/
				currentFocus++;
				/*and and make the current item more visible:*/
				addActive(x);
			} else if (e.keyCode == 38) { //up
				/*If the arrow UP key is pressed,
				decrease the currentFocus variable:*/
				currentFocus--;
				/*and and make the current item more visible:*/
				addActive(x);
			} else if (e.keyCode == 13) {
				/*If the ENTER key is pressed, prevent the form from being submitted,*/
				e.preventDefault();
				if (currentFocus > -1) {
					/*and simulate a click on the "active" item:*/
					if (x) x[currentFocus].click();
				}
			}
		});

		function addActive(x) {
			/*a function to classify an item as "active":*/
			if (!x) return false;
			/*start by removing the "active" class on all items:*/
			removeActive(x);
			if (currentFocus >= x.length) currentFocus = 0;
			if (currentFocus < 0) currentFocus = (x.length - 1);
			/*add class "autocomplete-active":*/
			x[currentFocus].classList.add("autocomplete-active");
		}

		function removeActive(x) {
			/*a function to remove the "active" class from all autocomplete items:*/
			for (var i = 0; i < x.length; i++) {
				x[i].classList.remove("autocomplete-active");
			}
		}

		function closeAllLists(elmnt) {
			/*close all autocomplete lists in the document,
			except the one passed as an argument:*/
			var x = document.getElementsByClassName("autocomplete-items");
			for (var i = 0; i < x.length; i++) {
				if (elmnt != x[i] && elmnt != inp) {
					x[i].parentNode.removeChild(x[i]);
				}
			}
		}
		/*execute a function when someone clicks in the document:*/
		document.addEventListener("click", function(e) {
			closeAllLists(e.target);
		});
	}
	autocomplete(document.getElementById("myInput"), countries);

	function readURL(input) {
		var ext = $('#exampleFormControlFile1').val().split('.').pop().toLowerCase();
		if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
			swal('invalid extension!');
			$('#exampleFormControlFile1').val('');
		} else {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#blah')
						.attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}
	}

	function list_gallery() {
		data = new FormData();
		data.append("id", $('#idproduct').val());
		loadin();
		$.ajax({
			type: "POST",
			url: "<?= base_url('company/product_gallery') ?>",
			data: data,
			processData: false,
			contentType: false,
			dataType: 'html',
			success: function(response) {
				$("#listgallery").html(response);
				loadout();
			}
		});
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		list_category();
		list_gallery();
		$("#addcategory").submit(function(e) {
			////TODO addcategory
			e.preventDefault();
			var data = $(this).serialize();
			$.ajax({
				type: "post",
				url: "<?= base_url('company/product_category_add') ?>",
				data: data,
				success: function(response) {
					swal(response);
					list_category();
					$("#myInput").val("");

				}
			});


		});
		$(".delpic").click(function(e) {
			e.preventDefault();
			var id = $(this).attr('value');
			$.ajax({
				type: "post",
				url: "<?= base_url('company/product_gallery_del') ?>",
				data: {
					id: id
				},
				success: function(response) {
					swal(response);
					list_gallery();
				}
			});

		});

		$(".changpic").click(function(e) {
			e.preventDefault();
			var id = $(this).attr('value');
			$.ajax({
				type: "post",
				url: "<?= base_url('company/product_gallery_change') ?>",
				data: {
					id: id
				},
				success: function(response) {
					swal(response);
					list_gallery();
				}
			});

		});
		$("#productdetails").submit(function(e) {

			e.preventDefault();
			data = new FormData(this);
			data.append("fileupload", $('#exampleFormControlFile1').val());
			data.append("id", $('#idproduct').val());

			$.ajax({
				type: "POST",
				url: "<?= base_url('company/product_gallery_add') ?>",
				data: data,
				processData: false,
				contentType: false,
				dataType: 'html',
				success: function(response) {
					swal(response);
					$('#exampleFormControlFile1').val('');
					list_gallery();
				}
			});
			return false;

		});
		$(".publish").click(function(e) {
			e.preventDefault();
			data = new FormData();
			data.append("id", $('#idproduct').val());
			$.ajax({
				type: "POST",
				url: "<?= base_url('company/product_publish') ?>",
				data: data,
				processData: false,
				contentType: false,
				dataType: 'html',
				success: function(response) {
					swal(response);
					$("#product_control").click();

				}
			});
		});

	});
</script>
