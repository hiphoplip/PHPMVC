<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Todo List App</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	
	<script src="<?php echo asset('lib/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo asset('lib/js/moment.min.js'); ?>"></script>
	<script src="<?php echo asset('lib/js/bootstrap-datepicker.min.js'); ?>"></script>

</head>
<body>
	<div class="header">
		<h1>To do List</h1>
	</div>

	<div class="sidebar">
		
	</div>

	<div class="container">
		<div class="content">
			<?php 
				if(isset($content))
					echo $content;
				else 
				{
					echo "Error Content";
				}
			?>
		</div>
	</div>

	<div class="footer">
		
	</div>

</body>
</html>