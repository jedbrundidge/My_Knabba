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

    <script>
    $(function(){
    	var formvalues={};
    	 function _(x){
		    return document.getElementById(x);
		  }

    	$("#firstform").submit(function(e){
    		processPhase();
    		return false;
    	}); //End of firstform

    	function processPhase(){
    		 $("#phase1").hide();
  			 $("#phase2").show();
  			 $("#blockquotet").hide();

  			 formvalues.usertype = "Landlord";
  			 formvalues.hometype = $("#hometype").val();
    	}

    	$("#secondform").submit(function(e){
    		processPhase2();
    		return false;
    	});

    	function processPhase2(){
		 	$("#phase2").hide();
			$("#phase3").show();
			//alert(formvalues.hometype );
    		formvalues.staddress = $("#staddress").val();
			formvalues.city = $("#city").val();
			formvalues.state = $("#state").val();
			formvalues.postalcode = $("#postalcode").val();
			//alert(formvalues.staddress + formvalues.city + formvalues.state + formvalues.postalcode);

    	}

    	$("#thirdform").submit(function(e){
			processPhase3();
			return false;
    	});

    	function processPhase3(){
			$("#phase3").hide();
			$("#phase4").show();
			formvalues.propertyname = $("#propertyname").val();
			formvalues.propertydesc = $("#propertydesc").val();
    	}

    	$("#fourthform").submit(function(e){
    		processPhase4();
    		return false;
    	});

    	function processPhase4(){

		formvalues.email = $("#email").val();
		formvalues.password = $("#password").val();

		_("phase4").style.display = "none";
		_("show_all_data").style.display = "block";
		_("display_usertype").innerHTML = formvalues.usertype;
		_("display_email").innerHTML = formvalues.email;
		_("display_name").innerHTML = formvalues.propertyname;
		_("display_description").innerHTML = formvalues.propertydesc;
		_("display_propertytype").innerHTML = formvalues.hometype;
		
		_("display_staddress").innerHTML = formvalues.staddress;
		_("display_city").innerHTML = formvalues.city;
		_("display_state").innerHTML = formvalues.state;
		_("display_postal").innerHTML = formvalues.postalcode;

		
			  
    	}

	 $("#datareview").submit(function(e){
	    submitForm();
	    return false; 
	  });

   function submitForm(){
   	  alert('submitting form');
	  $.ajax({
	      type: "POST",
	      async: true,
	      url: "myparser_l.php",
	      // contentType: "application/json",
	      data: JSON.stringify(formvalues),
	      success: function(data){
	         window.location ='l_profile.php'
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
                <p class="navbar-text">(Renter Create Account)</p>
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

<div class="signup-section">
	<div class="container">
		<div class="row">
			 <div class="col-md-6 col-md-offset-3"><h1>Find New Renters!</h1> 
			 <div class="row spacer"></div>
			 <blockquote id="blockquotet" class="muted">Knabba gives you access to a list of highly qualified, reliable renters. You decide who to offer your property to.</blockquote>

			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<form id="firstform" onsubmit="return false">
				<fieldset>

					<div id="phase1" class="panel panel-default">
						  <!-- Default panel contents -->
						  <div class="panel-heading">What type of property do you manage?</div>
						  <div class="panel-body bs-step-inner">
                              <div class="spacer"></div>
                              <div class="col-md-10">
							    <div class="progress">
							      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
							        10%
							      </div>
							    </div>
							  </div>

                                <div class="form-group col-md-6 col-md-offset-3">
                                  <label for="hometype">Select Property Type:</label>
                                  <select class="form-control" id="hometype">
                                    <option value="" selected disabled>Select Your Property Type!</option>
                                    <!-- <div class="divider"></div> -->
                                    <option value="Apartment">Apartments</option>
                                    <option value="Town House">Town House</option>
                                    <option value="House">House</option>
                                  </select>
                                </div>

                                <div class="col-md-12">
                                    <div class="btn-group">
                                      <button type="submit" id="processPhase" class="btn btn-primary">Continue</button>
                                  </div>
                                </div>
                           </div>
					</div>
				</fieldset>
			</form>


			<!-- Begin Second form -->
			<form id="secondform">
				<fieldset>
				<!-- Phase 4 for address -->
				<div id="phase2" class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Where Are You Located?</h3>
				  </div>
				        <!-- End of panel-heading -->
				   <div class="spacer"></div> 
				  <!-- <div class="col-md-10 col-md-offset-1"> -->
				  <div class="col-md-10">
				    <div class="progress">
				      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
				        25%
				      </div>
				    </div>
				  </div>
				   <div class="panel-body bs-step-inner">
				      <div class="spacer"></div>

				        <div class="col-md-11">
				            <label for="staddress">Street Address</label> 
				              <div class="input-group"  style="width: 100%">
				                 <!--  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
				                <input type="text" value="" placeholder="Street Address" name="staddress" id="staddress" class="form-control" data-popover-offset="0,15" autofocus="autofocus" required>
				              </div>
				        </div>
				        <div class="col-md-1" style="
    padding-bottom: 5%">
				        <div class="spacer"></div>
				        </div>

				       <!-- Begin col-md-6 -->
				        <div class="col-md-4">
				            <label for="city">City</label> 
				              <div class="input-group">
			                 <!--  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
			                <input type="text" value="" size="30" placeholder="City Name" name="city" id="city" class="form-control" data-popover-offset="0,15" autofocus="autofocus" required>
			          </div>
			        </div>
			        <div class="col-md-3">
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
			                <button type="submit" id="processPhase2" class="btn btn-primary btn-lg">Continue</button>
			              </div>
			        </div> 
			     </div>
			     <!-- End of panel body -->

			  </div>
			   <!-- End of Panel Panel Default -->  
			</fieldset>
			</form>

			<form id="thirdform">
				<fieldset>
					<div id="phase3" class="panel panel-default">
						  <!-- Default panel contents -->
						  <div class="panel-heading">Would You Like To Name Your Property?</div>
						  <div class="panel-body bs-step-inner">
                              <div class="spacer"></div>
                              <div class="col-md-10">
							    <div class="progress">
							      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
							        50%
							      </div>
							    </div>
							  </div>

							  <div class="form-group col-md-8 col-md-offset-2">
							    <label for="propertyname">Property Name</label>
							    <input type="text" class="form-control" id="propertyname" placeholder="Enter Property Name">
							  </div>

							  <div class="form-group col-md-8 col-md-offset-2" rows="3">
							    <label for="propertydesc">Short Description Of Property</label>
							    <!-- <input type="text" class="form-control" id="propertydesc" placeholder="Say Nice Things :)"> -->
							    <textarea class="form-control" id="propertydesc" rows="4" placeholder="Say Nice Things :)"></textarea>
							    <span id="helpBlock" class="help-block">Tell Renters Why Your Property Is So Great (100 Character Max).</span>
							  </div>

                                <div class="col-md-12">
                                    <div class="btn-group">
                                      <button type="submit" id="processPhase3" class="btn btn-primary">Continue</button>
                                  </div>
                                </div>
                           </div>
					</div>
				</fieldset>
			</form>
			<!-- End of third form -->



			<form id="fourthform" onsubmit="return false">
				<fieldset>
					<div id="phase4" class="panel panel-default">
						  <!-- Default panel contents -->
						  <div class="panel-heading">Almost Done! Let create username and password?</div>
						  <div class="panel-body bs-step-inner">
                              <div class="spacer"></div>
                              <div class="col-md-10">
							    <div class="progress">
							      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
							        70%
							      </div>
							    </div>
							  </div>

							  <div class="form-group col-md-8 col-md-offset-2">
							    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email">
							  </div>
							  <span id="helpBlock" class="help-block">At knabba, your email address is your username. Simple Isn't IT?</span>

							  <div class="form-group col-md-8 col-md-offset-2" rows="3">
							     <label for="password">Password</label>
    							 <input type="password" class="form-control" id="password" placeholder="Password">
							    <!-- <span id="helpBlock" class="help-block">Tell Renters Why Your Property Is So Great (100 Character Max).</span> -->
							  </div>

                                <div class="col-md-12">
                                    <div class="btn-group">
                                      <button type="submit" id="processPhase4" class="btn btn-primary btn-lg">Create Account</button>
                                  </div>
                                </div>
                           </div>
					</div>
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
                          	 	<dt>User Type:</dt>
                                <dd align="left"><span id="display_usertype"></span></dd>
                              	<dt>Email Address:</dt>
                                <dd align="left"><span id="display_email"></span></dd>
                                <dt>Property Name:</dt>
                                <dd align="left"><span id="display_name"></span></dd>
                                <dt>Property Type:</dt>
                                <dd align="left"><span id="display_propertytype"></span></dd>
                                <dt>Property Description:</dt>
                                <dd align="left"><span id="display_description"></span></dd>
                                <dt>Street Address: </dt>
                                <dd align="left"><span id="display_staddress"></span></dd>
                                <dt>City:</dt>
                                <dd align="left"><span id="display_city"></span></dd>
                                <dt>State: </dt>
                                <dd align="left"><span id="display_state"></span></dd>
                                <dt>Zip Code: </dt>
                                <dd align="left"><span id="display_postal"></span></dd>
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
	</div>
</div>

</body>
</html>