    <?php
		if($_GET['provider']){
			$config = 'hybridauth/config.php';
			require_once( "hybridauth/Hybrid/Auth.php" );
			require_once( "RegisterService.php" );
			
			$hybridauth = new Hybrid_Auth( $config );
			
			$adapter = $hybridauth->authenticate( $_GET['provider'] );  
			
			$user_profile = $adapter->getUserProfile(); 
			
			$_SESSION['identifier'] = $user_profile->identifier;
			$_SESSION['displayname'] = $user_profile->displayName;
			
			$db = new parkKoRegisterService();

			$field = array('id','fist_name','gender','last_name','link','local','name','timezone','updated_time','verified','type_api','timeupdate');
			$timeUpdate = date('Y-m-d H:i:s');
			$data = array($user_profile->identifier,$user_profile->firstName,$user_profile->gender,$user_profile->lastName,$user_profile->profileURL,$user_profile->region,$user_profile->displayName,'7',$timeUpdate,'false',1,$timeUpdate);
			
			$db->insert($field,$data)->save();
			
			die();
		}
		
		if($_SESSION['displayname']){
			header("Location: http://119.59.97.33/welcome.php");
			exit(0);
		}
	?>
    
    <!DOCTYPE html>
    <html>
    <head>
    <title>Park-ko Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
     <script src="bootstrap/js/jquery18.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body style="background:#DD9FDD">
<div class="contrainer">
	<div class="header"><div class="wrapper" style="padding:0; text-align:left;"><strong>Park KO</strong></div></div>
    <div class="boxBody">
    <div class="wrapper">
    
   <div style="width:50%; margin:20px auto;"> 
     
    <div  style="text-align:center; margin:0 auto">
          <div class="hero-unit" style="margin:0 auto;">
            <p style="margin:0 0 20px 0"><a href="?provider=Facebook" id="guifacebook" class="btn btn-primary btn-large" style="width:200px;">Facebook Account</a></p>
         <!--   <p  style="margin: 20px 0"><a class="btn btn-large btn-success"  id="guitwitter"   style="width:200px;" href="#">Twitter Account</a></p>
            <p style="margin:20px 0"><a href="#" class="btn btn-info btn-large"  id="guiInstagram"  style="width:200px;">Instagram Account</a></p>
            <p style="margin:20px 0"><a href="#" class="btn btn-danger btn-large"  id="guiga"  style="width:200px;" >Gmail Account</a></p> -->
          </div>
    </div>
    
    </div>
    
   </div>
    </div>
     </div>
      </div>
    </body>
    </html>