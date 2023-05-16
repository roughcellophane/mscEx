<?php

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

session_start();
include('db_conn.php');
if (isset($_SESSION['UserID']) && $_SESSION['Password']) {
	if (isset($_SESSION['error'])) {
		if ($_SESSION['error'] == 'wait') {
			echo "<script>alert('Please wait for your pre-existing order to be completed first.')</script>";
			$_SESSION['error'] = "";
		} elseif ($_SESSION['error'] == 'invalidfood') {
			echo "<script>alert('Food code invalid.')</script>";
			$_SESSION['error'] = "";
		} elseif ($_SESSION['error'] == 'nocopies') {
			echo "<script>alert('Please remove your pre-existing copy of this food first.')</script>";
			$_SESSION['error'] = "";
		} elseif ($_SESSION['error'] == 'deletepickup') {
			echo "<script>alert('Please remove your awaiting food first.')</script>";
			$_SESSION['error'] = "";
		}
	}
	?>	


<!DOCTYPE html>
<head>
	<title>MakSci Express</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel = "icon" href = "https://media.discordapp.net/attachments/1021975352945414186/1085188387692089474/MakSci_Express_Logo_Version_14_-_Symbol_1.1.png" type = "image/x-icon">
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,700" >
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:400,300'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" >
	<link rel="stylesheet" href="Menu Items.css">
	<link rel="stylesheet" href="Main Menu.css">
	<link rel="stylesheet" href="mySidebar.css">
	<link rel="stylesheet" href="dashboard.css">
	<link rel="stylesheet" href="foodbutton.css">
	<link rel="stylesheet" href="Checkout.css">
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="more sidebar.css">
	<link rel="stylesheet" href="item details pane.css">
	<link rel="stylesheet" href="popup.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" crossorigin="anonymous">

</head>
<body style="color: black !important;">
<!-- header-->
<div class="divider"></div>
<div class="header">
	<div><a class="hamburger" href="#" onclick="openNav_sidebar()"> <i class="fa fas fa-solid fa-bars"></i></a></div>
	<div class="icon logo">
		<img class="icon_pic"src="https://cdn.discordapp.com/attachments/1021975352945414186/1103678456866287746/MakSci_Express_Logo.png">AKSCIEXPRESS
	</div>
	<div class="yes">
		<div><a href="checkout real.php" class="checkout" onclick="openNav_checkout()"><i class="fa fas fa-solid fa-cart-shopping"></i></a></div>
	</div>
</div>
<div class="grid-container">
<!-- dashboard-->
<div class="slowpan">
	<section id="imgages-carousel">
			<div class="img-carousel-container">
				<div class="img-carousel">
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103661646045524099/1.png" draggable=false>
						<p>1/6</p>
					</div>
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103661646347522152/2.png" draggable=false> 
						<p>2/6</p>
					</div>
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103661646687256616/3.png" draggable=false> 
						<p>3/6</p>
					</div>
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103665597058920528/4.png" draggable=false> 
						<p>4/6</p>
					</div>
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103665597763563591/6.png" draggable=false> 
						<p>5/6</p>
					</div>
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103665598115876864/7.png" draggable=false>
						<p>6/6</p>
					</div>
				</div>
				<button id="prev"><i class="fas fa-chevron-left fa-2x"></i></button>
				<button id="next"><i class="fas fa-chevron-right fa-2x"></i></button> 
			</div>        
	</section> 



<!-- quick menu -->
	<footer class="grid-item footer">
	<div class="sign"> <h2>Quick Menu</h2> </div>
	<div class="quick_menu">
			<button class="mate" onclick="tosetMeals()"><img class="selection" src="https://cdn.discordapp.com/attachments/1021975352945414186/1101771170350628955/setmeals.png"></button>
			<button class="mate" onclick="toAlACarte()"><img class="selection" src="https://cdn.discordapp.com/attachments/1021975352945414186/1101771169788608604/download.png"></button>
	</div>
	<div class="quick_menu">
			<button class="mate" onclick="toExtras()"><img class="selection" src="https://cdn.discordapp.com/attachments/1021975352945414186/1101771170078007346/extras.png" ></button >
			<button class="mate" onclick="toDrinks()"><img class="selection" src="https://cdn.discordapp.com/attachments/1021975352945414186/1101771170635857981/drinks.png"></button >
	</div>
	</footer>

</div>
</div>


<div id="checkout" class="overlay">
	<a href="checkout.html" class="closebabe" onclick="closeNav_checkout()">&times;</a>
</div>

<div class="grid-yes">
	<main class="grid-item main">
	<div class="container" id="SetMeals">

		<div class="hs__wrapper">
		<div class="hs__header" >
			<h2 class="hs__headline">Set Meals</h2>
			<div class="hs__arrows">
			<a class="arrow disabled arrow-prev"></a>
			<a class="arrow arrow-next"></a></div>
		</div>

		<ul class="hs">

				<li class="hs__item"> 		  
				<div type="button" data-modal-target="#modal" class="hs__item__image__wrapper">
					<div class="detailspane setMealColor">
							<div class="nameDetails">TONKATSU</div>
							<div class="priceDetails">65 PESOS</div>
					</div>
					<a class="hs__item__image" href="#" draggable=false>
						<img class="menu" src="https://cdn.discordapp.com/attachments/795464336713580585/1091008874309488711/tonkatsu.jpg" alt=""/>
					</a>
				</div>

			<li class="hs__item"> 
			<div type="button" data-modal-target="#chicken" class="hs__item__image__wrapper" >
				<div class="detailspane setMealColor">
						<div class="nameDetails">FRIED CHICKEN</div>
						<div class="priceDetails">70 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://recipe30.com/wp-content/uploads/2020/05/Fried-chicken.jpg" alt=""/>		
					</a>
			</div>

			<li class="hs__item"> 
			<div type="button" data-modal-target="#dinuguan" class="hs__item__image__wrapper">
				<div class="detailspane setMealColor">
						<div class="nameDetails">DINUGUAN</div>
						<div class="priceDetails">75 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://i.ytimg.com/vi/U8oC6nqzhBY/maxresdefault.jpg" alt=""/>	
					</a>
			</div>

			<li class="hs__item"> 
			<div type="button" data-modal-target="#bopis" class="hs__item__image__wrapper" >
				<div class="detailspane setMealColor">
						<div class="nameDetails">BOPIS</div>
						<div class="priceDetails">65 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://panlasangpinoy.com/wp-content/uploads/2010/11/bopis-recipe.jpg" alt=""/>	
				</a>
			</div>


			<li class="hs__item"> 
			<div type="button" data-modal-target="#adobong_pusit" class="hs__item__image__wrapper" >
				<div class="detailspane setMealColor">
						<div class="nameDetails">ADOBONG PUSIT</div>
						<div class="priceDetails">65 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://yummykitchentv.com/wp-content/uploads/2021/04/adobong-pusit-recipe-01-1024x816.jpg" alt=""/>	
				</a>
			</div>


			<li class="hs__item"> 
			<div type="button" data-modal-target="#sinigang_baboy" class="hs__item__image__wrapper" >
				<div class="detailspane setMealColor">
						<div class="nameDetails">SINIGANG NA BABOY</div>
						<div class="priceDetails">70 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://www.pinoyrecipe.net/wp-content/uploads/2022/09/Sinigang-na-Baboy-sa-Batuan-Recipe-1200x675.jpg" alt=""/>	
				</a>
			</div>


			<li class="hs__item"> 
			<div type="button" data-modal-target="#sisig" class="hs__item__image__wrapper" >
				<div class="detailspane setMealColor">
						<div class="nameDetails">SISIG</div>
						<div class="priceDetails">65 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
f								<img class="menu" src="https://www.foxyfolksy.com/wp-content/uploads/2015/05/sisig-kapampangan-1.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" data-modal-target="#bicol_express" class="hs__item__image__wrapper" >
						<div class="detailspane setMealColor">
						<div class="nameDetails">BICOL EXPRESS</div>
						<div class="priceDetails">70 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://i0.wp.com/whattoeatph.com/wp-content/uploads/2022/03/DSC_9120.jpg?fit=720%2C576&ssl=1" alt=""/>	
				</a>
			</div>
		</ul>
		</div>
<br id="AlACarte">	  

		<div class="hs__wrapper">
		<div class="hs__header">
			<h2 class="hs__headline">A la carte</h2>
			<div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
		</div>

		<ul class="hs">
			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#spaghetti">
				<div class="detailspane alACarteColor" >
						<div class="nameDetails">SPAGHETTI</div>
						<div class="priceDetails">25 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://www.indianhealthyrecipes.com/wp-content/uploads/2022/07/mushroom-spaghetti-recipe.jpg" alt=""/>	
				</a>
			</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#carbonara">
				<div class="detailspane alACarteColor">
						<div class="nameDetails">CARBONARA</div>
						<div class="priceDetails">25 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://www.cookingclassy.com/wp-content/uploads/2020/10/spaghetti-carbonara-01.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#baked_mac">
				<div class="detailspane alACarteColor">
						<div class="nameDetails">BAKED MAC</div>
						<div class="priceDetails">25 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://images.summitmedia-digital.com/yummyph/images/2020/09/04/bakedmac640.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#eggplant_omelette">
				<div class="detailspane alACarteColor">
						<div class="nameDetails">EGGPLANT OMELETTE</div>
						<div class="priceDetails">25 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://staticcookist.akamaized.net/wp-content/uploads/sites/22/2020/07/mela-1200x675.jpg" alt=""/>	
			</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#ginisang_upo">
				<div class="detailspane alACarteColor">
						<div class="nameDetails">GINISANG UPO</div>
						<div class="priceDetails">55 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://momfoodblog.com/wp-content/uploads/2021/03/Ginisang-Upo-with-Pork-MomFoodBlog2.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#ginisang_monggo">
				<div class="detailspane alACarteColor">
						<div class="nameDetails">GINSANG MONGGO</div>
						<div class="priceDetails">30 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://speedyrecipe.com/wp-content/uploads/2018/04/Ginisang-Munggo.jpg" alt=""/>	
				</a>
			</div>

		</ul>
		</div>
<br id="Extras">

		<div class="hs__wrapper">
		<div class="hs__header">
			<h2 class="hs__headline">Extras</h2>
			<div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
		</div>

		<ul class="hs">
			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#rice">
				<div class="detailspane extrasColor">
						<div class="nameDetails">RICE</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://cdn.shopify.com/s/files/1/0406/5728/9378/products/Add-onPlainRice_530x@2x.jpg?v=1595751788" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#egg">
				<div class="detailspane extrasColor">
						<div class="nameDetails">EGG</div>
						<div class="priceDetails">15 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://www.sophisticatedgourmet.com/wp-content/uploads/2021/01/how-to-fry-an-egg-recipe.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#ham">
				<div class="detailspane extrasColor">
						<div class="nameDetails">HAM</div>
						<div class="priceDetails">20 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://www.everydayfamilycooking.com/wp-content/uploads/2019/12/air-fried-ham-slices.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#hotdog">
				<div class="detailspane extrasColor">
						<div class="nameDetails">HOTDOG</div>
						<div class="priceDetails">20 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://cdn.shopify.com/s/files/1/0487/5167/3505/products/BESTDOG-500g-3_360x.jpg?v=1633066669" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#siomai">
				<div class="detailspane extrasColor">
						<div class="nameDetails">SIOMAI</div>
						<div class="priceDetails">5 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://panlasangpinoy.com/wp-content/uploads/2020/01/pork-siomai-recipe.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#salad">
				<div class="detailspane extrasColor">
						<div class="nameDetails">SALAD</div>
						<div class="priceDetails">25 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://www.onceuponachef.com/images/2019/07/Big-Italian-Salad.jpg" alt=""/>	
				</a>
			</div>

		</ul>
		</div>
<br id="Drinks">

		<div class="hs__wrapper">
		<div class="hs__header">
			<h2 class="hs__headline">Drinks and Beverages</h2>
			<div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
		</div>
		<ul class="hs">

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#lemonade">
				<div class="detailspane drinkColor">
						<div class="nameDetails">LEMONADE</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://www.texanerin.com/content/uploads/2014/08/honey-lemonade-2-650x975.jpg" alt=""/>
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#bluelemonade">
				<div class="detailspane drinkColor">
						<div class="nameDetails">BLUE LEMONADE</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://i0.wp.com/charlotteshares.blog/wp-content/uploads/2022/05/img_4254_jpg.jpg?resize=768%2C1024&ssl=1" alt=""/>
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#iced_tea">
				<div class="detailspane drinkColor">
						<div class="nameDetails">ICED TEA</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://www.acouplecooks.com/wp-content/uploads/2020/07/Iced-Tea-001.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#red_iced_tea">
				<div class="detailspane drinkColor">
						<div class="nameDetails">RED ICED TEA</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://i.pinimg.com/564x/ae/41/60/ae41604e8ee060a9a1d1066954670b04.jpg" alt=""/>	
				</a>
			</div>


			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#cucumber_iced_tea">
				<div class="detailspane drinkColor">
						<div class="nameDetails">CUCUMBER ICED TEA</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://www.babaganosh.org/wp-content/uploads/2022/07/cucumber-lemonade-11.jpg.webp" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#mango_iced_tea">
				<div class="detailspane drinkColor">
						<div class="nameDetails">MANGO ICED TEA</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://www.whiskaffair.com/wp-content/uploads/2019/03/Mango-Iced-Tea-2-3.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#guyabano_iced_tea">
				<div class="detailspane drinkColor">
						<div class="nameDetails">GUYABANO ICED TEA</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://simplybakings.com/wp-content/uploads/2020/02/Gayubano-Smoothie-13.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#melon_juice">
				<div class="detailspane drinkColor">
						<div class="nameDetails">MELON JUICE</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9kOC6NsRK1YhkS-x4qj6iPGBIIo7UNS7u3fEHdGRzeu3vjjMjZOybf94K-8mI-8ZRGfU&usqp=CAU" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#gulaman">
				<div class="detailspane drinkColor">
						<div class="nameDetails">GULAMAN</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://i.pinimg.com/736x/a4/c8/a6/a4c8a62696ebd53b43458c8cadd9b25c.jpg" alt=""/>	
				</a>
			</div>

			<li class="hs__item"> 
			<div type="button" class="hs__item__image__wrapper" data-modal-target="#milo">
				<div class="detailspane drinkColor">
						<div class="nameDetails">MILO</div>
						<div class="priceDetails">10 PESOS</div>
				</div>
				<a class="hs__item__image" href="#" draggable=false>
					<img class="menu" src="https://recipes-by-reeshu.s3.ap-south-1.amazonaws.com/recipes/ice-milo-dinosaur/1.jpg" alt=""/>	
				</a>
			</div>
		</ul>
		</div>
	</div>
	</main>
</div>


<!--------------------------------------GUIDE------------------------------------------>
<div type="button" class="hs__item__image__wrapper" data-modal-target="#guide">Open Modal</div>
  <div class="guide" id="guide">
    <div class="guide-body">
	<button data-close-button class="closing-button">&times;</button>
		<section id="imgages-carousel">
		 <div class="img-carousel-container">
				<div class="img-carousel">
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103661646045524099/1.png" draggable=false>
						<p>1/6</p>
					</div>
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103661646347522152/2.png" draggable=false> 
						<p>2/6</p>
					</div>
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103661646687256616/3.png" draggable=false> 
						<p>3/6</p>
					</div>
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103665597058920528/4.png" draggable=false> 
						<p>4/6</p>
					</div>
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103665597763563591/6.png" draggable=false> 
						<p>5/6</p>
					</div>
					<div>
					<img src="https://cdn.discordapp.com/attachments/1021975352945414186/1103665598115876864/7.png" draggable=false>
						<p>6/6</p>
					</div>
				</div>
				<button id="prev"><i class="fas fa-chevron-left fa-2x"></i></button>
				<button id="next"><i class="fas fa-chevron-right fa-2x"></i></button> 
			</div>        
	</section> 
	</div>
  </div>
  <div id="pane"></div>




<!--------------------------------------DETAILS PANE------------------------------------------>

<!---------------------------------------SET MEALS------------------------------------------->

<!---------------------------------------Tonkatsu------------------------------------------->
<div class="SetMealsDivider">
  <div class="foodDisplay" id="modal">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Tonkatsu</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-1" name="desc-btn-1" checked>
								<label for="desc-1">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-2" name="desc-btn-1"/>
								<label for="desc-2">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">It is a thick juicy pork cutlet coated in crisp panko breadcrumbs.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>65</span> Pesos<br>With Rice</p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>55</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
					<div class="clearfix"></div>
					<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
					<div class="buttonAlign">
						<input class="color-btn for-color-1" type="radio" id="color-1" name="Food" value="M1">
						<label class="first-color" for="color-1"><p>With Rice</p></label> 
						<input class="color-btn for-color-2" type="radio" id="color-2" name="Food" value="A1">
						<label class="color-2" for="color-2"><p>A la Carte</p></label> 
						<div class="img-wrap tonkatsu-1"></div>
						<div class="img-wrap tonkatsu-2"></div>	
						<div class="back-color"></div>	
						<div class="back-color tonkatsu-2"></div>	
					</div>
					<br>
						<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
						<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
						<input class="btn" type="submit" value="Add To Cart" >
						</div>
					</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>

<!---------------------------------------Fried Chicken------------------------------------------->	
  <div class="foodDisplay" id="chicken">
	<div class="foodDisplay-body">
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Fried Chicken</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-3" name="desc-btn-2" checked>
								<label for="desc-3">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-4" name="desc-btn-2">
								<label for="desc-4">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">It is a dish consisting of deep fired chicken pieces that have been coated with seasoned flour.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>70</span> Pesos<br>With Rice</p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>60</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-3" type="radio" id="color-3" name="Food" value="M2">
						<label class="color-3" for="color-3"><p>With Rice</p></label> 
						<input class="color-btn for-color-4" type="radio" id="color-4" name="Food" value="A2">
						<label class="color-4" for="color-4"><p>A la Carte</p></label> 
						<div class="img-wrap fried_chicken-1"></div>
						<div class="img-wrap fried_chicken-2"></div>	
						<div class="back-color"></div>	
						<div class="back-color fried_chicken-2"></div>	
						</div>
					<br>
					<div class="info-wrap inputReformat">
					<label for="itemQty"><p class="money">Quantity:</p></label>
					<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
					<input class="btn" type="submit" value="Add To Cart" >
					</div>
					</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>		
		
	</div>
  </div>
<div id="pane"></div>


<!---------------------------------------Dinuguan------------------------------------------->	

  <div class="foodDisplay" id="dinuguan">
	<div class="foodDisplay-body">
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Dinuguan</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-5" name="desc-btn-3" checked>
								<label for="desc-5">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-6" name="desc-btn-3">
								<label for="desc-6">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">It is a Filipino savory stew usually of pork offal meat simmered in a rich, spicy dark gravy of pig blood, garlic, chili, and vinegar.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>70</span> Pesos<br>With Rice</p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>60</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-5" type="radio" id="color-5" name="Food" value="M3">
						<label class="color-5" for="color-5"><p>With Rice</p></label> 
						<input class="color-btn for-color-6" type="radio" id="color-6" name="Food" value="A3">
						<label class="color-6" for="color-6"><p>A la Carte</p></label> 
						<div class="img-wrap dinuguan-1"></div>
						<div class="img-wrap dinuguan-2"></div>	
						<div class="back-color dinuguan-1"></div>	
						<div class="back-color dinuguan-2"></div>	
						</div>
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
						<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
						<input class="btn" type="submit" value="Add To Cart" >
					</div>
				</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>		
		
	</div>
  </div>
<div id="pane"></div>

<!-----------------------------------------------------------------------BOPIS----------------------------------------------------------------------->	
  <div class="foodDisplay" id="bopis">
	<div class="foodDisplay-body">
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Bopis</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-7" name="desc-btn-4" checked>
								<label for="desc-7">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-8" name="desc-btn-4">
								<label for="desc-8">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A classic meal made of pork heart, lungs, and liver in tomato paste.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>65</span> Pesos<br>With Rice</p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>55</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-7" type="radio" id="color-7" name="Food" value="M4">
						<label class="color-7" for="color-7"><p>With Rice</p></label> 
						<input class="color-btn for-color-8" type="radio" id="color-8" name="Food" value="A4">
						<label class="color-8" for="color-8"><p>A la Carte</p></label> 
						<div class="img-wrap bopis-1"></div>
						<div class="img-wrap bopis-2"></div>	
						<div class="back-color bopis-1"></div>	
						<div class="back-color bopis-2"></div>	
						</div>
					<br>
						<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>		
		
	</div>
  </div>
<div id="pane"></div>


<!---------------------------------------ADOBONG PUSIT------------------------------------------->	
  <div class="foodDisplay" id="adobong_pusit">
	<div class="foodDisplay-body">
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Adobong Pusit</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-9" name="desc-btn-5" checked>
								<label for="desc-9">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-10" name="desc-btn-5">
								<label for="desc-10">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A delicious style of adobo that incorporates squid meat.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>65</span> Pesos<br>With Rice</p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>55</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-9" type="radio" id="color-9" name="Food" value="M5">
						<label class="color-9" for="color-9"><p>With Rice</p></label> 
						<input class="color-btn for-color-10" type="radio" id="color-10" name="Food" value="A5">
						<label class="color-10" for="color-10"><p>A la Carte</p></label> 
						<div class="img-wrap adobong_pusit-1"></div>
						<div class="img-wrap adobong_pusit-2"></div>	
						<div class="back-color adobong_pusit-1"></div>	
						<div class="back-color adobong_pusit-2"></div>
						</div>
			
					<br>
						
						<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>		
		
	</div>
  </div>
<div id="pane"></div>


<!---------------------------------------SINIGANG NA BABOY------------------------------------------->	
  <div class="foodDisplay" id="sinigang_baboy">
	<div class="foodDisplay-body">
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Sinigang na Baboy</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-11" name="desc-btn-6" checked>
								<label for="desc-11">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-12" name="desc-btn-6">
								<label for="desc-12">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A hot and sour soup with vegetables and pig meat.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>70</span> Pesos<br>With Rice</p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>60</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-11" type="radio" id="color-11" name="Food" value="M6">
						<label class="color-11" for="color-11"><p>With Rice</p></label> 
						<input class="color-btn for-color-12" type="radio" id="color-12" name="Food" value="A6">
						<label class="color-12" for="color-12"><p>A la Carte</p></label> 
						
						
						<div class="img-wrap siningang_baboy-1"></div>
						<div class="img-wrap siningang_baboy-2"></div>	
						<div class="back-color siningang_baboy-1"></div>	
						<div class="back-color siningang_baboy-2"></div>	
						</div>
			
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>		
		
	</div>
  </div>
<div id="pane"></div>


<!---------------------------------------SISIG------------------------------------------->	
  <div class="foodDisplay" id="sisig">
	<div class="foodDisplay-body">
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Sisig</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-13" name="desc-btn-7" checked>
								<label for="desc-13">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-14" name="desc-btn-7">
								<label for="desc-14">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">Minced pork, chopped onion, and chicken liver. It is a favorite dish for pulutan.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>65</span> Pesos<br>With Rice</p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>55</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-13" type="radio" id="color-13" name="Food" value="M7">
						<label class="color-13" for="color-13"><p>With Rice</p></label> 
						<input class="color-btn for-color-14" type="radio" id="color-14" name="Food" value="A7">
						<label class="color-14" for="color-14"><p>A la Carte</p></label> 
						
						
						<div class="img-wrap sisig-1"></div>
						<div class="img-wrap sisig-2"></div>	
						<div class="back-color sisig-1"></div>	
						<div class="back-color sisig-2"></div>	
						</div>
					<br>
						<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>		
		
	</div>
  </div>
<div id="pane"></div>


<!---------------------------------------------------Bicol Express------------------------------------------------------->	
  <div class="foodDisplay" id="bicol_express">
	<div class="foodDisplay-body">
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Bicol Express</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-15" name="desc-btn-8" checked>
								<label for="desc-15">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-16" name="desc-btn-8">
								<label for="desc-16">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A spicy dish made of minced pork, chopped onions, chili peppers, and tofu.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>70</span> Pesos<br>With Rice</p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>60</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-15" type="radio" id="color-15" name="Food" value="M8">
						<label class="color-15" for="color-15"><p>With Rice</p></label> 
						<input class="color-btn for-color-16" type="radio" id="color-16" name="Food" value="A8">
						<label class="color-16" for="color-16"><p>A la Carte</p></label> 
						
						
						<div class="img-wrap bicol_express-1"></div>
						<div class="img-wrap bicol_express-2"></div>	
						<div class="back-color bicol_express-1"></div>	
						<div class="back-color bicol_express-2"></div>
						</div>
			
					<br>
						
						<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>		
		
	</div>
	  </div>
	<div id="pane"></div>
</div>


<!---------------------------------------A la Carte------------------------------------------->


	
<!---------------------------------------Spaghetti------------------------------------------->
  <div class="foodDisplay" id="spaghetti">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Spaghetti</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-17" name="desc-btn-9" checked>
								<label for="desc-17">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-18" name="desc-btn-9"/>
								<label for="desc-18">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">The Italian spaghetti, but sweeter and with hotdogs.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>55</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
							<input class="color-btn for-color-17" type="radio" id="color-17" name="Food" value="A9" checked>
							<label class="color-17" for="color-17"><p>A la Carte</p></label> 
							<div class="img-wrap spaghetti-1"></div>
							<div class="back-color spaghetti-1"></div>	
					<br>
						<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Carbonara------------------------------------------->
  <div class="foodDisplay" id="carbonara">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Carbonara</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-19" name="desc-btn-10" checked>
								<label for="desc-19">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-20" name="desc-btn-10"/>
								<label for="desc-20">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A white, creamy pasta known for its rich, flavorful sauce.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>25</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
	<input class="color-btn for-color-18" type="radio" id="color-18" name="Food" value="A10" checked>
	<label class="color-18" for="color-18"><p>A la Carte</p></label> 
	<div class="img-wrap carbonara-1"></div>
	<div class="back-color carbonara-1"></div>	
<br>
<div class="info-wrap inputReformat">
<label for="itemQty"><p class="money">Quantity:</p></label>
		<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
		<input class="btn" type="submit" value="Add To Cart" >
</div>
</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>



<!---------------------------------------Baked Mac------------------------------------------->
  <div class="foodDisplay" id="baked_mac">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Baked Mac</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-21" name="desc-btn-11" checked>
								<label for="desc-21">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-22" name="desc-btn-11"/>
								<label for="desc-22">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A meal of macaroni with tomato sauce, topped with melted cheese.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>25</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
							<input class="color-btn for-color-19" type="radio" id="color-19" name="Food" value="A11" checked>
							<label class="color-19" for="color-19"><p>A la Carte</p></label> 
							<div class="img-wrap baked_mac-1"></div>
							<div class="back-color baked_mac-1"></div>	
							<div class="info-wrap inputReformat">
								<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</div>
						</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Eggplant Omelette------------------------------------------->
  <div class="foodDisplay" id="eggplant_omelette">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Eggplant Omelette</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-23" name="desc-btn-12" checked>
								<label for="desc-23">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-24" name="desc-btn-12"/>
								<label for="desc-24">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">Mashed eggplant coated in seasoned beaten egg.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>25</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<input class="color-btn for-color-20" type="radio" id="color-20" name="Food" value="A12" checked>
						<label class="color-20" for="color-20"><p>A la Carte</p></label> 
						<div class="img-wrap eggplant_omelette-1"></div>
						<div class="back-color eggplant_omelette-1"></div>	
					<br>
						<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
							<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
							<input class="btn" type="submit" value="Add To Cart" >
						</div>
					</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Ginisang Upo------------------------------------------->
  <div class="foodDisplay" id="ginisang_upo">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Ginisang Upo</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-25" name="desc-btn-13" checked>
								<label for="desc-25">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-26" name="desc-btn-13"/>
								<label for="desc-26">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">Bottle gourds sautéed in garlic, onions, and tomatoes.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>25</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<input class="color-btn for-color-21" type="radio" id="color-21" name="Food" value="A13" checked>
						<label class="color-21" for="color-21"><p>A la Carte</p></label> 
						<div class="img-wrap ginisang_upo-1"></div>
						<div class="back-color ginisang_upo-1"></div>	
					<br>
					<div class="info-wrap inputReformat">
					<label for="itemQty"><p class="money">Quantity:</p></label>
					<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
					<input class="btn" type="submit" value="Add To Cart" >
					</div>
					</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Ginisang Monggo------------------------------------------->
  <div class="foodDisplay" id="ginisang_monggo">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Ginisang Monggo</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-27" name="desc-btn-14" checked>
								<label for="desc-27">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-28" name="desc-btn-14"/>
								<label for="desc-28">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">Mung beans served with various vegetables and meat.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>25</span> Pesos<br>A la Carte</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>			
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<input class="color-btn for-color-22" type="radio" id="color-22" name="Food" value="A14" checked>
						<label class="color-22" for="color-22"><p>A la Carte</p></label> 
						<div class="img-wrap ginisang_monggo-1"></div>
						<div class="back-color ginisang_monggo-1"></div>	
					<br>
					<div class="info-wrap inputReformat">
<label for="itemQty"><p class="money">Quantity:</p></label>
		<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
		<input class="btn" type="submit" value="Add To Cart" >
</div>
</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>



<!-------------------------------------------EXTRAS----------------------------------------------->

<!---------------------------------------Rice------------------------------------------->
  <div class="foodDisplay" id="rice">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Rice</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-29" name="desc-btn-15" checked>
								<label for="desc-29">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-30" name="desc-btn-15"/>
								<label for="desc-30">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A cup of plain white rice </p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br>Extra</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<input class="color-btn for-color-23" type="radio" id="color-23" name="Food" value="E1" checked>
						<label class="color-23" for="color-23"><p>A la Carte</p></label> 
						
						
						<div class="img-wrap rice-1"></div>
						<div class="back-color rice-1"></div>	
					<br>
						
						<div class="info-wrap inputReformat">
						
						<br>
						<label for="itemQty"><p class="money">Quantity:</p></label>
						<div ng-app="app">
							<form
								action="/basket/add"
								class="add-to-cart text-center"
								method="POST"
								name="addToBasket">

								<div class="add-qty"
									max-qty="9"
									model="item.qty"
									select-classes="input input--select"
									hide-extra-text="false"
									input-name="itemQty"
									quantity-selector>

									<input
										type="number"
										class="input input--select"
										min="1"
										value="1">

									<input class="btn" ng-click="submit($event, addToBasket)" type="submit" value="Add To Cart" >
								</div>
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>

<!---------------------------------------Egg------------------------------------------->
  <div class="foodDisplay" id="egg">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Egg</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-31" name="desc-btn-16" checked>
								<label for="desc-31">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-32" name="desc-btn-16"/>
								<label for="desc-32">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A simple fried egg to make everything better.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br>Extra</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<input class="color-btn for-color-24" type="radio" id="color-24" name="Food" value="E2" checked>
						<label class="color-24" for="color-24"><p>A la Carte</p></label> 
						
						
						<div class="img-wrap egg-1"></div>
						<div class="back-color egg-1"></div>	
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>

<!---------------------------------------Ham------------------------------------------->
  <div class="foodDisplay" id="ham">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Ham</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-33" name="desc-btn-17" checked>
								<label for="desc-33">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-34" name="desc-btn-17"/>
								<label for="desc-34">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A slice of Filipino Fiesta ham</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>25</span> Pesos per Slice<br>Extra</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<input class="color-btn for-color-25" type="radio" id="color-25" name="Food" value="E3" checked>
						<label class="color-25" for="color-25"><p>A la Carte</p></label> 
						
						
						<div class="img-wrap ham-1"></div>
						<div class="back-color ham-1"></div>	
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Hotdog------------------------------------------->
  <div class="foodDisplay" id="hotdog">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Hotdog</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-35" name="desc-btn-18" checked>
								<label for="desc-35">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-36" name="desc-btn-18"/>
								<label for="desc-36">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">Some good'ol' pan-fried tender, juicy hotdog </p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>25</span> Pesos per Piece<br>Extra</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<input class="color-btn for-color-26" type="radio" id="color-26" name="Food" value="E4" checked>
						<label class="color-26" for="color-26"><p>A la Carte</p></label> 
						
						
						<div class="img-wrap hotdog-1"></div>
						<div class="back-color hotdog-1"></div>	
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Siomai------------------------------------------->
  <div class="foodDisplay" id="siomai">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Siomai</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-37" name="desc-btn-19" checked>
								<label for="desc-37 desc-even">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-38" name="desc-btn-19"/>
								<label for="desc-38">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">It is a traditional Chinese dumpling, made with paper-thin wraps and flavorful toothsome ground meat fillings.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br>Extra</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<input class="color-btn for-color-27" type="radio" id="color-27" name="Food" value="E5" checked>
						<label class="color-27" for="color-27"><p>A la Carte</p></label> 
						
						
						<div class="img-wrap siomai-1"></div>
						<div class="back-color siomai-1"></div>	
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>



<!---------------------------------------Salad------------------------------------------->
  <div class="foodDisplay" id="salad">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Salad</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-39" name="desc-btn-20" checked>
								<label for="desc-39">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-40" name="desc-btn-20"/>
								<label for="desc-40">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A dish composed of lettuce, cucumber, tomato and onion, drizzled in vinegar.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>25</span> Pesos<br>Extra</p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<input class="color-btn for-color-28" type="radio" id="color-28" name="Food" value="E6" checked>
						<label class="color-28" for="color-28"><p>A la Carte</p></label> 
						
						
						<div class="img-wrap salad-1"></div>
						<div class="back-color salad-1"></div>	
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------DRINKS------------------------------------------->



<!---------------------------------------Lemonade------------------------------------------->
  <div class="foodDisplay" id="lemonade">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Lemonade</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-41" name="desc-btn-21" checked>
								<label for="desc-41">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-42" name="desc-btn-21"/>
								<label for="desc-42">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">Lemonade is a colourless sweet fizzy drink. A drink that is made from lemons, sugar, and water.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br></p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>20</span> Pesos<br></p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-29" type="radio" id="color-29" name="Food" value="D1">
						<label class="color-29" for="color-29"><p>Small</p></label> 
						<input class="color-btn for-color-30" type="radio" id="color-30" name="Food" value="D2">
						<label class="color-30" for="color-30"><p>Medium</p></label> 
						
						
						<div class="img-wrap lemonade-1"></div>
						<div class="img-wrap lemonade-2"></div>	
						<div class="back-color lemonade-1"></div>	
						<div class="back-color lemonade-2"></div>	
						</div>
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Blue Lemonade------------------------------------------->
  <div class="foodDisplay" id="bluelemonade">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Blue Lemonade</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-43" name="desc-btn-22" checked>
								<label for="desc-43">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-44" name="desc-btn-22"/>
								<label for="desc-44">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">The classic lemonade but with an added cotton candy flavor.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br></p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>20</span> Pesos<br></p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-31" type="radio" id="color-31" name="Food" value="D3">
						<label class="color-31" for="color-31"><p>Small</p></label> 
						<input class="color-btn for-color-32" type="radio" id="color-32" name="Food" value="D4">
						<label class="color-32" for="color-32"><p>Medium</p></label> 
						
						
						<div class="img-wrap bluelemonade-1"></div>
						<div class="img-wrap bluelemonade-2"></div>	
						<div class="back-color bluelemonade-1"></div>	
						<div class="back-color bluelemonade-2"></div>
						</div>	
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>

<!---------------------------------------Iced Tea------------------------------------------->
  <div class="foodDisplay" id="iced_tea">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Iced Tea</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-45" name="desc-btn-23" checked>
								<label for="desc-45">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-46" name="desc-btn-23"/>
								<label for="desc-46">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A cup of the classic NESTEA lemon iced tea, served with ice.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br></p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>20</span> Pesos<br></p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-33" type="radio" id="color-33" name="Food" value="D5">
						<label class="color-33" for="color-33"><p>Small</p></label> 
						<input class="color-btn for-color-34" type="radio" id="color-34" name="Food" value="D6">
						<label class="color-34" for="color-34"><p>Medium</p></label> 
						
						
						<div class="img-wrap iced_tea-1"></div>
						<div class="img-wrap iced_tea-2"></div>	
						<div class="back-color iced_tea-1"></div>	
						<div class="back-color iced_tea-2"></div>
					</div>
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Red Iced Tea------------------------------------------->
  <div class="foodDisplay" id="red_iced_tea">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Red Iced Tea</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-47" name="desc-btn-24" checked>
								<label for="desc-47">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-48" name="desc-btn-24"/>
								<label for="desc-48">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A cup of the refreshing fruity red NESTEA iced tea, served with ice.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br></p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>20</span> Pesos<br></p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-35" type="radio" id="color-35" name="Food" value="D7">
						<label class="color-35" for="color-35"><p>Small</p></label> 
						<input class="color-btn for-color-36" type="radio" id="color-36" name="Food" value="D8">
						<label class="color-36" for="color-36"><p>Medium</p></label> 
						
						
						<div class="img-wrap red_iced_tea-1"></div>
						<div class="img-wrap red_iced_tea-2"></div>	
						<div class="back-color red_iced_tea-1"></div>	
						<div class="back-color red_iced_tea-2"></div>
					</div>
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Cucumber Iced Tea------------------------------------------->
  <div class="foodDisplay" id="cucumber_iced_tea">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Cucumber Iced Tea</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-49" name="desc-btn-25" checked>
								<label for="desc-49">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-50" name="desc-btn-25"/>
								<label for="desc-50">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">Taste summer in a cup with this delicious and unbeatable combination of zingy lemonade and crisp cucumber flavour!</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br></p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>20</span> Pesos<br></p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<div class="buttonAlign">
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<input class="color-btn for-color-37" type="radio" id="color-37" name="Food" value="D9">
						<label class="color-37" for="color-37"><p>Small</p></label> 
						<input class="color-btn for-color-38" type="radio" id="color-38" name="Food" value="D10">
						<label class="color-38" for="color-38"><p>Medium</p></label> 
						
						
						<div class="img-wrap cucumber_iced_tea-1"></div>
						<div class="img-wrap cucumber_iced_tea-2"></div>	
						<div class="back-color cucumber_iced_tea-1"></div>	
						<div class="back-color cucumber_iced_tea-2"></div>
					</div>
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Mango Iced Tea------------------------------------------->
  <div class="foodDisplay" id="mango_iced_tea">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Mango Iced Tea</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-51" name="desc-btn-26" checked>
								<label for="desc-51">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-52" name="desc-btn-26"/>
								<label for="desc-52">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">The fresh and fruity taste of mango paired with the tart taste of lemons.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br></p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>20</span> Pesos<br></p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-39" type="radio" id="color-39" name="Food" value="D11">
						<label class="color-39" for="color-39"><p>Small</p></label> 
						<input class="color-btn for-color-40" type="radio" id="color-40" name="Food" value="D12">
						<label class="color-40" for="color-40"><p>Medium</p></label> 
						
						
						<div class="img-wrap mango_iced_tea-1"></div>
						<div class="img-wrap mango_iced_tea-2"></div>	
						<div class="back-color mango_iced_tea-1"></div>	
						<div class="back-color mango_iced_tea-2"></div>	
						</div>
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Guyabano Iced Tea------------------------------------------->
  <div class="foodDisplay" id="guyabano_iced_tea">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Guyabano Iced Tea</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-53" name="desc-btn-27" checked>
								<label for="desc-53">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-54" name="desc-btn-27"/>
								<label for="desc-54">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">Enjoy the refreshing taste of real tea combined with guyabano and a flavor of lemon.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br></p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>20</span> Pesos<br></p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-41" type="radio" id="color-41" name="Food" value="D13">
						<label class="color-41" for="color-41"><p>Small</p></label> 
						<input class="color-btn for-color-42" type="radio" id="color-42" name="Food" value="D14">
						<label class="color-42" for="color-42"><p>Medium</p></label> 
						
						
						<div class="img-wrap guyabano_iced_tea-1"></div>
						<div class="img-wrap guyabano_iced_tea-2"></div>	
						<div class="back-color guyabano_iced_tea-1"></div>	
						<div class="back-color guyabano_iced_tea-2"></div>	
						</div>
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Melon Juice------------------------------------------->
  <div class="foodDisplay" id="melon_juice">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Melon Juice</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-55" name="desc-btn-28" checked>
								<label for="desc-55">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-56" name="desc-btn-28"/>
								<label for="desc-56">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A Filipino refreshment where it is made out of shredded melon, water, sugar, milk and ice.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br></p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>20</span> Pesos<br></p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-43" type="radio" id="color-43" name="Food" value="D15">
						<label class="color-43" for="color-43"><p>Small</p></label> 
						<input class="color-btn for-color-44" type="radio" id="color-44" name="Food" value="D16">
						<label class="color-44" for="color-44"><p>Medium</p></label> 
						
						
						<div class="img-wrap melon_juice-1"></div>
						<div class="img-wrap melon_juice-2"></div>	
						<div class="back-color melon_juice-1"></div>	
						<div class="back-color melon_juice-2"></div>
					</div>
						
					<br>
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Gulaman------------------------------------------->
  <div class="foodDisplay" id="gulaman">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Gulaman</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-57" name="desc-btn-29" checked>
								<label for="desc-57">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-58" name="desc-btn-29"/>
								<label for="desc-58">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A trademark Filipino drink composed of brown sugar, water, gelatin, and some tapioca pearls.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br></p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>20</span> Pesos<br></p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-45" type="radio" id="color-45" name="Food" value="D17">
						<label class="color-45" for="color-45"><p>Small</p></label> 
						<input class="color-btn for-color-46" type="radio" id="color-46" name="Food" value="D18">
						<label class="color-46" for="color-46"><p>Medium</p></label> 
						
						
						<div class="img-wrap gulaman-1"></div>
						<div class="img-wrap gulaman-2"></div>	
						<div class="back-color gulaman-1"></div>	
						<div class="back-color gulaman-2"></div>
					</div>
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>


<!---------------------------------------Milo------------------------------------------->
  <div class="foodDisplay" id="milo">
	<div class="foodDisplay-body">	
	 <div class="ITEM_DETAILS"> 
		<div class="FOOD">
			<div class="section-fluid-main">
			<button data-close-button class="close-button">&times;</button>
					<div class="section">
						<div class="info-wrap mob-margin">
							<p class="title-up">MakSci Express</p>
							<p class="dish_name">Milo</p>
							<div class="section-fluid">
								<input class="desc-btn desc-odd" type="radio" id="desc-59" name="desc-btn-30" checked>
								<label for="desc-59">Description</label> 
								<input class="desc-btn desc-even" type="radio" id="desc-60" name="desc-btn-30"/>
								<label for="desc-60">Prices</label> 
								<div class="section-fluid desc-sec accor-odd">
									<p class="smol">A cup of cold Milo served with ice.</p>
								</div>	
								<div class="section-fluid desc-sec accor-even">
									<div class="section-inline">
										<p class="smol"><span>10</span> Pesos<br></p>
									</div>	
									<div class="section-inline">
										<p class="smol"><span>20</span> Pesos<br></p>
									</div>
								</div>	
							</div>
							<p class="choose">Choose order option:</p>
						</div>
						<div class="clearfix"></div>
						<form action="entry.php" class="add-to-cart text-center" method="POST" name="addToBasket">
						<div class="buttonAlign">
						<input class="color-btn for-color-47" type="radio" id="color-47" name="Food" value="D19">
						<label class="color-47" for="color-47"><p>Small</p></label> 
						<input class="color-btn for-color-48" type="radio" id="color-48" name="Food" value="D20">
						<label class="color-48" for="color-48"><p>Medium</p></label> 
						
						
						<div class="img-wrap milo-1"></div>
						<div class="img-wrap milo-2"></div>	
						<div class="back-color milo-1"></div>	
						<div class="back-color milo-2"></div>
					</div>
					<br>
						
					<div class="info-wrap inputReformat">
						<label for="itemQty"><p class="money">Quantity:</p></label>
								<input type="number" name="quan" class="input input--select" max="9" min="1" value="1">
								<input class="btn" type="submit" value="Add To Cart" >
							</form>
						</div>
						</div>
						
					</div>
			</div>
		</div>
		</div>
	</div>
  </div>		
<div id="pane"></div>

<div id="mySidebar" class="sidebar"> 
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav_sidebar()">&times;</a>

			<!-- display MakSci Express in Sidebar -->		
			<div id="nav">

				<div class="nav-content">
				<div class="nav-header"><h2 class="nav-greeting">MakSci Express</h2></div>
				<div>	

			<!-- display name of user -->		
				<div class="nav-title">Good day, <?php echo $_SESSION['FName'] ?>										 	<?php echo $_SESSION['LName'] ?>!</div>
				<br>

			<!-- main nav buttons -->	
				<div class="nav-section">
					<div class="nav-options">
					<a class="nav-option" href="checkout real.php" data-modal-target="#guide">
						<i class="fa-solid fa-cart-shopping"></i>
						<span>Checkout</span>
					</a>
					<a class="nav-option" href="#">
						<i class="fa-solid fa-question"></i>
						<span>Guide</span>
					</a>
					<a class="nav-option" href="#">
						<i class="fas fa-solid fa-moon"></i>
						<span>Dark Mode</span>
					</a>
					</div>
				</div>

			<!-- display Item tracker -->
				<div class="nav-section">
					<h2 class="nav-section-label">Order Tracker: <span class="Order ID"> <?php echo $data['OrderID']; ?> </span></h2>               
					<div class="nav-section-content">
					<div class="nav-tracker">
						<h3 class="nav-tracker-label">Current Status: <span class="highlight">
							<?php
							$query = "SELECT * FROM Orders";
							$result = mysqli_query($conn, $query);
							if (mysqli_num_rows($result) > 0) {
							$data = mysqli_fetch_assoc($result); 
								echo $data['CurrentStatus']; 
							}
							else {
								echo 'Please order';
							}?> </span></h3>
						<div class="nav-tracker-progress" data-progress-percent= "<?php echo $find['TimeLeft']?>">
						<div class="nav-tracker-progress-bar" >
						</div>
						</div>
					</div>
					</div>
				</div>


			<!-- display Location of store -->
				<div class="nav-section">
					<h2 class="nav-section-label">Location</h2>              
					<div class="nav-section-content">
					<div class="nav-track">
						<h3 class="nav-track-label">6th Floor: <span class="process"> Co-Op Canteen</span></h3>
					</div>
					</div>
				</div>

			<!-- display more info button -->		
				<div class="nav-section">
					<h2 class="nav-section-label">Learn More?</h2>              
					<div class="nav-section-content">
					<div class="nav-track">
						<a href="#" class="more">Stuff About us</a>
					</div>
					</div>
				</div>


			<!-- Sign Out Button -->
				<div class="nav-config-options">
					<button class="sign-out nav-config-option" type="button">
					<a href="logout.php">Sign Out</a>
					</button>
				</div>
				</div>
			</div>
			</div>	
	</div>

<!-- from the original code -->



<?php if (isset($_SESSION['COS'])) {
echo $_SESSION['COS'];
}
?>
<?php
if ($_SESSION['Access'] == "admin") {
?>
					<p><br>Clear all orders</p>
					<form action = "clear.php">
						<input type="submit">
						</form>
					<p><br>Start timer</p>
					<form action = "timerstart.php">
						<input type="submit">
						</form>
						<br>
						
			

<?php
}?>
								
</body>
<?php
}

else{
	header('Location: index.php');
	exit();
}

?>
<head>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
	<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://kit.fontawesome.com/1ee8f271b9.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
	<script src="Menu Items.js"></script>
	<script src="dashboard.js"></script>
	<script src="sidebar.js"></script>	
	<script src="scroll.js"></script>
	<script src="progress_bar.js"></script>
	<script defer src="popup.js"></script>
	<script src="https://kit.fontawesome.com/133ee41db0.js" crossorigin="anonymous"></script>
</head>
<!DOCTYPE html>
<!-- dsfjdsf -->;