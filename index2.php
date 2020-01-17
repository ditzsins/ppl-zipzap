<!DOCTYPE html>
<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username']))
{ // Jika tidak ada session username berarti dia belum login
    header("location: index.html"); // Kita Redirect ke halaman index.php karena belum login
}

    include ("config.php");
    // $sql = mysqli_query($koneksi, "SELECT id FROM testimoni ORDER BY id DESC LIMIT 1");
    // $uData = mysqli_fetch_assoc($sql);
    
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $jenis_sepatu_dan_treatment = $_POST['jenis_sepatu_dan_treatment'];      
        $text_testimoni = $_POST['text_testimoni'];
        $foto = $_POST['foto'];        
        $ratedIndex = $_POST['rateIndex'];
        $mysqli = "INSERT INTO testimoni (email, jenis_sepatu_dan_treatment, text_testimoni, foto, rateIndex) VALUES ('$email', '$jenis_sepatu_dan_treatment', '$text_testimoni', '$foto', '$ratedIndex')";    	
        mysqli_query($koneksi,$mysqli);
    }

?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>ZipZap Shoe Laundry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.theme.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/headereffects/css/component.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/headereffects/css/normalize.css" />
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css"
        media="screen" />
    <!-- RATING -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/magic_space.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" />
    <!-- END CSS TEMPLATE -->
    <script type="text/javascript" src="assets/plugins/jquery-1.8.3.min.js"></script>
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="assets/plugins/slider-plugin/js/slider1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/slider-plugin/js/slider2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/plugins/slider-plugin/css/settings.css"
        media="screen" />
