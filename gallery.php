<?php
	session_start();

if(!isset($_SESSION['pid']))
{
    header('location: getstarted.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery Page</title>
<link rel="stylesheet" type="text/css" href="lightbox/css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="gallery_styles.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="lightbox/js/jquery.lightbox-0.5.pack.js"></script>
<script type="text/javascript" src="script.js"></script>

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
	                <a class="navbar-brand topnav" href="index.html">Knabba </a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav navbar-right" >
	                <a class="navbar-text navbar-right" href="logout.php">Logout</a>
	                <p class="navbar-text navbar-right">Signed in as <?php echo ucfirst($_SESSION['firstname']); ?></p> 
	                <!-- $_SESSION['firstName'] here is the property name. At least that's how the database is structured. -->

	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>


	    
	<div id="container">
		<div id="heading">
		<h2>this is the session</h2>
			     <h2><?php echo $_SESSION['pid']; ?></h2>
		</div>

	<div id="gallery"> <!-- div for displaying images.  Formatting is done in the css. -->

		<?php
			$directory = 'Images/'.$_SESSION['pid'].'_LandlordImages/gallery'; // set the directory path using pid as the first part of the folder name

			$allowed_types=array('jpg', 'JPG','jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG'); // allowed file extensions
			$file_parts=array();
			$ext='';
			$title='';
			$i=0;

			$dir_handle = @opendir($directory) or die("There is an error with your image directory!"); //open stream to directory

			while ($file = readdir($dir_handle)){
				if($file=='.' || $file == '..') continue;
	
				$file_parts = explode('.',$file); 
				$ext = strtolower(array_pop($file_parts));

				$title = implode('.',$file_parts);
				$title = htmlspecialchars($title);
	
				$nomargin='';
	
				if(in_array($ext,$allowed_types)){
					if(($i+1)%4==0) $nomargin='nomargin';
	
						echo '
							<div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;"> 
							<a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
							</div>'; // echo out files that are in the specified folder
		
						$i++; // increment plus one until there are no more files in the folder.
				}
			}

			closedir($dir_handle); // close directory stream

			?>
		<div class="clear"></div>
	</div> <!-- end gallery div -->
</div> <!-- end container div -->

</body>
</html>
