<?php
session_start();
if(isset($_SESSION['name'])) 
{     
  $usuario=$_SESSION['name'];
  $identificacion=$_SESSION['identificacion'];
}else
{
    header("Location: login.html");    
}


//$usuario="hola";
//echo "".$usuario;

    /* echo "<div class='alert alert-success mt-4' role='alert'><strong>Welcome!</strong>.$usuario. 			
    <p><a href='edit-profile.php'>Edit Profile</a></p>	
    <p><a href='logout.php'>Logout</a></p></div>";	 */
?>

<html>
<head>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Cliente</title>
    <link rel="icon" type="image/ico" href="../icons/logo2.png" />
</head>
	<body style="background-color: #2e3639;">
		
            <br>
            <div class="row">
                <div class="col-md-1"><img src='../img/logo4.png' width='100' height='100'/></div>
                <div class="col-md-9" style="color:white; font:sans-serif">
                    <h3>Automotriz del sur</h3>
                    <h6>Usuario: <?php echo "".$usuario;?></h6>
                    <p>C.C <?php echo "".$identificacion;?></p>
                    
                </div>
                
                <div class="col-md-2">
                  <a href="../logout.php" class="btn btn-primary">Cerrar sesion</a>
                </div>
            </div>
            <div class="row" style="background-color: #2e3639;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    include '../conn.php';	
			
    // Connection variables
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
        
    // Query sent to database
    $result = mysqli_query($conn, "SELECT id_slides FROM slides");
    $count=0;
    //$sliders= mysql_fetch_array($result);
    while ($fila = mysqli_fetch_array($result)){
      if($count==0){
        echo"<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"".$count."\" class=\"active\"></li>";    
      }
      else{
        echo"<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"".$count."\"></li>";
      }
      $count=$count+1;
      echo "".$count;
    }
    ?>    
  </ol>
  <div class="carousel-inner">
  <?php			
        // Connection info. file

      //$sliders= mysql_fetch_array($result);
      $result2 = mysqli_query($conn, "SELECT descripcion,ruta_foto,estado FROM slides");
      $count=0;
      while ($fila2 = mysqli_fetch_array($result2)){
        
        //echo "".$fila['descripcion'];JJ
        if($count==0){
          echo "<div class=\"carousel-item active\">
          <img class=\"d-block w-100\" src=\"../".$fila2['ruta_foto']."\" alt=\"First slide\">
          <div class=\"carousel-caption d-none d-md-block\">
          <h5>".$fila2['descripcion']."</h5>          
        </div>
          </div>";
        }
        else{
          echo "<div class=\"carousel-item\">
          <img class=\"d-block w-100\" src=\"../".$fila2['ruta_foto']."\" alt=\"First slide\">
          <div class=\"carousel-caption d-none d-md-block\">
          <h5>".$fila2['descripcion']."</h5>          
        </div>
          </div>";
        }
        $count=$count+1;

      }          
			?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>
            </div>
  <div class="row">
  
  <?php			
        // Connection info. file

      //$sliders= mysql_fetch_array($result);
      $result3 = mysqli_query($conn, "SELECT id_vehiculo,marca,modelo,color,precio,ruta_foto,estado FROM vehiculo");

      $count=0;
       while ($fila3 = mysqli_fetch_array($result3)){
        
        //echo "".$fila['descripcion'];JJ
        echo"<form name=\"for".$fila3['id_vehiculo']."\" id=\"for".$fila3['id_vehiculo']."\" action=\"../actualizar.php\" method=\"post\" style=\"margin-left:2%\">";
        echo "<div class\"card\" style=\"width: 18rem;background-color: black;\" >
                <input type=\"hidden\" class=\"form-control\" name=\"txtid\" value=".$fila3['id_vehiculo'].">
                <input type=\"hidden\" class=\"form-control\" name=\"txtest\" value=".$fila3['estado'].">
                <img class=\"card-img-top\" src=\"../".$fila3['ruta_foto']."\" alt=\"Card image cap\" style=\"background-color: black;\">
                <div class=\"card-body\" style=\"background-color: black;color:white; font:sans-serif\">
                  <h5 class=\"card-title\" style=\"color:#408ed6;\">".$fila3['marca']."</h5>
                  <p class=\"card-text\">Modelo: ".$fila3['modelo']."</p>
                  <p class=\"card-text\">Precio: ".$fila3['precio']."</p>";
                if($fila3['estado']=="I"){
                  echo"<p class=\"card-text\">Estado: Vendido </p>";
                  echo"<input name=\"btn".$fila3['id_vehiculo']."\" type=\"submit\" value=\"Activar\" class=\"btn btn-primary\">";                  
                }      
                else{
                  echo"<p class=\"card-text\">Estado: En venta </p>";      
                }
              echo"</div>
            </div>";
        echo"</form>";
        $count=$count+1; 

      }          
			?>
  </form>
  </div>
            

           
            

		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>