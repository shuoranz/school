<?php

	$pageUrl = "Category";

?>
<?php include 'includes/html_header.php'; ?>

<div id="main_content">

    <?php include 'includes/header.php'; ?>

    <div class="page">
        <?php include 'includes/page-top.php'; ?>
		<!--
        <div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <h4>Welcome <?php echo getUser()['username']; ?>!</h4>
                            <small>Study hard, for the well is deep, and our brains are shallow.</small>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
		-->
		<div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
					<div class="col-6">
						<div class="container">
							<table class="table table-hover">
    <thead>
      <tr>
        <th>Manange Category</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="/dashboard/manage-category?c=1">Course Category</a></td>
      </tr>
      <tr>
        <td><a href="/dashboard/manage-category?c=2">Forum Category</a></td>
      </tr>
      <tr>
        <td><a href="/dashboard/manage-category?c=3">Blog Category</a></td>
      </tr>
	  <tr>
        <td><a href="/dashboard/manage-category?c=4">News Category</a></td>
      </tr>
    </tbody>
  </table>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>




<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<script src="../assets/bundles/apexcharts.bundle.js"></script>
<script src="../assets/bundles/counterup.bundle.js"></script>
<script src="../assets/bundles/knobjs.bundle.js"></script>
<script src="../assets/bundles/c3.bundle.js"></script>

<script src="../assets/js/core.js"></script>
<script src="../assets/js/page/project-index.js"></script>

<script type="text/javascript">

	$("#addCategoryBtn").click(function(){
		var category = $("#create_category").val();
		
		if (category == null || category ==  ""){
			alert("error, please check all your inputs");
			return false;
		}
		
		$.post("controller", 
		{
			action: "category_create",
			table: ""
			category: category
		},
		function(data, status){
			//alert("Data: " + data + "\nStatus: " + status);
			if ( status === "success" && data.indexOf("success") !== -1 ){
				alert("success!");
				setTimeout(function(){ location.reload(); }, 1000);
				
			} else {
				alert("something wrong in backend");
				return false;
			}
		});
	});
	

	$("#search_course_videos").click(function(){
		var search_title = $("#search_title").val() == "" ? "na" : "title="+$("#search_title").val();
		var search_teacher = $("#search_teacher").val() == "" ? "na" : "teacher="+$("#search_teacher").val();
		if (search_title == "na" && search_teacher == "na") {
			return false;
		}
		window.location.href = "/dashboard/search_video?"+search_title+"&"+search_teacher;
	});
</script>
</body>
</html>
