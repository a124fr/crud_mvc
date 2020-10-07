<html>
<head>
	<title></title>	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL; ?>assets/css/bootstrap-reboot.min.css" />		
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL; ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL; ?>assets/css/bootstrap-grid.min.css" />		
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL; ?>assets/css/style.css" />	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container d-flex flex-column flex-md-row">
			<a class="navbar-brand" href="#">        
				<img src="<?=BASE_URL;?>assets/images/empresa.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">		
				<span> CRUD MVC </span>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">						
						<a href="<?=BASE_URL; ?>" class="nav-link active" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a href="<?=BASE_URL; ?>funcionario" class="nav-link" href="#">Funcionário</a>
					</li>
					<li class="nav-item">
						<a href="<?=BASE_URL;?>galeria" class="nav-link" href="#">Galeria</a>
					</li>					
				</ul>
			</div>
		</div>
	</nav>

	<div class = "container">			
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>	
	</div>
		
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/js/jquery.min.js">
	</script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/js/popper.min.js">
	</script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/js/bootstrap.min.js">
	</script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/js/jquery.mask.js">
	</script>
	<script type="text/javascript">
		const BASE_URL = '<?php echo BASE_URL; ?>';
	</script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/js/script.js">
	</script>
</body>
</html>	