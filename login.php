<!DOCTYPE HTML>
<!--
	Justice by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Justice &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400, 900" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Owl Carousel  -->
	
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Flexslider -->
	
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
    
    <?php
session_start();
$message = '';
//check if is sent user & pass
if(isset($_POST['username']) AND isset($_POST['pass'])){
	$user = $_POST['username'];
	$pass = $_POST['pass'];
	
	//connect to MySQL
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "bgdom";
		@$conn = mysqli_connect($servername, $username, $password, $database);
		//check if connected
		if(!$conn){
			//we have error in connect
			$error .="Проблем при свързване с базата! Вашата поръчка не е приета! ";
			exit("Connection failed: " . mysqli_connect_error());
		}
		mysqli_set_charset($conn,"utf8");
		$user = mysqli_real_escape_string($conn,$user);
		$pass = md5($pass);
		
	//sql
		$sql = "SELECT * FROM `users` WHERE username=\"$user\" AND password=\"$pass\"";
		$query=mysqli_query($conn,$sql);
		if(mysqli_num_rows($query)==1){
			$row=mysqli_fetch_assoc($query);
			
			$_SESSION['name'] = $row['name'];
				if($row['id']==0){
					$_SESSION['logedadmin']= TRUE;
					header('Location: admin.php');
				}
				if($row['id']==1){
					$_SESSION['logedblok1']= TRUE;
					header('Location: blok1.php');
				}
				if($row['id']==2){
					$_SESSION['logedblok2']= TRUE;
					header('Location: blok2.php');
				}
		}
		else{
			$message = '<div class="alert alert-danger">
  						Невалидно име и парола!
						</div>';
		}
}

?>
	<div class="gtco-loader"></div>
	
	<div id="page">
			<nav class="gtco-nav" role="navigation">
					<div class="container">
						<div class="row">
							<div class="col-sm-2 col-xs-12">
								<div id="gtco-logo"><a href="index.html"><img src="images/vvv new.png" alt="bgblok" style="display: block; margin: auto; width: 150px; height:100px;"></a></div>
							</div>
							<div class="col-xs-10 text-right menu-1 main-nav" style="font-size: 40px;">
								<ul>
									<li class="active"><a href="index.html" class="external">Начало</a></li>
									<li><a href="index.html" data-nav-section="about" class="external">За Нас</a></li>
									<li><a href="index.html" data-nav-section="practice-areas" class="external">Услуги</a></li>
									<!-- <li><a href="#" data-nav-section="our-team">Our Team</a></li> -->
									<li><a href="index.html" data-nav-section="contact"><span>Контакти</span></a></li>
									<li class="btn-cta"><a href="index.html"><span>Вход за клиенти</span></a></li>
									<!-- For external page link -->
									<!-- <li><a href="http://gettemplates.co/" class="external">External</a></li> -->
								</ul>
							</div>
						</div>
						
					</div>
                </nav>
                
                <section id="gtco-contact" data-section="contact">
                    <div class="container">
                        <div class="row row-pb-md">
                            <div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
                                <h1>Вход за клиенти</h1>
                                <p class="subtle-text animate-box" data-animate-effect="fadeIn">Вход за клиенти</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 animate-box" style="text-align:center;">
                            <?php echo $message; ?>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="username" class="sr-only">Username</label>
                                        <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="pass" class="sr-only">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" id="pass" name="pass">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Вход" class="btn btn-primary" name="login">
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="col-md-4 col-md-pull-6 animate-box">
                                <div class="gtco-contact-info">
                                    <ul>
                                        <li class="address">198 West 21th Street, Suite 721 New York NY 10016</li>
                                        <li class="phone"><a href="tel://1235235598">+ 1235 2355 98</a></li>
                                        <li class="email"><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                                        <li class="url"><a href="#">http://gettemplates.co</a></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </section>
                
    <footer id="gtco-footer" role="contentinfo">
		<div class="container">
			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by Tersi <a href="https://www.facebook.com/vanya.neshevastoeva.7" target="_blank">Contact</a> Bootstrap Tamplate <a href="http://gettemplates.co/" target="_blank">GetTemplates.co</a> Free Images: <a href="http://pixabay.com/" target="_blank">PixaBay</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="https://www.facebook.com/Domoupravitel.BgBlok" target="_blank"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</div>
	</footer>
                </div>
            
                <div class="gototop js-top">
                    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
                </div>
                
                <!-- jQuery -->
                <script src="js/jquery.min.js"></script>
                <!-- jQuery Easing -->
                <script src="js/jquery.easing.1.3.js"></script>
                <!-- Bootstrap -->
                <script src="js/bootstrap.min.js"></script>
                <!-- Waypoints -->
                <script src="js/jquery.waypoints.min.js"></script>
                <!-- Stellar -->
                <script src="js/jquery.stellar.min.js"></script>
                <!-- Magnific Popup -->
                <script src="js/jquery.magnific-popup.min.js"></script>
                <script src="js/magnific-popup-options.js"></script>
                <!-- Main -->
                <script src="js/main.js"></script>
            
                </body>
            </html>
