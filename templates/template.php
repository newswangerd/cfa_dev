 <HTML>
 	<head>
 		<link rel="stylesheet" type="text/css" href="templates/css/bootstrap.min.css" />
 		<title><?php echo $page_title ?></title>
 	 </head>
 <body>

 <div class="container">
 <div class="row">
		<center><div class="col-md-9">
			<img src = "templates/CFAlogos-06med.jpg">
		</div></center>
		<div class="col-md-3"><br><br><br><br><button type="button" class="btn btn-warning"><h5>Registered already?</h5></button>
			<button type="button" class="btn btn-warning btn-lg " >Login</button></div>   
</div>
	 <div class="row">
		 <div class="panel panel-primary">
			 <div class="panel-heading"><?php echo $panel_heading ?></div>

			 <div class="panel-body">
			 	<?php include $page_body ?>
			 </div>
				
		</div>
	</div>
</div>
</body>
</HTML>  
