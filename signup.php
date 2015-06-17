<!DOCTYPE html>
<html>
<head>
  <title>Sign Up form</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Knabba - Renting Reimagined</title>

     <script src="https://code.jquery.com/jquery-2.1.3.js"></script>
   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/css/bootstrap-datepicker.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.js"></script>


   <script src="js/bootstrap-datepicker.js"></script>

   <script src="js/bootstrap-datepicker.min.js"></script>k

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<script>
$(function(){

  var formvalues = {};
  function _(x)
{    return document.getElementById(x);
  }

  $("#firstform").submit(function(e){
    processPhase();
    return false; 
  });

function processPhase(){
  
  $("#phase1").hide();
  $("#phase2").show();
  $("#names").show();
  $("#names").html("Hello "+ " " + $("#firstname").val().toUpperCase());

  formvalues.firstname = $("#firstname").val();
  formvalues.lastname = $("#lastname").val();
  formvalues.email = $("#email").val();
  formvalues.password = $("#password").val();
  // fname = _("firstname").value;
  // lname = _("lastname").value;
  // email = _("email").value;

  // if(fname.length > 3 && lname.length > 3){    

  //   _("phase2").style.display = "block";
  //   _("phase1").style.display = "none";
  //   // _("phase2").style.display = "block";
  //   // $("#phase2").html("Hey" + fname);
  //   // alert(fname + lname);
  //   $("#names").show();
  //   $("#names").html("Hello "+ " " + fname);
  // }
  // else{
  //   $("#flash").show();
  //   $("#flash").html("Input Length sould be greater than 3 letters");
  //   }

  }

   $("#secondform").submit(function(e){
    processPhase2();
    return false; 
  });

  function processPhase2(){

     if($("#moveindate").val()!="")
     {

      $("#phase2").hide();
      $("#phase3").show();
    }
    else{
          $("#whatever").show();
          $("#whatever").html("Please provide us a date!");
      }
      formvalues.moveindate = $("#moveindate").val();
  }

  $("#thirdform").submit(function(e){
    processPhase3();
    return false; 
  });

  function processPhase3(){

    $("#phase3").hide();
    $("#phase4").show();
    formvalues.hometype = $("#hometype").val();
  }

  $("#fourthform").submit(function(e){
    processPhase4();
    return false; 
  });

function processPhase4(){
// alert(city + " " + state + postal );
formvalues.staddress = $("#staddress").val();
formvalues.city = $("#city").val();
formvalues.state = $("#state").val();
formvalues.postalcode = $("#postalcode").val();

// default values from renter.
formvalues.usertype = "Renter";
formvalues.lng = "a";
formvalues.lat = "b";

//send address, city, state and zip for geocoding and db insert to geocode.php
$.ajax({
      type: "POST",
      async: false,
      url: "geo_code.php",
    //contentType: "application/json",
      data: JSON.stringify(formvalues),
    success:function(data)//we got the response
       {
     var lati = data.split(",")[0];
     var longi = data.split(",")[1];
     formvalues.lat = lati.replace(/"/g, "");
     formvalues.lng = longi.replace(/"/g, "");
    },    
      error: function(err){
        alert(err.responseText)},
      });

_("phase4").style.display = "none";
_("show_all_data").style.display = "block";
_("display_fname").innerHTML = formvalues.firstname;
  _("display_lname").innerHTML = formvalues.lastname;
  _("display_email").innerHTML = formvalues.email;
  _("display_date").innerHTML = formvalues.moveindate;
  _("display_hometype").innerHTML = formvalues.hometype;
  _("display_staddress").innerHTML = formvalues.staddress;
  _("display_city").innerHTML = formvalues.city;
  _("display_state").innerHTML = formvalues.state;
  _("display_postal").innerHTML = formvalues.postalcode;
  _("display_lat").innerHTML = formvalues.lat;
  _("display_lng").innerHTML = formvalues.lng;
  
  }

 $("#datareview").submit(function(e){
      submitForm();
      return false; 
    });



  function submitForm(){
    //alert('submitting form');
  // _("multiphase").method = "post";
  // _("multiphase").action = "myparser.php";
  // _("multiphase").submit();
  $.ajax({
      type: "POST",
      async: true,
      url: "myparser.php",
      // contentType: "application/json",
      data: JSON.stringify(formvalues),
      success: function(data){
         window.location ='finishsignup.php'
         // window.location = 'finishsignup.php?id='+$formvalues.firstname
        alert(data);
      },
      error: function(err){
        alert(err.responseText)}
      });
}
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
                <a class="navbar-brand topnav" href="#">Knabba </a>
                <p class="navbar-text">(Renter Sign Up)</p>
                <a class="navbar-brand topnav"> Hello world</a>
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
<div class="spacer"></div>

    <div class="signup-section">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-offset-2">

              <!-- <form id="multiphase" onsubmit="return false"> -->
              <form id="firstform" onsubmit="return false">
                <fieldset>
                    <div id="phase1" class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">Please fill in your account details</h3>
                        </div>
                        <div class="spacer"></div>
                        <div class="spacer"></div>
                        <div class="spacer"></div>
                        

                            <div class="panel-body bs-step-inner">
                                <div class="form-group">

                                  <div class="text-danger" font-size=55 id="flash"></div> 
                                  <!-- flash error -->

                                          <!-- Begin col-md-6 -->
                                          <div class="col-md-6">
                                              <label for="firstname">First Name</label> 
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                  <input type="text" value="" size="30" required placeholder="Enter Your First Name" name="firstname" id="firstname" class="form-control" data-popover-offset="0,15" autofocus="autofocus">
                                                </div>
                                          </div>
                                          
                                          <div class="col-md-6">
                                            <label for="lastname">Last Name</label>
                                                <div class="input-group">
                                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                  <input type="text" size="30" placeholder="Enter Your Last Name" name="lastname" id="lastname" data-popover-offset="0,15" class="form-control" required>
                                                </div>
                                          </div>
                                          
                                          <div class="col-md-12">
                                              
                                            <div class="row spacer"></div>

                                            <label for="email">Email Address</label>
                                              <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                <input type="email" size="30" placeholder="Enter Your Email Address" name="email" id="email" data-popover-offset="0,15" class="form-control" required>
                                              </div>
                                              <!-- End of Input group -->
                                          </div>
                                          <!-- End of Col-md-12 -->

                                          <div class="col-md-12">
                                           <div class="row spacer"></div>
                                            <label for="client_Password">Create Password</label>
                                              <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input type="password" size="30" placeholder="Create A Password" name="password" id="password" data-popover-offset="0,15" class="form-control" required>
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                             <div class="row spacer"></div>
                                             <div class="checkbox">
                                                <label><input type="checkbox" required="required">By checking this - you accept our terms and policy!</label>
                                              </div>
                                              <div class="btn-group">
                                                <button type="submit" id="processPhase" class="btn btn-primary btn-lg">Create Account</button>
                                              </div>
                                        </div>
                                        <!-- End of Col-md-12 -->

                                </div>
                                <!-- End of Form-group -->
                            </div>
                            <!-- End of panel-body -->
                          </div>
                          <!-- End of Panel Panel Default -->
                          </fieldset>
                          <!-- End of fieldset -->
                        </form>

                          <blockquote id="names"></blockquote>
                          <div class="row spacer"></div>
              
              
                  <form id="secondform">
                  <fieldset>
              <!-- Second Phase of the form -->

                     <div id="phase2" class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">When Can You Move In?</h3>
                        </div>
                         <div class="spacer"></div>
                         <div class="spacer"></div>
                            <div class="col-md-10">
                              <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                  25%
                                </div>
                              </div>
                            </div>

                        <div class="panel-body bs-step-inner">
                             <!-- Begin col-md-6 -->                    
                          <div class="form-group">
                               <div class="text-danger col-md-12" id="whatever" ></div> 

                               <div class="spacer"></div>

                                <div class='col-md-6'>
                                  <div class="input-group date" >
                                      <!-- <input type='text' class="form-control" id="datepicker"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> -->
                                      <input type="text" id="moveindate" name="moveindate" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar" required></i></span>
                                  </div>
                                </div>
                              
                                <div class="col-md-6">
                                    <div class="btn-group">
                                      <button type="submit" id="processPhase2" class="btn btn-primary">Continue</button>
                                    </div>
                                </div>
                          </div> 
                          <!-- End of Form-group -->
                      </div>
                      <!-- End of panel-body -->
                    
                    </div>
                    <!-- End of Panel Panel Default -->  
                  </fieldset>
                  </form>

                  <form id="thirdform">
                    <fieldset>
                      <div id="phase3" class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Choose Your Type of Home!</h3>
                          </div>
                            <!-- End of panel-heading -->
                           <div class="spacer"></div>
                            <div class="col-md-10">
                              <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                  50%
                                </div>
                              </div>
                            </div>

                           <div class="panel-body bs-step-inner">
                              <div class="spacer"></div>

                                <div class="form-group col-md-6 col-md-offset-3">
                                  <label for="hometype">Select House Type:</label>
                                  <select class="form-control" id="hometype">
                                    <!-- <option value="Undecisive">Undecisive</option> -->
                                    <option value=""></option>
                                    <option value="Apartment">Apartments</option>
                                    <option value="Town House">Town House</option>
                                    <option value="House">House</option>
                                  </select>
                                </div>

                                <div class="col-md-12">
                                    <div class="btn-group">
                                      <button type="submit" id="processPhase3" class="btn btn-primary">Continue</button>
                                  </div>
                                </div>
                           </div>

                      </div>
                       <!-- End of Panel Panel Default -->    

                      </fieldset>
                    </form>

                    <form id="fourthform" onsubmit="return false">
                      <fieldset>
                      <!-- Phase 4 for address -->
                       <div id="phase4" class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Where would you like to live?</h3>
                          </div>
                                <!-- End of panel-heading -->
                           <div class="spacer"></div> 
                          <!-- <div class="col-md-10 col-md-offset-1"> -->
                          <div class="col-md-10">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                                75%
                              </div>
                            </div>
                          </div>
                           <div class="panel-body bs-step-inner">
                              <div class="spacer"></div>

                                <div class="col-md-12">
                                    <label for="staddress">Street Address</label> 
                                      <div class="input-group">
                                         <!--  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
                                        <input type="text" value="" placeholder="Street Address" name="staddress" id="staddress" class="form-control" data-popover-offset="0,15" autofocus="autofocus" required>
                                      </div>
                                </div>
                               <!-- Begin col-md-6 -->
                                <div class="col-md-4">
                                    <label for="city">City</label> 
                                      <div class="input-group">
                                         <!--  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
                                        <input type="text" value="" size="30" placeholder="City Name" name="city" id="city" class="form-control" data-popover-offset="0,15" autofocus="autofocus" required>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                  <form>
                      <!-- <div class="col-lg-6"> -->
                          <label>State:</label><br/>
                          <select name="state" id="state" class="form-control">
                              <option value="AL">AL</option>
                              <option value="AK">AK</option>
                              <option value="AZ">AZ</option>
                              <option value="AR">AR</option>
                              <option value="CA">CA</option>
                              <option value="CO">CO</option>
                              <option value="CT">CT</option>
                              <option value="DE">DE</option>
                              <option value="DC">DC</option>
                              <option value="FL">FL</option>
                              <option value="GA">GA</option>
                              <option value="HI">HI</option>
                              <option value="ID">ID</option>
                              <option value="IL">IL</option>
                              <option value="IN">IN</option>
                              <option value="IA">IA</option>
                              <option value="KS">KS</option>
                              <option value="KY">KY</option>
                              <option value="LA">LA</option>
                              <option value="ME">ME</option>
                              <option value="MD">MD</option>
                              <option value="MA">MA</option>
                              <option value="MI">MI</option>
                              <option value="MN">MN</option>
                              <option value="MS">MS</option>
                              <option value="MO">MO</option>
                              <option value="MT">MT</option>
                              <option value="NE">NE</option>
                              <option value="NV">NV</option>
                              <option value="NH">NH</option>
                              <option value="NJ">NJ</option>
                              <option value="NM">NM</option>
                              <option value="NY">NY</option>
                              <option value="NC">NC</option>
                              <option value="ND">ND</option>
                              <option value="OH">OH</option>
                              <option value="OK">OK</option>
                              <option value="OR">OR</option>
                              <option value="PA">PA</option>
                              <option value="RI">RI</option>
                              <option value="SC">SC</option>
                              <option value="SD">SD</option>
                              <option value="TN">TN</option>
                              <option value="TX">TX</option>
                              <option value="UT">UT</option>
                              <option value="VT">VT</option>
                              <option value="VA">VA</option>
                              <option value="WA">WA</option>
                              <option value="WV">WV</option>
                              <option value="WI">WI</option>
                              <option value="WY">WY</option>
                          </select>
                          <!-- </div> -->
                          </form>
                        </div>
                          <div class="col-md-4">
                              <label for="lastname">Zip Code</label>
                                  <div class="input-group">
                                    <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
                                    <input type="text" size="30" placeholder="Postal Code" name="" id="postalcode" data-popover-offset="0,15" class="form-control">
                                  </div>
                          </div>
                                
                          <div class="col-md-12">
                              <div class="row spacer"></div>
                            </div>

                          <div class="col-md-12">
                              <div class="btn-group">
                                <button type="submit" id="processPhase4" class="btn btn-primary btn-lg">Continue</button>
                              </div>
                        </div> 
                     </div>
                     <!-- End of panel body -->

                  </div>
                   <!-- End of Panel Panel Default -->  
                </fieldset>
                </form>

                <form id="datareview">
                <fieldset>


                 <div id="show_all_data" class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Data Submission Review</h3>
                    </div>
         <!-- End of panel-heading -->

                   <div class="spacer"></div>
                   <div class="col-md-10 col-md-offset-1">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                100%
                              </div>
                            </div>
                          </div>



                           <div class="panel-body bs-step-inner">
                              <div class="spacer"></div>
                              <dl class="dl-horizontal" align="center">
                                <dt>First Name:</dt>
                                <dd align="left"><span id="display_fname"></span></dd>
                                <dt>Last Name:</dt>
                                <dd align="left"><span id="display_lname"></span></dd>
                                <dt>Email Address:</dt>
                                <dd align="left"><span id="display_email"></span></dd>
                                <dt>Move In Date:</dt>
                                <dd align="left"><span id="display_date"></span></dd>
                                <dt>Home Type:</dt>
                                <dd align="left"><span id="display_hometype"></span></dd>
                                <dt>Street Address: </dt>
                                <dd align="left"><span id="display_staddress"></span></dd>
                                <dt>City:</dt>
                                <dd align="left"><span id="display_city"></span></dd>
                                <dt>State: </dt>
                                <dd align="left"><span id="display_state"></span></dd>
                                <dt>Zip Code: </dt>
                                <dd align="left"><span id="display_postal"></span></dd>
                                <dt>Latitude: </dt>
                                <dd align="left"><span id="display_lat"></span></dd>
                                <dt>Longitude: </dt>
                                <dd align="left"><span id="display_lng"></span></dd>
                              </dl>

                                  <div class="spacer"></div>
                                  <div class="spacer"></div>
                                  <div class="spacer"></div>
                                  <div class="spacer"></div>
                                  <div class="spacer"></div>

                                  <button class="btn btn-primary btn-lg" id="submitForm">Submit Data</button>
                          </div>
                      </div>
                       <!-- End of Panel Panel Default -->  

                  </fieldset>
                </form>

            </div>
            <!-- End of col-lg-8 col-md-offset-2 -->
         </div>
         <!-- End of Row -->
       </div>
       <!-- End of Container -->
    </div>
      <!-- End Up signup-section -->
                      
  // <script>
  $(document).ready(function(){
    $('.input-group.date').datepicker({
        clearBtn: true,
        todayBtn: "linked",
        todayHighlight: true,
        autoclose: true,
        startDate: new Date()
      });

    $('.datepicker').focus();
  });

        </script>
</body>
</html>