    <?php
		if($_GET['provider']){
			$config = 'hybridauth/config.php';
			
			require_once( "hybridauth/Hybrid/Auth.php" );
			
			
			$hybridauth = new Hybrid_Auth( $config );
			
			$adapter = $hybridauth->authenticate( $_GET['provider'] );  
			
			$user_profile = $adapter->getUserProfile(); 
			
			echo '<div style="display:table; margin:auto;"><img src="http://graph.facebook.com/'.$user_profile->identifier.'/picture"></div>';
			echo '<div style="display:table; margin:auto; font-size:22px; font-weight:bold">Welcome '.$user_profile->displayName.'</div>';
			exit(0);
		}
	?>
    
    <!DOCTYPE html>
    <html>
    <head>
    <title>Park-ko Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
     <script src="bootstrap/js/jquery18.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body style="text-align:center">
   <div style="width:50%; margin:0 auto;"> 
     
    <div  style="text-align:center; margin:0 auto">
          <div class="hero-unit" style="margin:0 auto;">
            <p style="margin:0 0 20px 0"><a href="?provider=Facebook" id="guifacebook" class="btn btn-primary btn-large" style="width:200px;">Facebook Account</a></p>
            <p  style="margin: 20px 0"><a class="btn btn-large btn-success"  id="guitwitter"   style="width:200px;" href="#">Twitter Account</a></p>
            <p style="margin:20px 0"><a href="#" class="btn btn-info btn-large"  id="guiInstagram"  style="width:200px;">Instagram Account</a></p>
            <p style="margin:20px 0"><a href="#" class="btn btn-danger btn-large"  id="guiga"  style="width:200px;" >Gmail Account</a></p>
          </div>
    </div>
    
    </div>
    </body>
    </html>