</head>
<!-- END HEAD -->
<body>
    <div class="main-wrapper">
        <header id="ha-header" class="ha-header ha-header-hide ">
            <div class="ha-header-perspective">
                <div class="ha-header-front navbar navbar-default">
                    <div class="compressed">
                        <div class="navbar-header">
                            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle"
                                type="button">
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span>
                                    class="icon-bar"></span><span class="icon-bar"></span>
                            </button>
                            <a href="#" class="navbar-brand compressed">
                                <img src="assets/img/zipzap.jpg" alt="" data-src="assets/img/zipzap.jpg"
                                    data-src-retina="assets/img/zipzap2x.jpg" width="120" height="60" /></a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="index.html">Home</a></li>                                                             
                                <li><a href="order.php">Order</a></li>
                                <li><a href="profile.php">My Profile</a></li>
                                <li><a href="contact2.php">About Us</a></li>
                                <li><a href="logout.php">Logout</a></li>                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>
        <div class="section ha-waypoint" data-animate-down="ha-header-hide" data-animate-up="ha-header-hide">
            <div role="navigation" class="navbar navbar-transparent navbar-top">
                <div class="container">
                    <div class="compressed">
                        <div class="navbar-header">
                            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle"
                                type="button">
                                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                    class="icon-bar"></span><span class="icon-bar"></span>
                            </button>
                            <a href="#" class="navbar-brand">
                                <img src="assets/img/zipzap.jpg" data-src="assets/img/zipzap.jpg" data-src-retina="assets/img/zipzap_2x.jpg"
                                    width="120" height="60" alt="" /></a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="index.html">Home</a></li>                                
                                <li><a href="order.php">Order</a></li>
                                <li><a href="profile.php">My Profile</a></li>
                                <li><a href="contact2.php">About Us</a></li>
                                <li><a href="logout.php">Logout</a></li>                                
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!--BEGIN SLIDER -->
            <div class="tp-banner-container">
                <div class="tp-banner" id="home">
                    <ul>
                        <!-- SLIDE  -->
                        <li data-transition="fade" data-slotamount="5" data-masterspeed="700">
                            <!-- MAIN IMAGE -->
                            <img src="assets/img/bg/gambar1.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center"
                                data-bgrepeat="no-repeat">
                            <!-- LAYERS -->
                            <div class="tp-caption mediumlarge_light_white_center sft tp-resizeme slider" data-x="center"
                                data-hoffset="0" data-y="80" data-speed="500" data-start="800" data-easing="Power4.easeOut"
                                data-endspeed="300" data-endeasing="Power1.easeIn" data-captionhidden="off" style="z-index: 6">
                                <h2 class="text-white custom-font title">
                                    <br>
                                    Selamat Datang
                                    <br/>
                                    <?php echo $_SESSION['nama_lengkap']; ?>
                                    </h2>
                            </div>
                        </li>
                        <li data-transition="fade" data-slotamount="5" data-masterspeed="700">
                            <!-- MAIN IMAGE -->
                            <img src="assets/img/bg/gambar2.jpg" alt="slidebg2" data-bgfit="cover" data-bgposition="center center"
                                data-bgrepeat="no-repeat">
                            <!-- LAYERS -->
                            <div class="tp-caption mediumlarge_light_white_center sft tp-resizeme slider" data-x="center"
                                data-hoffset="0" data-y="120" data-speed="500" data-start="800" data-easing="Power4.easeOut"
                                data-endspeed="300" data-endeasing="Power1.easeIn" data-captionhidden="off" style="z-index: 6">
                                <h2 class="text-white custom-font title ">
                                    Ingin Info Lebih Lanjut<br>
                                    Klik Dibawah Ini!</h2>
                            </div>
                            <div class="tp-caption sfb slider tp-resizeme slider" data-x="center" data-hoffset="0"
                                data-y="300" data-speed="800" data-start="1000" data-easing="Power4.easeOut"
                                data-endspeed="300" data-endeasing="Power1.easeIn" data-captionhidden="off" style="z-index: 6">
                                <a href= "contact.html" class="btn btn-info btn-lg  btn-large m-r-10">Info Lengkap Kami</a>
                            </div>
                        </li>
                        <!-- SLIDE  -->
                        <li data-transition="fade" data-slotamount="5" data-masterspeed="700">
                            <!-- MAIN IMAGE -->
                            <img src="assets/img/bg/gambar3.jpg" alt="slidebg2" data-bgfit="cover" data-bgposition="center center"
                                data-bgrepeat="no-repeat">
                            <!-- LAYERS -->
                            <div class="tp-caption mediumlarge_light_white_center sft tp-resizeme slider" data-x="center"
                                data-hoffset="0" data-y="120" data-speed="500" data-start="800" data-easing="Power4.easeOut"
                                data-endspeed="300" data-endeasing="Power1.easeIn" data-captionhidden="off" style="z-index: 6">
                                <h2 class="text-white custom-font title ">
                                    Macam-Macam Treatment<br>
                                    Yang Kami Pakai</h2>
                            </div>
                            <div class="tp-caption sfb slider tp-resizeme slider" data-x="center" data-hoffset="0"
                                data-y="300" data-speed="800" data-start="1000" data-easing="Power4.easeOut"
                                data-endspeed="300" data-endeasing="Power1.easeIn" data-captionhidden="off" style="z-index: 6">
                                <a href="treatment.html" class="btn btn-info btn-lg  btn-large m-r-10">Klik Disini!</a>
                            </div>
                        </li>
                    </ul>
                    <div class="tp-bannertimer">
                    </div>
                </div>
            </div>
            <!--END SLIDER-->
        </div>
        <div class="section blue">
            <div class="container">
                <div class="p-t-40 p-b-40  text-center">
                    <h1 class="text-center" style="color: #FFFFFF">
                        Kenapa Harus Cuci Di ZipZap?</h2>                    
                </div>
            </div>
        </div>
        <div class="section white ha-waypoint" data-animate-down="ha-header-color" data-animate-up="ha-header-hide">
            <div class="container" >
                <div class="p-t-40 p-b-40  text-center">
                    <div class="row">
                        <div class="col-md-100 feature-list ">
                            <div class="col-md-4" data-ride="animated" data-animation="fadeIn" data-delay="300">
                                <img src="assets/img/term.png" width="60" height="60" alt="">
                                <h4 class="title">
                                    MINIMUM 4 SEPATU YANG HARUS DICUCI</h4>
                                <p><font face="garamond" size="3">
                                    Anda dapat mencuci sepatu kesayangan anda diini, dengan syarat mencuci dengan jumlah minimal 4 sepatu. Dan bisa langsung di antar-jemput dengan GRATIS (berlaku hanya di wilayah JABODETABEK).</font>
                                </p>
                            </div>                            
                            <div class="col-md-4" data-ride="animated" data-animation="fadeIn" data-delay="300">
                                <img src="assets/img/free.png" width="60" height="60" alt="">
                                <h4 class="title">
                                    FREE DELIVERY</h4>
                                <p><font face="garamond" size="3">
                                    Anda akan mendapatkan free dalam antar jemput sepatu hanya berlaku di wilayah JABODETABEK saja.</font>
                                </p>
                            </div>
                            <div class="col-md-4" data-ride="animated" data-animation="fadeIn" data-delay="300">
                                <img src="assets/img/time.png" width="60" height="60" alt="">
                                <h4 class="title">
                                    HEMAT WAKTU</h4>
                                <p><font face="garamond" size="3">
                                    Anda tidak perlu menyerahkan sepatu kotor anda dengan datang ke store kami. Cukup pesan antar-jemput online ini kapan pun dan dimana pun.</font>
                                </p>
                            </div>                            
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-24 feature-list">
                            <div class="col-md-4" data-ride="animated" data-animation="fadeIn" data-delay="600">
                                <img src="assets/img/shoes.png" width="60" height="60" alt="">
                                <h4 class="title">
                                    BERSIH DAN WANGI</h4>
                                <p><font face="garamond" size="3">
                                    Kami memberikan hasil yang maksimal dengan kebersihan dan dilengkapi dengan parfum pada sepatu kesayangan anda dengan pilihan layanan yang bisa anda pilih sesuai keinginan. Dan buktikan hasilnya.</font>
                                </p>
                            </div>
                            <div class="col-md-4" data-ride="animated" data-animation="fadeIn" data-delay="1200">
                                <img src="assets/img/brush.png" width="60" height="60" alt="">
                                <h4 class="title">
                                    DICUCI DENGAN AHLINYA</h4>
                                <p><font face="garamond" size="3">
                                    Tim kami sangat berpengalaman dalam menangani segala jenis sepatu. Percayakanlah sepatu anda dengan tangan tim cuci sepatu handal kami.</font>
                                </p>
                            </div>
                            <div class="col-md-4" data-ride="animated" data-animation="fadeIn" data-delay="1500">
                                <img src="assets/img/target.png" width="60" height="60" alt="">
                                <h4 class="title">
                                    HARGA TERJANGKAU</h4>
                                <p><font face="garamond" size="3">
                                    Dengan kualitas tinggi, layanan kami memberikan tarif yang pas dengan kantong anda. Dan banyaknya harga spesial di ZipZap ini. Sepatu anda bersih, harga pas dikantong.</font>
                                </p>
                            </div>                            
                            <div class="clearfix">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        <div class="section grey">
            <div class="container">
                <div class="p-b-10">
                    <div class="row p-t-30">
                        <div class="text-center" class="col-md-30 col-sm-30">
                        <form method="POST">
                            <h3 class="normal m-b-10">Silahkan Upload Hasil Pencucian Dari Kami</h3>
                            <h5 class="normal m-b-10">Testimoni kamu akan tertampil seperti dibawah ini, kami tunggu ya! Dan jangan lupa diakhir testimoni berikan #ZipZapCleaning</h5>                                                             
                            <input type="hidden" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">         
                            <div class="text-center">
                                <div class="col-md-6">
                                    <input type="text" name="jenis_sepatu_dan_treatment" class="form-control" placeholder="Jenis sepatu kamu - Treatment yang kamu pakai">
                                </div>
                            </div>
                            <div class="row form-row">                            
                                <div class="col-md-6"> 
                                    <input type="file" name="foto" class="form-control">
                                </div>                            
                            </div>                            
                            <div class="text-center">
                                <div class="col-md-6">
                                    <textarea type="text" name="text_testimoni" class="form-control" placeholder="Tulis Testimoni Kamu" rows="8"></textarea>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-md-6">
                                	<input type="hidden" name="rateIndex" class="form-control">                                	
                                    <h4 class="normal m-b-10">Berikan Rating</h4>                                    
	                            	<i class="fa fa-star fa-2x" data-index="0"></i>
	                            	<i class="fa fa-star fa-2x" data-index="1"></i>
	                            	<i class="fa fa-star fa-2x" data-index="2"></i>
	                            	<i class="fa fa-star fa-2x" data-index="3"></i>
	                            	<i class="fa fa-star fa-2x" data-index="4"></i>                           	
		                            	<script>
		                            		var ratedIndex = -1, uID = 0;
		                            		$(document).ready(function () {
		                            			resetStarColors();

		                            			if (localStorage.getItem('ratedIndex') != null) {
		                            				setStars(parseInt(localStorage.getItem('ratedIndex')));
		                            				uID = localStorage.getItem('uID');
		                            			}

		                            			$('.fa-star').on('click', function () {
		                            				ratedIndex = parseInt($(this).data('index'));
		                            				localStorage.setItem('ratedIndex', ratedIndex);
		                            				// saveToTheDB();
		                            			});

		                            			$('.fa-star').mouseover(function () {
		                            				resetStarColors();
		                            				var currentIndex = parseInt($(this).data('index'));
		                            				setStars(currentIndex);
		                            			});

		                            			$('.fa-star').mouseleave(function () {
		                            				resetStarColors();

		                            				if (ratedIndex != -1)
		                            					setStars(ratedIndex);
		                            			});
		                            		});
		                            		
		                            		// function saveToTheDB(){
		                            		// 	$.ajax({
		                            		// 		url: "submit",
		                            		// 		method: "POST",
		                            		// 		dataType: "json",
		                            		// 		data: {
		                            		// 			submit: 1,
		                            		// 			uID: uID,
		                            		// 			ratedIndex:ratedIndex
		                            		// 		}, success: function (r) {
		                            		// 			uID = r.uid;
		                            		// 		}
		                            		// 	});
		                            		// }

		                            		function setStars(max){
		                            			for (var i=0; i <= max; i++)
		                            				$('.fa-star:eq('+i+')').css('color', 'green');
		                            		}

		                            		function resetStarColors() {
		                            			$('.fa-star').css('color', 'grey');
		                            		}
		                            	</script>
	                            </div>
                            </div>
                            <br>
                            <div class="row form-row">
                                <div class="text-center" class="col-md-10">
                                    <button type="submit" name="submit">Kirim</button>                                    
                                </div>                                
                            </div>
                        </form>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>        
        <div class="section white">
            <div class="container">
                <div class="p-t-10 p-b-30">
                    <h1 class="normal text-center">Testimoni</h1>
                    <div id="testomonials" class="owl-carousel row">
                        <div class="item">
                            <div class="col-md-6  col-md-offset-3 text-center">
                                <img src="assets/img/testimoni/testimoni1.png" alt="testimonal">                                
                                <div class="testimonial-user">
                                    <span>triaand_</span>
                                </div>
                                <h4 class="normal text-center">
                                    Vans Old School - Premium Treatment.<br> Terimakasih ya! Super bersih mendetail dan wanginya enaaakk~<br>Yuk yang sepatunya masih kotor tapi belum dibersihkan, bisa langsung order disini dan dapatkan harga spesial dan buktikan hasilnya. #ZipZapCleaning
                                </h4>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-6  col-md-offset-3 text-center">
                                <img src="assets/img/testimoni/testimoni2.png" alt="testimonal">                                
                                <div class="testimonial-user">
                                    <span>Kevin Tria</span>
                                </div>
                                <h4 class="normal text-center">
                                    Vans Splitfire Slip On - Premium Treatment<br> Langsung seperti baru sepatu gue abis cuci di ZipZap. Terimakasih banyak! Langsung cuci sepatu kotor lo disini. #ZipZapCleaning
                                </h4>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-6  col-md-offset-3 text-center">
                                <img src="assets/img/testimoni/testimoni3.png" alt="testimonal">                                
                                <div class="testimonial-user">
                                    <span>Yuayprem</span>
                                </div>
                                <h4 class="normal text-center">
                                    Adidas Superstar - White Treatment<br>Sepatu putih pun langsung sebersih ini. Engga ngerti lagi sebagus ini nyucinya. Engga takut lagi buat keluar rumah dengan sepatu putih karena sudah bersih dan wangi. Terimakasih ZipZap! #ZipZapCleaning
                                </h4>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="section grey footer">
            <div class="container">
                <div class="p-t-30 p-b-50">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12 xs-m-b-20">                            
                            <br />
                            © ZipZap Shoe Laundry.
                            <br />
                            All Rights Reserved.
                        </div>
                        <div class="col-md-4 col-lg-3 col-sm-4  col-xs-12 xs-m-b-20">
                            <address class="xs-no-padding  col-md-6 col-lg-6 col-sm-6  col-xs-12">
                                Jl. Lebak Bulus 1 No.12,<br>
                                Jakarta Selatan,<br>
                                Indonesia 12430.
                            </address>
                            <div class="xs-no-padding col-md-6 col-lg-6 col-sm-6">
                                <div>
                                    +62 813-1458-4964<br> +62 878-8361-9733</div>
                                <a href="javascript:">id.zipzap@gmail.com</a>
                            </div>
                            <div class="clearfix">
                            </div>
                        </div>                        
                        <div class="col-md-2 col-lg-2 col-sm-2  col-xs-12 ">
                            <div class="bold">
                                FOLLOW US</div>
                            <br />
                            <a href="https://www.instagram.com/id.zipzap"><i class="fa fa-instagram fa-2x"></i></a>&nbsp; <a href="https://www.twitter.com/id_zipzap"><i class="fa fa-twitter fa-2x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <script src="assets/plugins/waypoints.min.js"></script>
    <script type="text/javascript" src="assets/plugins/parrallax/js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-appear/jquery.appear.js"></script>
    <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/js/core.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</body>
</html>
