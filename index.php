<?php
$servername = "localhost";
$username = "root";
$password = "";
$basededatos = "rent_a_house";

// Create connection
$conn = new mysqli($servername, $username, $password, $basededatos);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<main class="main-container">
		<!-- <header class="header">
			<p>8:00</p>
			<div class="header__icon">
				<img src="img/Stats.png">
			</div>
		</header> -->

		<nav class="navbar">
			<!-- <div class="navbar__content">
				<img class="navbar__content-icon" src="img/Vector.png">
				<input type="text" name="search" placeholder="Search Now">
			</div> -->
			<div class="inpu">
				<input type="search" class="lupa" name="busqueda" placeholder="Search products" >
				<input type="submit" name="enviar">
			</div>
			<div class="navbar__filter">
				<img src="img/Filter.png">
			</div>
		</nav>

		<section class="category">
			<h2 class="category__title">Category</h2>
			<div class="category__container">
				<div class="category__container-content">
					<p>House</p>
				</div>
				<div class="category__container-content">
					<p>Villa</p>
				</div>
				<div class="category__container-content">
					<p>Apartements</p>
				</div>
				<div class="category__container-content">
					<p>Penthouse</p>
				</div>
			</div>
		</section>

			<?php  
				if (!isset($_GET['busqueda'])) {
					$_GET['busqueda'] = '';
					$busqueda = $_GET['busqueda'];
				}
				$busqueda = $_GET['busqueda'];
				$sql = "SELECT * FROM categorias WHERE tipo LIKE '%$busqueda%' OR precio LIKE '%$busqueda%'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0){

					// echo '<section class="house__container">';
					while ($row = $result->fetch_assoc()){
							
					   echo '<div class="house">
							   <img class="house__image" src="'.$row["imagen"].'">
							   <div class="house__content">
									<div class="house__content-details">
										<h3 class="house__content-details_name">'.$row["descripcion"].'</h3>
										<p class="house__content-details_price">'.$row["precio"].'</p>
									</div>
									<div class="house__content-location">
										<img class="house__content-icon" src="img/mapa.png">
										<p>'.$row["ubicacion"].'</p>
									</div>
									<div class="house__content-features">
										<div class="house__content-features_description">
											<img class="house__content-icon" src="img/campana.png">
											<p>All Inclusive</p>
										</div>
										<div class="house__content-features_description">
											<img class="house__content-icon" src="img/wifi.png">
											<p>Free WiFi</p>
										</div>
										<div class="house__content-features_description">
											<img class="house__content-icon" src="img/bag.png">
											<p>Free Consultation</p>
										</div>
									</div>
								</div>
							</div>';
				 	}
				 	// echo '</section>';

				}else {
					echo "0 results";
				}
			?>
						<!-- <?php
					if (isset($_GET['#enviar'])) {
						$busqueda = $_GET['#busqueda'];
						
						$consulta = $conn->query("SELECT * FROM categorias WHERE tipo LIKE '%$busqueda%' OR precio LIKE '%$busqueda%'");
						echo '<section class="house__container">';
						while ($row = $consulta->fetch_array()) {
							echo '<div class="house">
							   <img class="house__image" src="'.$row["imagen"].'">
							   <div class="house__content">
									<div class="house__content-details">
										<h3 class="house__content-details_name">'.$row["descripcion"].'</h3>
										<p class="house__content-details_price">'.$row["precio"].'</p>
									</div>
									<div class="house__content-location">
										<img class="house__content-icon" src="img/mapa.png">
										<p>'.$row["ubicacion"].'</p>
									</div>
									<div class="house__content-features">
										<div class="house__content-features_description">
											<img class="house__content-icon" src="img/campana.png">
											<p>All Inclusive</p>
										</div>
										<div class="house__content-features_description">
											<img class="house__content-icon" src="img/wifi.png">
											<p>Free WiFi</p>
										</div>
										<div class="house__content-features_description">
											<img class="house__content-icon" src="img/bag.png">
											<p>Free Consultation</p>
										</div>
									</div>
								</div>
							</div>';
						}
						echo '</section>';
					}
				?>	 -->

		<section class="menu">
			<div class="menu__icon">
				<a href="#"><img src="img/Group 571.png"></a>
			</div>
			<div class="menu__icon">
				<a href="#"><img src="img/Ticket.png"></a>
			</div>
			<div class="menu__icon">
				<a href="#"><img src="img/Home1.png"></a>
			</div>
			<div class="menu__icon">
				<a href="#"><img src="img/Paper.png"></a>
			</div>
			<div class="menu__icon">
				<a href="#"><img src="img/Bookmark.png"></a>
			</div>
		</section>
	</main>
</body>
</html>