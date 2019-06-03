

<!doctype html>
<html lang="en">
	<head>
		<title>Check Login and create session</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		
			<?php
			// Connection info. file
			include 'conn.php';	
			
			// Connection variables
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// data sent from form login.html 
			$txtide = $_POST['txtide']; 
            $password = $_POST['txtcon'];
            $txtnom = $_POST['txtnom'];
            $txtper = $_POST['txtper'];
			
			// Query sent to database
			$result = mysqli_query($conn, "SELECT identificacion,password,nombre,perfil FROM usuario WHERE identificacion = '$txtide'");
			
			// Variable $row hold the result of the query
			$row = mysqli_fetch_assoc($result);
						
			/* 
			password_Verify() function verify if the password entered by the user
			match the password hash on the database. If everything is OK the session
			is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
			*/
			if (mysql_num_rows($result)!=0) {	
                echo "<div class='alert alert-danger mt-4' role='alert'>Usuario ya existe!
				<p><a href='registrar.html'><strong>Intentelo de nuevo!</strong></a></p></div>";			
			} else if($txtide!=''){
                $result2 = mysqli_query($conn, "INSERT INTO usuario (nombre, identificacion,perfil,password)
                VALUES ('$txtnom', '$txtide', '$txtper','$password')");
			
			// Variable $row hold the result of the query
            //$row2 = mysqli_fetch_assoc($result2);
                
				echo "<div class='alert alert-success mt-4' role='alert'>Se creo el usuario!!
				<p><a href='login.html'><strong>Please try again!</strong></a></p></div>";			
            }
            else{		
                header ("Location: login.html");
            }
			?>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>