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

if(isset($_SESSION['logedblok2']) AND $_SESSION['logedblok2'] ){
    
}else {
    header('Location:login.php');
}
if(isset($_GET['logout'])){
    $_SESSION['logedblok2']=FALSE;
    header('Location:login.php');
    
}

$servername = "localhost";
            $username = "root";
            $password = "";
            $database = "bgdom";
            @$conn = mysqli_connect($servername, $username, $password, $database);
            //check if connected
            if(!$conn){
                //we have error in connect
                $error .="Проблем при свързване с базата!";
                exit("Connection failed: " . mysqli_connect_error());
            }
            mysqli_set_charset($conn,"utf8");
            $bloknames = "";
            //Избор на блок
                $sql = "SELECT * FROM `blok table` WHERE id=2";
    
	                // query
	                $query = mysqli_query($conn,$sql);
	                    if($query){
                                 while ($row = mysqli_fetch_assoc($query)) {
                                $bloknames .= $row['blokname'];}
                                    }

                                    $sql = "SELECT apartnum, olddutys , months.monthname, lastpayment FROM blok2 LEFT JOIN months on month=m_id";
                                    $query = mysqli_query($conn,$sql);
                        
                                    $table = '<div class="col-md-8 col-md-offset-2 heading animate-box">
                                    <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Номер на апартамент</th>
                                        <th>Стари задължения</th>
                                        <th>Последно плащане</th>
                                        <th>Месец на плащането</th>
                                      </tr>
                                    </thead>
                                    <tbody>';
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        if($row['olddutys']>0){
                                            $table .= "  <tr class=\"danger\">
                                                        <td>".$row['apartnum']."</td>
                                                        <td>".$row['olddutys']." лв.</td>
                                                        <td>".$row['lastpayment']." лв.</td>
                                                        <td>".$row['monthname']."</td>
                                                   ";
                                        }
                                        if($row['olddutys']<0){
                                            $table .= "  <tr class=\"success\">
                                                        <td>".$row['apartnum']."</td>
                                                        <td>".$row['olddutys']." лв.</td>
                                                        <td>".$row['lastpayment']." лв.</td>
                                                        <td>".$row['monthname']."</td>
                                                   ";
                                        }
                                        if($row['olddutys']==0){
                                            $table .= "  <tr>
                                                        <td>".$row['apartnum']."</td>
                                                        <td>".$row['olddutys']." лв.</td>
                                                        <td>".$row['lastpayment']." лв.</td>
                                                        <td>".$row['monthname']."</td>
                                                   ";
                                        }
                

                
            }
            $table .= " </tr> </tbody></table></div>";
            
            $sql = "SELECT  monthname, availability , monthlyduties, restformonth FROM blok2view LEFT JOIN months ON id=m_id";
            $query = mysqli_query($conn,$sql);

            $table1 = '<div class="col-md-8 col-md-offset-2 heading animate-box"><table class="table">
            <thead>
              <tr>
                <th>Месец</th>
                <th>Приходи за месеца</th>
                <th>Разходи за месеца</th>
                <th>Остатък за месеца</th>
              </tr>
            </thead>
            <tbody>';
            while ($row = mysqli_fetch_assoc($query)) {
                $table1 .= "  <tr>
                                <td>".$row['monthname']."</td>
                                <td>".$row['availability']." лв.</td>
                                <td>".$row['monthlyduties']." лв.</td>
                                <td>".$row['restformonth']." лв.</td>
                           ";
            }
            $table1 .= " </tr> </tbody></table></div>";

            $sql = "SELECT  monthname, name , sum, picture FROM blok2files LEFT JOIN months ON month=m_id";
            $query = mysqli_query($conn,$sql);

            $table2 = '<div class="col-md-8 col-md-offset-2 heading animate-box"><table class="table">
            <thead>
              <tr>
                <th>Месец</th>
                <th>Документ име</th>
                <th>Документ сума</th>
                <th>Документ файл</th>
              </tr>
            </thead>
            <tbody>';
            while ($row = mysqli_fetch_assoc($query)) {
                $table2 .= "  <tr>
                                <td>".$row['monthname']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['sum']." лв.</td>
                                <td><a target=\"_blank\" href=\"files/blok2/".$row['picture']."\">Виж файла</a></td>";
            }
            $table2 .= " </tr> </tbody></table></div>";


?>
	<div class="gtco-loader"></div>
	
	<div id="page">
			<nav class="gtco-nav scrolled" role="navigation">
					<div class="container">
						<div class="row">
							<div class="col-sm-2 col-xs-12">
								<div id="gtco-logo"><a href="index.html"><img src="images/vvv new.png" alt="bgblok" style="display: block; margin: auto; width: 150px; height:100px;"></a></div>
							</div>
							<div class="col-xs-10 text-right menu-1 main-nav" style="font-size: 40px;">
								<ul>
									<li><a href="#" data-nav-section="about">Справка по апартаменти</a></li>
                                    <li><a href="#" data-nav-section="practice-areas">Обобщена справка</a></li>
                                    <li><a href="#" data-nav-section="documents">Документи</a></li>
									<li class="btn-cta"><a href="blok2.php?logout=" class="external"><span>Изход</span></a></li>
									<!-- For external page link -->
									<!-- <li><a href="http://gettemplates.co/" class="external">External</a></li> -->
								</ul>
							</div>
						</div>
						
					</div>
                </nav>
                
    <section id="gtco-about" data-section="about">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
					<h1>Справка по апартаменти за обект</h1>
					<p class="sub" style="color:red;"><?php echo $bloknames?></p>
				</div>
			</div>
			<div class="row">
				<!-- <div class="col-md-8"> -->
					<?php echo $table; ?>
				<!-- </div> -->
			</div>
		</div>
	</section>

	<section id="gtco-practice-areas" data-section="practice-areas">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
                    <h1>Обобщена справка за обект</h1>
					<p class="sub" style="color:red;"><?php echo $bloknames?></p>
				</div>
			</div>
			<div class="row">
            <?php echo $table1; ?>
			</div>
		</div>
    </section>
    
    <section id="gtco-documents" data-section="documents">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
                    <h1>Документи за обект</h1>
					<p class="sub" style="color:red;"><?php echo $bloknames?></p>
				</div>
			</div>
			<div class="row">
            <?php echo $table2; ?>
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
