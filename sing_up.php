<head>
	<title>регистрациЯ</title>

	<!С Bootstrap core CSS С>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<!С Custom styles for this template С>
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
	<link href="blog.css" rel="stylesheet">
	<link href="login_style.css" rel="stylesheet">
	<style></style>
</head>
<!------<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<body>
	<div class="container">
	  <div class="row">

		<div class="main">

		  <h3>пожалуйста, войдите или <a href="sing_up.php">зарегистрируйтесь</a></h3>
		  <div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
			  <a href="#" class="btn btn-lg btn-primary btn-block">Facebook</a>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
			  <a href="#" class="btn btn-lg btn-info btn-block">Google</a>
			</div>
		  </div>
		  <div class="login-or">
			<hr class="hr-or">
			<span class="span-or">или</span>
		  </div>

		  <form role="form" action="sing.php" method="post">
			<div class="form-group">
				<label for="" class="control-label">введите email</label>
				<input type="email" name="email" class="form-control" id="inputEmail" id="inputUsernameEmail" placeholder="Emailиванов иван иванович" data-error="‚ы не правильно ввели ‚аш E-mail" required>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
			  <label for="inputUsernameEmail">введите фио</label>
			  <input type="text" name="foi" class="form-control" placeholder="иванов иван иванович">
			</div>
			<div class="form-group">
			 
			  <label for="inputPassword">сгенерировать пароль</label>
			  <input type="password" name="password" class="form-control" id="inputPassword">
			</div>
			<div class="checkbox pull-right">
			  
			</div>
			<button type="submit" class="btn btn btn-primary">
			  зарегистрироватьсЯ
			</button>
		  </form>
		
		</div>
		
	  </div>
	</div>
</body>
