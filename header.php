<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  </head>
  <body>
    <div id="wrapper">
      <section id="banner">
				<h1><?=$pageID?></h1>
				<p><?=$pageBrand?></p>
			</section> <!-- banner -->
			<section id="order">
				<form action="index.php" method="post">
					<table>
						<tr><th>QTY</td><th>Bisquet</th><th>Description</th><th>Price</th><th>Extras</th><th>Total</th></tr>
						<tr><td><input type="number" name="quantity" min="0" max="99"></td><td>bisquetName</td><td>bisquetDescription</td><td>bisquetPrice</td><td><input type="checkbox" name="gravy" value="1.00">Gravy $1 <input type="checkbox" name="jam" value="0.50">Aunt Betty's Jam $.50</td><td>itemTotal</td></tr>
					