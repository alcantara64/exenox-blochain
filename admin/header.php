<?php

include 'dbconnect.php';

session_start(); ob_start();

if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){
	$uname=$_SESSION['uname']; 
}else{
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
        <!-- Hammer reload -->
          <script>
            setInterval(function(){
              try {
                if(typeof ws != 'undefined' && ws.readyState == 1){return true;}
                ws = new WebSocket('ws://'+(location.host || 'localhost').split(':')[0]+':35353')
                ws.onopen = function(){ws.onclose = function(){document.location.reload()}}
                ws.onmessage = function(){
                  var links = document.getElementsByTagName('link'); 
                    for (var i = 0; i < links.length;i++) { 
                    var link = links[i]; 
                    if (link.rel === 'stylesheet' && !link.href.match(/typekit/)) { 
                      href = link.href.replace(/((&|\?)hammer=)[^&]+/,''); 
                      link.href = href + (href.indexOf('?')>=0?'&':'?') + 'hammer='+(new Date().valueOf());
                    }
                  }
                }
              }catch(e){}
            }, 1000)
          </script>
        <!-- /Hammer reload -->
      

<link rel='stylesheet' href='assets/css/plugins/fullcalendar.css'>
<link rel='stylesheet' href='assets/css/plugins/datatables/datatables.css'>
<link rel='stylesheet' href='assets/css/plugins/datatables/bootstrap.datatables.css'>
<link rel='stylesheet' href='assets/css/plugins/chosen.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.timepicker.css'>
<link rel='stylesheet' href='assets/css/plugins/daterangepicker-bs3.css'>
<link rel='stylesheet' href='assets/css/plugins/colpick.css'>
<link rel='stylesheet' href='assets/css/plugins/dropzone.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.handsontable.full.css'>
<link rel='stylesheet' href='assets/css/plugins/jscrollpane.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.pnotify.default.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.pnotify.default.icons.css'>
<link rel='stylesheet' href='assets/css/app.css'>

  <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>

  <link href="assets/favicon.ico" rel="shortcut icon">
  <link href="assets/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    @javascript html5shiv respond.min
  <![endif]-->

  <title>Exenox Admin</title>

</head>

<body class="glossed">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42863888-4', 'pinsupreme.com');
  ga('send', 'pageview');

</script>
<div class="all-wrapper fixed-header left-menu">
  <div class="page-header">
  <div class="header-links hidden-xs">
    <div class="top-search-w pull-right">
      <input type="text" class="top-search" placeholder="Search"/>
    </div>
 
   
    <div class="dropdown">
      <a href="#" class="header-link clearfix" data-toggle="dropdown">
        <div class="avatar">
          <img src="assets/images/people.png" alt="">
        </div>
        <div class="user-name-w">
          <?= $uname ?></?> <i class="fa fa-caret-down"></i>
        </div>
      </a>
      <ul class="dropdown-menu dropdown-inbar">
       
        <li><a href="access.php?logout"><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
    </div>
  </div>
  <a class="logo hidden-xs" href="index.html"><i class="fa fa-rocket"></i></a>
   <!--<a class="menu-toggler" href="#"><i class="fa fa-bars"></i></a>-->
  <h1>Dashboard</h1>
</div>
  <div class="side">
 
  <div class="sub-sidebar-wrapper">
  <ul>

    <li class='current'><a class='current' href="dashboard.php">Dashboard</a></li>
    <li class='current'><a class='current' href="stake_withdraw.php">Stake Withdraw</a></li>
  </ul>
</div>
</div>
  <div class="main-content">
      
      
      
      
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
     
    </ol>


<!-- ERROR HANDLING -->
			
			<?php if(isset($_COOKIE['error'])){?>
			 <div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error!</strong> <?php echo $_COOKIE['error']; setcookie("error","",time()-5,"/");?>.
			 </div>
			<?php }?>
			<?php if(isset($_COOKIE['success'])){?>
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> <?php echo $_COOKIE['success']; setcookie("success","",time()-5,"/");?>.
			 </div> 
    		<?php }?>
			
		<!-- END ERROR HANDLING -->
	  
