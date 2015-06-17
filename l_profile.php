<?php 
session_start();
include_once("includes/config.php");
// include_once("includes/profileurl.php");

if(!isset($_SESSION['pid']))
{
    header('location: getstarted.php');
}
else{

  $s_pid = $_SESSION['pid'];
  $sqlCommand  = "Select profileurl from kusers_tbl Where PID = '$s_pid'";
  //echo $sqlCommand;
  //Images/27_Images/27_76986.jpg

  $result = mysql_query($sqlCommand);
  $row = mysql_fetch_row($result);
  $imgurl = $row[0];

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>

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
            $.get ( 'searchresult.php?nameSearch='+search, function (data) {
              $("#resultshere").html(data)
            })
          });
      });
    </script>

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
                <a class="navbar-text navbar-right" href="searchpage.php">Search Renters</a>
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
            <div class="col-md-6 col-md-offset-3" style="padding-bottom: 30px;">
              <div class="input-group ">
                <!-- <input type="text" class="form-control" id="nameSearch2" placeholder="Search by city...">
                <span class="input-group-btn">
                  <button class="btn btn-default" id="jquerybtn" type="button">
                  <span class="glyphicon glyphicon-search"></span> -->
                  </button>
                </span>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </form>
        <div id="resultshere"></div>
      </div><!-- /.row -->

		  <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3">
              <div class="thumbnail with-caption">
           
                <?php if(isset($fbimgurl)) : ?>
                     <img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture?width=320&height=380">
                <?php endif; ?>

                <?php if(isset($imgurl)) : ?>
                  <img src="<?php echo $imgurl ?>" style="height: 210;">
                <?php endif; ?>
                

                  
                    <!-- <img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture?width=320&height=380"> -->
                  <p><?php echo ucfirst($_SESSION['firstname']). " " . ucfirst($_SESSION['lastname']); ?></p>
              </div>

<!--               <div class="row spacer"></div> -->


              <form enctype="multipart/form-data" action='upload_l.php' method='post'>
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
              <div class="row spacer"></div>
              <form action="gallery.php">
                 <input class="btn btn-primary btn-lg btn-block" type="submit" value="View Gallery">
               </form>

               <div class="row spacer"></div> 

               <a href="msearch.php" target="_blank" class="btn btn-primary btn-lg btn-block" role="button">Search Using Maps</a>

               
               <!-- <form action="gallery.php">
                <input type="submit" value="Click Me">
                <!-- <h2><?php echo $_SESSION['pid']; ?></h2> 
              </form> -->
              </div></h4></br>
              <!-- <div>
                 <input class="btn btn-primary btn-lg btn-block" type="button" value="Credit Score">
              </div></br>
              <div>
                  <input class="btn btn-primary btn-lg btn-block" type="button" value="Pay Stub">
              </div> --></br>
                                    
            </div>

            <div class="col-lg-1">
            &nbsp;
            </div>

                  <div class="col-lg-8">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Offers You Sent!</h3>
                  </div>
                  <div class="panel-body bs-step-inner">
                    <div class="section-inner">
                    <!-- <div class="alert alert-warning" role="alert">Strenthen Your Profile<button type="button" class="btn btn-success" aria-expanded="false" name="How?"> </div> -->
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $strength ?>%;">
                        
                      </div>
                    </div>

                    <div class="alert alert-info" role="alert">Learn How Knabba Credit works And Manage...
                      <a href="#" class="alert-link">Click Me</a>
                    </div>
                    <?php
                  $myid = $_SESSION['pid'];
                  $result = mysql_query("SELECT k.firstName, k.lastName, k.email, k.city, k.profileurl FROM kusers_tbl k where k.PID in (select r_id from renting_offers where i_id = '$myid')");
                  $class = "item row";
                  while($row = mysql_fetch_array($result)) {
                    $imgurl = $row['profileurl'];
                        // echo $imgurl; 
                        if(!isset($imgurl) || ($imgurl == null))
                        {
                          $imgurl = "http://bootdey.com/img/Content/User_for_snippets.png";
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
                                    <h3 class="text-left"> <?php echo ucfirst($row['firstName'])." ".ucfirst($row['lastName']); ?></h3>
                                    <h3 class="text-left">
                                      <small><?php echo ucfirst($row['email']); ?></small> <br>
                                      <small><?php echo ucfirst($row['city']); ?></small>
                                      <small><?php echo ucfirst($row['profileurl']); ?></small>
                                    </h3>
                                    <div class="pull-left">
                                    <button type="button" align="left" class="btn btn-warning btn-xs">Pending...</button>
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