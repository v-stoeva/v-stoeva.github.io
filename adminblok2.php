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

    if(isset($_SESSION['logedadmin']) AND $_SESSION['logedadmin'] ){
        
    }else {
        header('Location:login.php');
    }
    if(isset($_GET['logout'])){
        $_SESSION['logedadmin']=FALSE;
        header('Location:login.php');
        
    }
            $bloknames = '';
            $appnumber = '';
            require_once('functions.php');
            $alert=array();

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
    //Избор на блок
    $sql = "SELECT * FROM `blok table` WHERE id=2";
    
	// query
	$query = mysqli_query($conn,$sql);
	if($query){
        while ($row = mysqli_fetch_assoc($query)) {
        $bloknames .= $row['blokname'];}
    }

    //Избор на апартамент
    $sql = "SELECT * FROM `blok2`";
	//query
	$query = mysqli_query($conn,$sql);
	if($query){
        while ($row = mysqli_fetch_assoc($query)) {
        $appnumber .="<option value='".$row['id']."'>".$row['apartnum']."</option>\r\n";}
    }
    //Добавяне на задължения
    if(isset($_POST['addduty']) AND $_POST['addduty']=="Добави задължение"){
        if(isset($_POST['appnumber']) AND $_POST['appnumber']==0){
           
            $appartment = Array();
            
            $sum = mysqli_real_escape_string($conn,$_POST['dutysum']);
            $sql1="SELECT * FROM blok2";
            $query = mysqli_query($conn,$sql1);
            if($query){
                while ($row = mysqli_fetch_assoc($query)) {
                $appartment[] = $row['id'];}
                }
            foreach($appartment as $x=>$appnum){
                $sql1="SELECT * FROM blok2 WHERE id=$appnum";
                $query = mysqli_query($conn,$sql1);
                $olddutys = "";
                    if($query){
                         while ($row = mysqli_fetch_assoc($query)) {
                         $olddutys .= $row['olddutys'];}
                             }
                $rest = $olddutys + $sum;
                $sql="UPDATE blok2 SET olddutys = $rest WHERE id=$appnum";
                $query = mysqli_query($conn,$sql);
                if(mysqli_affected_rows($conn) ==1){
                    $alert['success'] = "Успешно добавено задължение за всички aпартаменти";
                }
            }
        }
        else{

        $appnum = mysqli_real_escape_string($conn,$_POST['appnumber']);
        $sum = mysqli_real_escape_string($conn,$_POST['dutysum']);             
        $sql1="SELECT * FROM blok2 WHERE id=$appnum";
        $query = mysqli_query($conn,$sql1);
        $olddutys = "";
            if($query){
                 while ($row = mysqli_fetch_assoc($query)) {
                 $olddutys .= $row['olddutys'];}
                     }
        $rest = $olddutys + $sum;
        $sql="UPDATE blok2 SET olddutys = $rest WHERE id=$appnum";
        $query = mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn) ==1){
            $alert['success'] = "Успешно добавено задължение за aпартамент ".$appnum;
        }
    }
} 

