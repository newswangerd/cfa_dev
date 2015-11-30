 <html>
 	<head>
 		<link rel="stylesheet" type="text/css" href="templates/css/bootstrap.min.css" />
 		<title><?php echo $page_title ?></title>
 		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
		<script src="templates/js/bootstrap.min.js"></script>

 	 </head>
 <body>
 <div class="container">
 <div class="row">
		<center><div class="col-md-9">
			<img src = "templates/CFAlogos-06med.jpg">
		</div></center>
		<div class="col-sm-3"><br><br><br><br><button type="button" class="btn btn-warning"><h5>Registered already?</h5></button>
			<a href="login.php" class="btn btn-warning btn-md" role="button">Login</a></div>		
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
</html>  
