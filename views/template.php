<html>
<head>
	<title></title>	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap-reboot.min.css" />		
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap-grid.min.css" />		
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" />	
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
    	<div class="container d-flex flex-column flex-md-row justify-content-between">    
      	<a class="navbar-brand" href="#">        
			<img src="assets/images/empresa.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">		
        	<span> CRUD MVC </span>
      	</a>

		

      	<div class="my-2 my-lg-0"></div>         
  	</nav>

	<div class = "container">
		<div class="row">
			<h1>Este é o topo</h1>
			<a href="<?php echo BASE_URL; ?>">Home</a>
			<a href="<?php echo BASE_URL;?>galeria">Galeria</a>
			<hr />
		</div>
		<div class="row justify-content-center">
			<?php $this->loadViewInTemplate($viewName, $viewData); ?>	
		</div>
	</div>

	
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js">
	</script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/popper.min.js">
	</script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js">
	</script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js">
	</script>
</body>
</html>	