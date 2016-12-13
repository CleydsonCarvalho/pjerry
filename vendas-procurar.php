<!doctype html>
<html>
<meta lang="pt-br">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>S.G.V</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/layout.css">

</head>

<body>
<?php 
 include'menu.php';	
?>

<div class="container-fluid">
	<div class="row">
	
		<div class="col-lg-12">
		<h1>Venadas / Adicionar</h1>
		<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox">Check me out
        </label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
			
		</div>
	</div>
</div>
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="js/jquery.min.js"></script>
<!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>