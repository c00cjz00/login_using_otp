<?php 
    session_start();
    include("include/header.php");
    include("include/base.php");
    include_once("include/db_connect.php");
    $errorMessage = '';
    if(!empty($_POST["authenticate"]) && $_POST["otp"]!='') {
        $sqlQuery = "SELECT * FROM authentication WHERE otp='". $_POST["otp"]."' AND expired!=1 AND NOW() <= DATE_ADD(created, INTERVAL 1 HOUR)";
        $result = mysqli_query($conn, $sqlQuery);
        $count = mysqli_num_rows($result);
        if(!empty($count)) {
            $sqlUpdate = "UPDATE authentication SET expired = 1 WHERE otp = '" . $_POST["otp"] . "'";
            $result = mysqli_query($conn, $sqlUpdate);
            header("Location: dashboard");
        } else {
            $errorMessage = "Invalid OTP Code!";
        }	
    } else if(!empty($_POST["otp"])){
        $errorMessage = "Enter OTP Code!";	
    }	
?>
<title>Build Login System with OTP using PHP & MySQL | Verify</title>
<?php include('include/container.php');?>
<div class="container">	
	<div class="col-md-6">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Enter OTP Code</div>                        
			</div> 
			<div style="padding-top:30px" class="panel-body" >
				<?php if ($errorMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
				<?php } ?>
				<form id="authenticateform" class="form-horizontal" role="form" method="POST" action="">  					
					<div style="margin-bottom: 25px" class="input-group">
						<label class="text-success">Check your email for OTP Code</label>
						<input type="text" class="form-control" id="otp" name="otp" placeholder="One Time Password">                       
					</div>                          
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						  <input type="submit" name="authenticate" value="Continue" class="btn btn-success">						  
						</div>
					</div>                                
				</form>   
			</div>                     
		</div>  
	</div>
</div>	
<?php include('include/footer.php');?>