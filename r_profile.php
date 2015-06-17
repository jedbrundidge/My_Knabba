<?php 
session_start();
include_once("includes/config.php");
// include_once("includes/profileurl.php");

if(!isset($_SESSION['pid']))
{
  if(!isset($_SESSION['FBID'])) // When login from the facebook API, PID is null 
  {
    header('location: getstarted.php');
  }
  else{
    // re-assign from facebook sessions. Not the smartest way but works projects is due next week you know.
    $_SESSION['pid'] = $_SESSION['FBID'];
    $_SESSION['firstname'] = $_SESSION['FNAME'];
    $_SESSION['lastname'] = $_SESSION['LNAME'];

  }
}

if(!isset($_SESSION['FBID']))
{
  $s_pid = $_SESSION['pid'];
  $sqlCommand  = "Select profileurl from kusers_tbl Where PID = '$s_pid'";
  echo $sqlCommand;
  //Images/27_Images/27_76986.jpg

  $result = mysql_query($sqlCommand);
  $row = mysql_fetch_row($result);
  $imgurl = $row[0];
}
else{
  $fbimgurl = $_SESSION['FBID'];
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

    <link href="css/profilepicture.css" rel="stylesheet">

     <!-- <link id="theme-style" rel="stylesheet" href="assets/css/styles.css"> -->
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
                <a class="navbar-brand topnav" href="index.html">Knabba </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" >
                <a class="navbar-text navbar-right" href="logout.php">Logout</a>
                <a class="navbar-text navbar-right" href="#">Settings</a>
                <p class="navbar-text navbar-right">Signed in as <?php echo ucfirst($_SESSION['firstname']). " " . ucfirst($_SESSION['lastname']); ?></p>
                

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

		<div class="signup-section">
		  <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3">
              <div class="thumbnail with-caption">
           
                <?php
                $strength = "30";

                 if(isset($fbimgurl)) : ?>
                     <img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture?width=320&height=380">
                <?php endif; ?>

                <?php if(isset($imgurl)) : 
                $strength = $strength + "20";
                ?>
                  <img src="<?php echo $imgurl ?>" style="height: 210;">
                <?php endif; ?>
                

                  <!-- <img src="<?php echo $imgurl ?>"> -->
                    <!-- <img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture?width=320&height=380"> -->
                  <p><?php echo ucfirst($_SESSION['firstname']). " " . ucfirst($_SESSION['lastname']); ?></p>
              </div>

              <form enctype="multipart/form-data" action='upload.php' method='post'>
<!--               Choose file to upload:
                  <input type="file" name="uploaded_file" />
                  <input type="submit" name="submit" value="submit" /> -->
                  
                   <div class="form-group">

                    <input type="file" name="uploaded_file" id="exampleInputFile">
                    <p class="help-block">You can upload any img extension.</p>
                  </div>
                  <button type="submit" name="submit" value="submit" class="btn btn-default btn-sm" >Submit</button>


              </form>
              <div>
                 <input class="btn btn-primary btn-lg btn-block" type="button" value="Background">
              </div></h4></br>
              <div>
                 <input class="btn btn-primary btn-lg btn-block" type="button" value="Credit Score">
              </div></br>
              <div>
                  <input class="btn btn-primary btn-lg btn-block" type="button" value="Pay Stub">
              </div></br>
                                    
            </div>

            <div class="col-lg-1">
            &nbsp;
            </div>



            <div class="col-lg-8">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">YOUR CURRENT OFFERS</h3>
                  </div>
                  <div class="panel-body bs-step-inner">
                    <div class="section-inner">
                    <!-- <div class="alert alert-warning" role="alert">Strenthen Your Profile<button type="button" class="btn btn-success" aria-expanded="false" name="How?"> </div> -->
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $strength ?>%;">
                        Strength: <?php echo $strength ?>%
                      </div>
                    </div>

                    <div class="alert alert-info" role="alert">Know How To Increase Your Profile Strength...
                      <a href="#" class="alert-link">Click Me</a>
                    </div>
                    <?php
                  $myid = $_SESSION['pid'];
                  $result = mysql_query("SELECT * FROM renting_offers where r_id = '$myid' ORDER BY Property_name desc");
                  $class = "item row";
                  while($row = mysql_fetch_array($result)) {
                    $imgurl = $row['url'];
                        // echo $imgurl; 
                        if(!isset($imgurl) || ($imgurl == null))
                        {
                          $imgurl = "img/home.png";
                        }

                    ?>

                    <div class="content">   
                          <hr class="divider" />
                            <div class="<?php echo $class ?>">
                            <a class="col-md-4 col-sm-4 col-xs-12">
                                <!-- <img class="img-responsive project-image" src="img/home.png" alt="project name" /> -->
                                <img class="img-responsive project-image" src="<?php echo $imgurl; ?>" alt="profile pic n/a">
                                </a>
                              <div class="desc col-md-8 col-sm-8 col-xs-12">
                                    <h3 class="text-left"> <?php echo ucfirst($row['property_name']); ?></h3>
                                    <h3 class="text-left"><small><?php echo ucfirst($row['comments']); ?></small></h3>
                                    <div class="pull-left">
                                      <button type="button" class="btn btn-warning btn-xs">View Offer</button>
                                    </div>
                                </div><!--//desc-->                          
                            </div>
                            <!-- End of class -->
                    </div>
                    <!-- end of content -->
                    <?php
                    if($class=="item row")
                          {
                            $class = "item row content-section-a";
                          }
                          else{
                            $class = "item row";
                          }
                    }
                  ?>
                      
                  </div><!--//section-inner-->                                          
              </div> 
                    <!-- End of panel-body -->
            </div>
            <!-- End of Panel Panel Default -->
            </div>
            <!-- col-lg-8 -->

          

       </div>
       <!-- End of Row -->
     </div>
     <!-- End of Container -->
   </div>
   <!-- End of signup-section -->

</body>
</html>