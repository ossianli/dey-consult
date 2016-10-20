<?php
	// Iterate trough lang->*lang* in xml, check if set matches. Else set to en.
	$xml = simplexml_load_file("l/lang.xml") or die();
	if(isset($_GET["l"])) {
		foreach ($xml->children() as $child) {
			if(($child->getName()) == $_GET['l'])
				$lang = $_GET['l'];
		}
	} else {
		$lang = "en";
	}
	
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="bower_components/webcomponentsjs/webcomponents.js"></script>
	<link rel="import" href="imports.html">
	<title>DEY</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body class="dey">
	<nav class="nav-bar">
		<div class="container">
			<ul class="left-nav">
				<li><a id="menutoggle"><i class="flaticon-bars"></i></a></li>
			</ul>
			<div class="logo"><h1>DEY</h1></div>
			<div class="nav-links expanded">
				<ul class="nav nav-pills">
					<li role="presentation"><a href="#products"><?php echo $xml->$lang->menu->products; ?></a></li>
					<li role="presentation"><a href="#quality"><?php echo $xml->$lang->menu->quality; ?></a></li>
					<li role="presentation"><a href="#about"><?php echo $xml->$lang->menu->about; ?></a></li>
					<li role="presentation" class="visible-xxs"><a href="#contact"><?php echo $xml->$lang->menu->contact; ?></a></li>
				</ul>
			</div>
			<ul class="right-nav">
					<li class="hidden-xs">070-351 53 77</li>
					<li class="hidden-xxs"><a href="#contact" class="btn btn-light"><span><?php echo $xml->$lang->menu->contact; ?></span></a></li>
					<li><div class="btn-group">
  						<button class="btn btn-light sm rectangular dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true aria-expanded="false">
    						<span><img width="16px" height="16px" src="i/<?php echo $lang; ?>.png"><span class="caret"></span></span>
  						</button>
  						<ul class="dropdown-menu lang-selection">
  							<?php
  								foreach($xml->children() as $child) {
  									echo '<li><a href="?l=' . $child->getName() . '"><img width="16px" height="16px" src="i/' . $child->getName() . '.png"></a></li>';
  								}
  							?>
  						</ul>
					</div>
				</li>
			</ul>
		</div>
		<div class="nav-links condensed">
			<ul class="nav nav-pills">
				<li role="presentation"><a href="#products"><?php echo $xml->$lang->menu->products; ?></a></li>
				<li role="presentation"><a href="#quality"><?php echo $xml->$lang->menu->quality; ?></a></li>
				<li role="presentation"><a href="#about"><?php echo $xml->$lang->menu->about; ?></a></li>
				<li role="presentation" class="visible-xxs"><a href="#contact"><?php echo $xml->$lang->menu->contact; ?></a></li>
			</ul>
		</div>
	</nav>
	<section class="section-hero">
		<div class="container">
			<div class="subheader text-center">
				<h1>Your quality Squeegee Supplier</h1>
			</div>
			<div class="panel alpha">
				<div class="panel-body">
					<p>Contact us for expert advise and a personalized service.</p>
					<p>We can aid you in Turkish, Swedish, German and English.</p>
				</div>
			</div>
		</div>
		<div class="arrow2"></div>
	</section>
	<section>
		<div class="arrow2"></div>
		<span class="anchor" id="products"></span>
		<div class="container">
			<div class="subheader text-center">
				<h1><?php echo $xml->$lang->products->title; ?></h1>
			</div>
			<p><?php echo $xml->$lang->products->text[0]; ?></p>
			<p><?php echo $xml->$lang->products->text[1]; ?></p>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Material</th>
							<th>Thickness (mm)</th>
							<th>Colours</th>
							<th>Hardness/Shore</th>
							<th>Resistance against chemicals</th>
							<th>Operating Temperatures (°C)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Polyurethane</td>
							<td>2 - 10</td>
							<td>Blue, Green, Yellow, Red, Brown, Transparent</td>
							<td>35 - 60</td>
							<td>A, T, O, S</td>
							<td>-30 / +70</td>
						</tr>
						<tr>
							<td>PARA (Natural Gum)</td>
							<td>3 - 10</td>
							<td>Red, Grey, Beige</td>
							<td>40</td>
							<td>A, T, S</td>
							<td>-10 / +60</td>
						</tr>
						<tr>
							<td>EPDM</td>
							<td>2 - 3</td>
							<td>Black</td>
							<td>65 - 80</td>
							<td>A, T, S</td>
							<td>-45 / +120</td>
						</tr>
						<tr>
							<td>PVC</td>
							<td>3</td>
							<td>Transparent</td>
							<td>80</td>
							<td>A, T, O, S</td>
							<td>0 / +60</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<section>
		<span class="anchor" id="quality"></span>
		<div class="container">
			<div class="subheader text-center">
				<h1><span><?php echo $xml->$lang->quality->title; ?></span></h1>
			</div>
			<p><?php echo $xml->$lang->quality->text; ?></p>
		</div>
	</section>
	<section class="section-about">
		<span class="anchor" id="about"></span>
		<div class="arrow2"></div>
		<div class="arrow-down"></div>
		<div class="container">
			<div class="subheader text-center">
				<h1><?php echo $xml->$lang->about->title; ?></h1>
			</div>
			<div class="panel alpha">
				<div class="panel-body">
					<p><?php echo $xml->$lang->about->text[0]; ?></p>
					<p><?php echo $xml->$lang->about->text[1]; ?></p>
				</div>
			</div>
		</div>
	</section>
	<section>
		<span class="anchor" id="contact"></span>
		<div class="container">
			<div class="subheader text-center">
				<h1>Contact</h1>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="panel">
						<div class="panel-body text-center">
							<p>DEY Consult <br>
							Laggkärlsvägen 28 <br>
							141 59 Huddinge <br>
							Sweden</p>
							<p>Tel: +46 8 1214 7943<br>
							Cell: +46 72 5199 474 <br>
							E-mail: deniz@deyconsult.com
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<form class="form-horizontal">
						<div class="form-group">
							<label for="contactCompany" class="col-sm-3 control-label">Company:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="contactCompany" placeholder="Company">
							</div>
						</div>
						<div class="form-group">
							<label for="contactName" class="col-sm-3 control-label">Name:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="contactName" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label for="contactEmail" class="col-sm-3 control-label">Email Address:</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="contactEmail" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="contactMsg" class="col-sm-3 control-label">Message:</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="contactMsg" rows="3"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-light"><span>Submit</span></button>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<div class="g-recaptcha" data-sitekey="6LfJ0QkUAAAAAJ9fJ7NV7n0CotE6U411Rld2Bkli"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>

</html>