//Добавяне на плащания
    if(isset($_POST['addpayment']) AND $_POST['addpayment']=="Добави плащане"){
                
                $appnum = mysqli_real_escape_string($conn,$_POST['appnumbers']);
                $sum = mysqli_real_escape_string($conn,$_POST['paymentsum']); 
                $month =  mysqli_real_escape_string($conn,$_POST['paymentmonth']);             
                $sql1="SELECT * FROM blok2 WHERE id=$appnum";
                $query = mysqli_query($conn,$sql1);
                $olddutys = 0;
                if($query){
                    while ($row = mysqli_fetch_assoc($query)) {
                        $olddutys .= $row['olddutys'];}
                }
                $rest = $olddutys - $sum;
                $sql="UPDATE blok2 SET olddutys = $rest WHERE id=$appnum";
                $query = mysqli_query($conn,$sql);
                $sql="UPDATE blok2 SET lastpayment = $sum WHERE id=$appnum";
                $query = mysqli_query($conn,$sql);
                $sql="UPDATE blok2 SET month = $month WHERE id=$appnum";
                $query = mysqli_query($conn,$sql);
                if(mysqli_affected_rows($conn) ==1){
                    $alert['success'] = "Успешно добавено плащане за aпартамент ".$appnum;
                }
    }

    //Добавяне на документи
    if(isset($_POST['submit']) AND $_POST['submit']=="Изпращане"){
           

        $isOK = TRUE;
        $upload_dir = "files/blok2/";
        $filename = $_FILES['files']['name'];
        $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
        $tmp_filename = $_FILES['files']['tmp_name'];
        $size = $_FILES['files']['size'];

        if($size>10485760){
            $alert['error'] = "Файлът е прекалено голям. Макс 10 MB!";
            $isOK = FALSE;
        }
        if(getimagesize($tmp_filename)===FALSE){
            $alert['error'] = "Файлът не е изображение";
            $isOK = FALSE;	
        }
        if($isOK){
            if(move_uploaded_file($tmp_filename,$upload_dir.$filename)){
                $alert['info'] = "Файлът е качен успешно!";
            }else{
                $alert['error'] = "Грешка при качването на файла";
                $isOK = FALSE;
            }
        }
        
        
        if($isOK){
            $name = mysqli_real_escape_string($conn,$_POST['filename']);
            $filemonth = mysqli_real_escape_string($conn,$_POST['month']);
            $picture = mysqli_real_escape_string($conn,$filename);
            $duties = mysqli_real_escape_string($conn,$_POST['duties']);
            //добавяне на задължение
            $sql = "INSERT INTO blok2files (month, sum, name, picture) VALUES (\"$filemonth\",\"$duties\",\"$name\",\"$picture\")";
            $query = mysqli_query($conn,$sql);
            if(mysqli_affected_rows($conn) ==1){
                $alert['success'] = "Вашата заявка е приета успешно!";
            }
            //ъпдейт на месечни задължения
            $blokmonthdutys = 0;
            $sql = "SELECT * FROM `blok2files` WHERE month=$filemonth";
            $query = mysqli_query($conn,$sql);
                if($query){
                    while ($row = mysqli_fetch_assoc($query)) {
                        $blokmonthdutys = $blokmonthdutys + $row['sum'];}
                        $sql = "UPDATE blok2view SET monthlyduties = $blokmonthdutys WHERE month=$filemonth";
                         $query = mysqli_query($conn,$sql);
                         

                        }
                //ъпдейт на месечни приходи
            $sumblok1 = 0;
            $sql = "SELECT * FROM `blok2` WHERE month=$filemonth";            
            $query = mysqli_query($conn,$sql);
            if($query){
                while ($row = mysqli_fetch_assoc($query)) {
                $sumblok1 = $sumblok1 + $row['lastpayment'];}           
        
            $sql="UPDATE blok2view SET availability = $sumblok1 WHERE id=$filemonth";
            $query = mysqli_query($conn,$sql);
                //пресмятане на остатък за месеца            
                    $restformonth = $sumblok1 - $blokmonthdutys;
                    $sql="UPDATE blok2view SET restformonth = $restformonth WHERE id=$filemonth";
                    $query = mysqli_query($conn,$sql); }

            
            
    }
}
        


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
                            <h4 style="color:red;"><?php echo $bloknames; ?></h4>
								<ul>
                                <li><a href="#" data-nav-section="contact">Добавяне на задължения</a></li>
                                <li><a href="#" data-nav-section="about">Добавяне на плащания</a></li>
                                <li><a href="#" data-nav-section="practice-areas">Качване на документи</a></li>
									<li class="btn-cta"><a href="admin.php?logout=" class="external"><span>Изход</span></a></li>
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
                                <h1>Добавяне на задължения</h1>
                                <p class="sub" style="color:red; font-size:30px;"><?php echo $bloknames; ?></p>
                                <p class="subtle-text animate-box" data-animate-effect="fadeIn" style="font-size:50px;"><?php echo $bloknames; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 animate-box" style="text-align:center;">
                             <!-- messages -->
                             <?php show_alerts($alert);?>
                                <form method="POST">
                                    <div class="form-group">
                                        <select name="appnumber" class="form-control" required>
                                        <option value="" selected disabled>Изберете апартамент...</option>
                                        <option value="0" >Изберете всички</option>
					                    <?php echo $appnumber;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="dutysum" name="dutysum" class="form-control" placeholder="Въведете сума" required>
                                    </div>
                                    <div class="form-group">
                                    <input type="submit" id="addduty" name="addduty" class="btn btn-primary" value="Добави задължение" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="gtco-about" data-section="about">
                    <div class="container">
                        <div class="row row-pb-md">
                            <div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
                                <h1>Добавяне на плащания</h1>
                                <p class="sub" style="color:red; font-size:30px;"><?php echo $bloknames; ?></p>
                                <p class="subtle-text animate-box" data-animate-effect="fadeIn" style="font-size:50px;"><?php echo $bloknames; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 animate-box" style="text-align:center;">
                                <form method="POST">
                                    <div class="form-group">
                                        <select name="appnumbers" class="form-control" required>
                                        <option value="" selected disabled>Изберете апартамент...</option>
					                    <?php echo $appnumber;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="paymentmonth" id="paymentmonth" class="form-control" required>
                                        <option value="" selected disabled>Изберете месец, в които е направено плащането...</option>
                                        <option value="1">Януари</option>
                                        <option value="2">Февруари</option>
                                        <option value="3">Март</option>
                                        <option value="4">Април</option>
                                        <option value="5">Май</option>
                                        <option value="6">Юни</option>
                                        <option value="7">Юли</option>
                                        <option value="8">Август</option>
                                        <option value="9">Септември</option>
                                        <option value="10">Окромври</option>
                                        <option value="11">Ноември</option>
                                        <option value="12">Декември</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="paymentsum" name="paymentsum" class="form-control" placeholder="Въведете сума" required>
                                    </div>
                                    <div class="form-group">
                                    <input type="submit" id="addpayment" name="addpayment" class="btn btn-primary" value="Добави плащане" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="gtco-practice-areas" data-section="practice-areas">
                    <div class="container">
                        <div class="row row-pb-md">
                            <div class="col-md-8 col-md-offset-2 heading animate-box" data-animate-effect="fadeIn">
                                <h1>Качване на документи</h1>
                                <p class="sub" style="color:red; font-size:30px;"><?php echo $bloknames; ?></p>
                                <p class="subtle-text animate-box" data-animate-effect="fadeIn" style="font-size:50px;"><?php echo $bloknames; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 animate-box" style="text-align:center;">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <select name="month" id="month" class="form-control" required>
                                        <option value="" selected disabled>Изберете месец</option>
                                        <option value="1">Януари</option>
                                        <option value="2">Февруари</option>
                                        <option value="3">Март</option>
                                        <option value="4">Април</option>
                                        <option value="5">Май</option>
                                        <option value="6">Юни</option>
                                        <option value="7">Юли</option>
                                        <option value="8">Август</option>
                                        <option value="9">Септември</option>
                                        <option value="10">Окромври</option>
                                        <option value="11">Ноември</option>
                                        <option value="12">Декември</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="duties" name="duties" class="form-control" placeholder="Добавете задължението от файла" required >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="filename" name="filename" class="form-control" placeholder="Моля въведете име на файла" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" id="files" name="files" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="submit" name="submit" class="btn btn-primary" >
                                    </div>
                                </form>
                            </div>
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
