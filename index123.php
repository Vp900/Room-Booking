<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
<!-- Hero Section -->
<section class="hero">
		<div class="hero_overlay"></div>
		<div class="hero_content">
			<h1>Finest luxury Villas & Holiday Rental Collections</h1>
			<div class="search_box">
				<!-- Location Selection -->
				<select class="booking_input booking_input_a" required>
					<option value="" disabled selected>Select Location</option>
					<option value="Karjat">Karjat</option>
					<option value="Pune">Pune</option>
					<option value="Khopoli">Khopoli</option>
					<option value="Lonavala">Lonavala</option>
				</select>
	
				<!-- Room Type Selection -->
				<select class="booking_input booking_input_a" required>
					<option value="" disabled selected>Select Type</option>
					<option value="Room">Room</option>
					<option value="Apartment">Apartment</option>
					<option value="Bungalow">Bungalow</option>
					<option value="Hotel">Hotel</option>
				</select>
	
				<button>Search</button>
			</div>
		</div>
	</section>


</body>
</html>