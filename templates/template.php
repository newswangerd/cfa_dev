 <HTML>
 	<head>
 		<link rel="stylesheet" type="text/css" href="templates/css/bootstrap.min.css" />
 		<title><?php echo $page_title ?></title>
 	 </head>
 <body>

 <div class="container">
 <div class="row">
		<center><div class="col-md-10">
			<img src = "templates/CFAlogos-06med.jpg">
		</div></center>
		<div class="col-md-2"><br><br><br><br>
			<button type="button" class="btn btn-info btn-lg col-md-offset-1 " >Login</button></div>   
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
