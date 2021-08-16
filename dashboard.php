<?php 
    // Start session
    session_start();
    include("include/header.php");
    if(!isset($_SESSION["user"])){
        // Redirect user to login page if the user is not
        // logged in.
        header("location: index");
    }
?>
    <title>Build Login System with OTP using PHP & MySQL | Dashboard</title>
    <?php include('include/container.php');?>
    <div class="container">	
	    <div class="col-md-6">                    
	        <h3>Welcome - <?php echo $_SESSION["user"]; ?></h3><br/>
	        <p>
                <a href="logout">Logout</a>
            </p>	                    
	    </div> 	
    </div>	
<?php include('include/footer.php');?>