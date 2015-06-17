<?php 
session_start();
include_once("includes/config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Page</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


	 <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <link href="css/profilepicture.css" rel="stylesheet">
    
    <script type="text/javascript">
    //jquery button
      $(function() {
        $("#jquerybtn").click(function(){
            //alert('clicked!');$
            var search = $('#nameSearch2').val();
            $.get ( 'searchresult.php?citySearch='+search, function (data) {
              $("#resultshere").html(data)
            })
          });
      });
    </script>

</head>
<body>
 <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand topnav" href="index.html">Knabba </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" >
                <a class="navbar-text navbar-right" href="logout.php">Logout</a>                
                <a class="navbar-text navbar-right" href="#">Settings</a>
                <p class="navbar-text navbar-right">Signed in as <?php echo ucfirst($_SESSION['firstname']); ?></p> 
                <!-- $_SESSION['firstName'] here is the property name. At least that's how the database is structured. -->

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="signup-section">
      <div class="row" >
        <form id="form1" name="form1" action="searchresult.php" method="get" >
            <div class="col-md-5 col-md-offset-4" style="padding-bottom: 30px;">
              <div class="input-group ">
                <input type="text" class="form-control" id="nameSearch2" placeholder="Search by city...">
                <span class="input-group-btn">
                  <button class="btn btn-default" id="jquerybtn" type="button">
                  <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </form>
        <div class="col-md-5 col-md-offset-4" style="padding-bottom: 30px;">
          <div id="resultshere"></div>
        </div>
      </div><!-- /.row -->
    </div>
    <!-- End of signup section -->

</body>
</html>