<!DOCTYPE html>
<html lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Knabba - Renting Reimagined</title>

       <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script>
    function ajaxPost(){
         event.preventDefault();
         var email = $('#email').val();
         var password = $('#password').val();
         var dataString = 'email=' + email  + '&password=' +password;
          // $("#flash").show();
          // $("#flash").fadeIn(400).html('<img src="img/loading.gif" />');
          $.ajax({
          type: "POST",
          url: "processed.php",
          data: dataString,
          cache: false,
          //alert(data);
          success: function(result){
               var result=trim(result);
                   // $("#flash").hide();
            // alert(result);

               if(result=='renter'){
                     // window.location='index.html';
                     //$('#mymodal').modal('close');
                     window.location = 'http://localhost:81/xampp/phpMySql/Knabba/home/finishsignup.php';
               }else if(result=='landlord')
                {
                  window.location = 'http://localhost:81/xampp/phpMySql/Knabba/home/l_profile.php';

                }else{
                $("#flash").show();
                $("#flash").html(result);
                     // $("#errorMessage").html(result);
                  }
               }
          });
    }

function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
    }

    </script>

    

    <!--  <script type="text/javascript">
      $(document).ready(function(){
        $(".btn").click(function(){
          $("#myModal").modal('show');
        });
      });
</script> -->

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>
	<body>


    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">Knabba </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


	<a name="about"></a>
    
	<div class="getstarted-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                 <div class="center-block">
                     <img src="img/logo.jpg" alt="logo image">
                  <h2>Sign up with Knabba</h2>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of getstarted -->
	<div class="container">
		<div class="row">
	      <div class="col-md-6">
	        <div class="panel panel-default">
	          <div class="panel-heading"><h4>Dear Renters.</h4></div>
	          <div class="panel-body">
                <div class="page-header">
                    <h2>I want to rent a home!</h2>
                  </div>
                  <h2><small>Let High Quality Properties find you!</small></h2>
              <div class="row spacer"></div>
              <div class="row spacer"></div>

	              <a href="signup.php" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-inbox"></span> Sign Up</a>
              </div>

	        </div>
	      </div>
	      <div class="col-md-6">
              <div class="panel panel-default">
	              <div class="panel-heading"><h4>Dear Landlords.</h4></div>
	              <div class="panel-body">
                 <div class="page-header">
                    <h2>I Own/Manage a property!</h2>
                  </div>
                  <h2><small>Find the highest quality renters available!</small></h2>

                  <div class="row spacer"></div>
                  <div class="row spacer"></div>
                  <a href="isignup.php" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-inbox"></span> Sign Up</a>
	              </div>
	            </div>
	      </div>
        </div>
    </div>
    <!-- End of container -->
    <div class="container">
        <p class="text-success">Connect Using your favorite social network site. Already have an account with us<a href="#myModal" data-toggle="modal"> Log In</p></a>
        <!-- <p class="text-muted">Or connect with your favorite social network site</p> -->
            <form class="col-md-12">
                <div class="row text-center">
                    <div class="col-md-3 col-sm-12">
                      <a href="includes/fbconfig.php"><img src="img/social/facebook.png"></a> 
                         <!-- <a href="includes/fbconfig.php" class="btn btn-primary btn-block" role="button">Facebook</a> -->
                        <!-- <button type="button" class="btn btn-primary btn-block" >Facebook</button> -->
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <a href="includes/fbconfig.php"><img src="img/social/github.png"></a> 
                        <!-- <button type="button" class="btn btn-info btn-block">Twitter</button> -->
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <a href="includes/fbconfig.php"><img src="img/social/twitter.png"></a> 
                        <!-- <button type="button" class="btn btn-danger btn-block">Google+</button> -->
                    </div>
                    <div class="col-md-3 col-sm-12">
                    <a href="includes/fbconfig.php"><img src="img/social/google.png"></a> 
                        <!-- <button type="button" class="btn btn-danger btn-block">Google+</button> -->
                    </div>
                </div>
            </form>
    </div>
 <!-- End of container  -->

    <div class="container">
        <form class="form-signin" method="post" >
            <div class="row">
                <div class="col-md-12">
                     <div class="bs-example">
                    <!-- <h6 class="text-muted">Already Have An Account?<a href="#myModal" data-toggle="modal"> Log In</a></h6> -->
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Log In To Your Account!</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <input type="email" size="30" placeholder="Enter your email address" id="email" name="email" data-popover-offset="0,15" class="form-control" required>
                                              </div>  
                                            </div>
                                            <!-- end of form group -->

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                    <input type="password" size="30" placeholder="Enter your password" id="password" name="password" data-popover-offset="0,15" class="form-control">
                                               </div> <!-- /.input-group -->
                                            </div> <!-- /.form-group -->
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Remember me
                                                </label>
                                            </div> <!-- /.checkbox -->
                                             <div class="text-danger" font-size=55 id="flash"></div> 
                                             <!-- Flash Error -->
                                        </form>
                                    </div> <!-- /.modal-body -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" onclick="ajaxPost()" class="btn btn-primary">Get In</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of col-md-12 -->
            </div>
        </form>
        <!-- End of Form -->
    </div>
    <!-- End of container -->

    <div class="spacer"></div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="img/KnabbaMain BlackBlue.png" class="img-rounded" width="30%" height="30%">
                    <p class="copyright text-muted small">Copyright &copy; Knabba 2015. All Rights Reserved</p>
                    <p class="text-muted small">Terms of Use | Privacy Policy</p>
                </div>
                <div class="col-lg-3">
                    <ul class="list-inline">
                        <li>
                        <h4>Renter</h4>
                            <p class="text-muted small">How it works</p>
                            <p class="text-muted small">Safety</p>   
                            <p class="text-muted small">Location</p>   
                            <p class="text-muted small">Download App</p>   
                        </li>
                    </ul>
                </div>
                <!-- End of div col -->
                <div class="col-lg-3">
                    <ul class="list-inline">
                        <li>
                        <h4>Landlord</h4>
                            <p class="text-muted small">How it works</p>
                            <p class="text-muted small">Sign Up</p>   
                            <p class="text-muted small">Pro Center</p>   
                            <p class="text-muted small">Testimonials</p>   
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <ul class="list-inline">
                        <li>
                        <h4>Contact</h4>
                        <p class="text-muted small">Email Us</p>
                        <p class="text-muted small">Call (1-800-11-2222)</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
	</body>
</html>