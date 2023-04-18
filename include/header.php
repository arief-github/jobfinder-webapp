<?php 
 session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>JobBoard &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="<?php echo APP_URL;?>/images/icons8-job-64.png">
    
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/custom-bs.css">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/fonts/line-icons/style.css">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/quill.snow.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/style.css">    
  </head>
  <body id="top">

 <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.html">JobBoard</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="<?php echo APP_URL;?>" class="nav-link active">Home</a></li>
              <li><a href="<?php echo APP_URL;?>/page/about.php">About</a></li>
              
            
              <li><a href="<?php echo APP_URL;?>/page/contact.php">Contact</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">

              <?php if(isset($_SESSION["username"])):?>
                <div class="d-lg-inline-block">
                  <p class="text-white font-weight-bold"><?php echo $_SESSION["username"]; ?></p>
                  <a href="<?php echo APP_URL; ?>/auth/logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-exit_outline"></span>Log Out</a>     
                </div>
              <?php else:?>
                <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
                <a href="<?php echo APP_URL; ?>/auth/login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
                <a href='<?php echo APP_URL; ?>/auth/register.php' class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Register</a>
              <?php endif;?>

            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>
