<?php


require_once('classes/Validator.php');

session_start();


$puppies = [];
$list = '';
$msg = '';


if (isset($_SESSION['puppies'])) {
	$puppies = $_SESSION['puppies'];
}

if (isset($_POST['puppy_name'])) {
    $puppyname = $_POST['puppy_name'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($stringValidator->isValid($puppyname)) {

    	array_push($puppies, $puppyname);
    	$_SESSION['puppies'] = $puppies;

    } else {
    	$msg = "Bad Puppy Name!";
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Account | Puppy Pound</title>
	<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,100,300,900,800,500,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type='text/css' href="css/normalize.css">
	<link rel="stylesheet" type='text/css' href="css/stylesheet.css">

</head>

<body>

	<div class="head-wrapper">

		<div class="head-panel">
			
			<div class="head-bg"></div>
			<div class="head-content">
				
				<section>
					<a href="account.php">
						<img src="images/puppy.jpg" alt="puppy">
					</a>
				</section>

				<header>
					Puppy Pound
				</header>

			</div>

		</div>

	</div>

	<div class="panel-wrapper">

		<div class="main-panel">

			<div class="main-content">

				<h1>
					Add your favorite puppy name!
				</h1>

				<section class="add-puppy">

					<form method="POST" action='account.php'>
						<input type="text" name="puppy_name" placeholder="Add a puppy...">
						<button>Add</button><br>
						<label class="error"><?= $msg ?></label>
					</form>

				</section>

				<div>

					<h2>Puppy List:</h2>

					<ul class="list">
						<?php foreach($puppies as $id=>$puppy){?>
							<li class="puppy"><input type="hidden" value="<?= $id ?>"><button>X</button><span><?= $puppy ?></span>
						<?php } ?>
					</ul>

				</div>

			</div>

		</div>

</body>


<!-- JQUERY / JAVASCRIPT -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

<script>

	$(function(){

		console.log('Ready');

	    $('.list button').on('click', function(e){

	        var li = $(this).closest('li');

	        var puppyID = $('input', li).val();

	        li.remove();

	        $.post("api.php", {puppyID: puppyID}, function(data){
	        	console.dir(data);
	        })

	    });

	});
</script>


</html>