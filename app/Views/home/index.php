<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title><?= $judul_web ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets2/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets2/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets2/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="<?= base_url() ?>/assets2/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets2/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="<?= base_url() ?>/assets2/images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="<?= base_url('home') ?>">lapordulu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <section class="banner_main">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class="col-md-6">
                    <div class="text-bg">
                        <div class="padding_lert">
                            <span>LaporDulu</span>
                            <p>LaporDulu adalah suatu platform yang berfungsi untuk mengajukan beberapa masalah yang ada didesa</p>
                            <a class="read_more" href="#">Lapor disini</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- features -->
    <div class="Features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Keunggulan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="Our_box">
                        <h4>Dapat mengontrol <br>masalah-masalah <br> yang ada di desa</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="Our_box">
                        <h4>Mempermudah masyarakat <br>untuk melaporkan <br> masalah desa</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Features -->
    <!-- discount -->
    <div class="discount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>LAPORDULU</h2>
                        <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis eveniet ab magni recusandae libero hic cupiditate odio laudantium dolorum, adipisci dolor voluptatum, iste nesciunt quibusdam officia voluptatibus quo, inventore vel.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end discount -->
    <!-- request -->
    <div class="request">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Masalah terselesaikan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </div>
    <!-- end request -->
    <!-- people -->
    <div class="people">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2> Tentang Saya</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide people_Carousel " data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container">
                                    <div class="carousel-caption ">
                                        <div class="row">
                                            <div class="col-md-8 offset-md-2">
                                                <div class="test_box">
                                                    <h4>Saya</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. x ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <div class="row">
                                            <div class="col-md-8 offset-md-2">
                                                <div class="test_box">
                                                    <h4>Duis aute</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. x ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <div class="row">
                                            <div class="col-md-8 offset-md-2">
                                                <div class="test_box">
                                                    <h4>Duis aute</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. x ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end people -->
    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2022 All Rights Reserved. Design by <a href="#"> Saya</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="<?= base_url() ?>/assets2/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets2/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets2/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets2/js/jquery-3.0.0.min.js"></script>
    <script src="<?= base_url() ?>/assets2/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="<?= base_url() ?>/assets2/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url() ?>/assets2/js/custom.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>