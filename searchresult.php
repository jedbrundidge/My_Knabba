<?php 
session_start();
include_once("includes/config.php");
// include_once("includes/profileurl.php");

if(!isset($_SESSION['pid']))
{
    header('location: getstarted.php');
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

   <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <link href="css/profilepicture.css" rel="stylesheet">
     <script>
    function ajaxPost(){
         event.preventDefault();
         var email = $('#email').val();
         var message = $('#message').val();
         var dataString = 'email=' + email  + '&message=' +message;
          // $("#flash").show();
          // $("#flash").fadeIn(400).html('<img src="img/loading.gif" />');
          $.ajax({
          type: "POST",
          url: "offers.php",
          data: dataString,
          cache: false,
          //alert(data);
          success: function(result){
               var result=trim(result);
                   // $("#flash").hide();
            // alert(result);

               if(result=='correct'){
                $("#flash").html(result);
               //$('#mymodal').modal('close');
                     //window.location = 'http://localhost:81/xampp/phpMySql/Knabba/home/finishsignup.php';
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
    
</head>
<body>
<link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

<div class="container">

  <div class="header">
    <h3 class="text-muted prj-name">
        <span class="fa fa-users fa-2x principal-title"></span>
        Renters Around You!
    </h3>
  </div>
  <?php 
  if(!empty($_GET["citySearch"])){
  $city =$_GET['citySearch'];
  $result = mysql_query("SELECT * FROM kusers_tbl where city like '%$city%' and usertype = 'Renter' limit 5");
}
?>

  <!-- <div class="jumbotron list-content"> -->
   <div class="col-md-12 ">
    <ul class="list-group">
      <li href="#" class="list-group-item title">
        Users  In <?php echo ucwords($city) ?>!
      </li>
      <?php
        while($row = mysql_fetch_array($result))
        {
          ?>

      <li href="#" class="list-group-item text-left">
        <!-- <img class="img-thumbnail" src="http://bootdey.com/img/Content/User_for_snippets.png"> -->
        <?php 
        $imgurl = $row['profileurl'];
        if(!isset($imgurl))
        {
          $imgurl = "http://bootdey.com/img/Content/User_for_snippets.png";
        }
        ?>
        <img class="img-thumbnail" src="<?php echo $imgurl;  ?>">
        <label class="name">
            <?php echo ucfirst($row['firstName'])." ".ucfirst($row['lastName']); ?><br>
            <?php echo ucfirst($row['email']); ?>


            <br>
        </label>
        <label class="pull-right">
            <a  class="btn btn-success btn-xs glyphicon glyphicon-phone" href="#" title="Send Text"></a>
            <!-- <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Delete"></a> -->
            <a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment" data-toggle="modal" href="#form-content" title="Send message"></a>
            
             
        </label>
        <div class="break"></div>
      </li>
      <?php
      }
      ?>
      
      <li href="#" class="list-group-item text-left">
        <a class="btn btn-block btn-primary">
            <i class="glyphicon glyphicon-refresh"></i>
            Load more...
        </a>
      </li>

    </ul>
  </div>
  </div>

  <div class="container">
        <form class="sendmessage" method="post" >
            <div class="row">
                <div class="col-md-12">
                     <div class="bs-example">
                    <h6 class="text-muted">If You want to send an offer<a href="#myModal" data-toggle="modal"> Click ME!</a></h6>
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Send An Offer!</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form">
                                          <div class="form-group">
                                              <div class="input-group">
                                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                  <input type="email" size="30" placeholder="Enter your email address" id="email" name="email" data-popover-offset="0,15" class="form-control" required>
                                          </div>  
                                          </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                    <textarea class="form-control" id="message" rows="3"></textarea>
                                              </div>  
                                            </div>
                                            <!-- end of form group -->
                                            <p class="help-block">Sending an offer will cost you 5 knabba credits.</p>
                                             <div class="text-danger" font-size=55 id="flash"></div> 
                                             <!-- Flash Error -->
                                        </form>
                                    </div> <!-- /.modal-body -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" onclick="ajaxPost()" class="btn btn-primary">Send Offer</button>
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
</body>
</html>


