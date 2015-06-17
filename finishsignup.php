<?php 
session_start();
include_once("includes/config.php");
// include_once("includes/sessioncreater.php");

if(!isset($_SESSION['pid']))
{
  header('location: getstarted.php');
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Continue Sign Up</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	 <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand topnav" href="#">Knabba </a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" >
                <p class="navbar-text navbar-right">Signed in as <?php echo ucfirst($_SESSION['firstname']). " " . ucfirst($_SESSION['lastname']); ?></p>
                <!-- <div class="row spacer"></div> -->
                   <!--  <li>
                      <img src="img/smallprofileIcon.jpg" width="30px" height="30px" class="img-circle">
                    </li> -->
                     <!-- <div class="row spacer"></div> -->
                    <!-- <li>
                    <?php echo ucfirst($_SESSION['firstname']); ?>
                    </li> -->
                </ul>    
            </div>

           <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  <!--   <div class="signup-section">
		<div class="container">
			<div class="row">
				 <div class="col-md-6 col-md-offset-3"><h1>Hey John!</h1> 
				</div>
			</div>
		</div> -->
    

		<div class="signup-section">
		  <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-offset-2">
              <h1>CONGRATS!</h1>
              <div id="profile">
                <?php if(isset($_SESSION['pid'])){
                ?>
                 <a href='logout.php' id='logout'>Logout</a>
                <?php }else {?> 
                 <a id="login_a" href="#">login</a>
                <?php } ?>
                <div id="sessi">
                <?php echo "The sesson name is" . $_SESSION['firstname']; ?>
                </div>
               </div>
                <form method="get" id="signup_form" class="new_client" action="" accept-charset="UTF-8">
                  <fieldset>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">You're now visible to hundreds of Landlords!</h3>
                        </div>
                        <div class="panel-body bs-step-inner">
                             <!-- Begin col-md-6 -->
                             <div class="row spacer"></div>
                                <div class="col-md-4">
                                   <a href=#><img src=img/strong.png></a>
                                   <div class="row spacer"></div>
                                   <div class="alert alert-info" role="alert">Strength Profile</div>
                                </div>
                                <div class="col-md-4">
	                                <img src="img/or.png" />
                								</div>
                								<div class="col-md-4">
                									<a href="r_profile.php"><img src="img/profile.png"></a>
                									 <div class="row spacer"></div>
                									<div class="alert alert-info" role="alert">Continue Profile</div>
                            	</div>

                                <div class="col-md-12">
                                    <div class="row spacer"></div>
                                  </div>

                            
                              </div> 
                              <!-- End of Form-group -->
  	                    </div>
                        <!-- End of panel-body -->
                      </div>
                      <!-- End of Panel Panel Default -->
                </fieldset>
              </form>
            </div>
         </div>
         <!-- End of Row -->
       </div>
       <!-- End of Container -->



</body>
</html>