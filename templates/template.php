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
		<center><div class="col-md-12">
			<a href="index.php"><img src = "templates/CFAlogos-06med.jpg"></a>
		</div>		
</div>
	 <div class="row">
		 <div class="panel panel-primary">
			 <div class="panel-heading">
			    <div class="container-fluid panel-container">
                <div class="col-xs-8 text-left"><h5><?php echo $panel_heading ?></h5></div>
                            <?php if (isset($login)){include $login;} if (isset($logout)){include $logout;}?> 
			 </div>
			 </div>
			 <div class="panel-body">
			 	<?php include $page_body ?>
			 </div>
</div>
</div>
</body>
</html>  
