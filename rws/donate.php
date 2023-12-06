<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];	
$mobile=$_POST['mobileno'];
$occup=$_POST['occupation'];	
$amount=$_POST['amount'];
$sql="INSERT INTO  tbldonate(firstname,lastname,email,phone,occupation,amount) VALUES(:fname,:lname,:email,:mobile,:occup,:amount)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':occup',$occup,PDO::PARAM_STR);
$query->bindParam(':amount',$amount,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Donation submitted successfully";
header('location:donate.php');
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>RWS | RwandaWildlife & Education System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
#enquiry
		{
			padding: 10px;
			background: lightgrey;
			color: white;
			border-left: 4px solid #778899;
			border-right: 4px solid #778899;
			border-top: 4px solid #778899;
			border-bottom: 4px solid #778899;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			padding:10px;
			width: 700px;
			margin: 0 auto;
			border-radius: 20px;
		}
		</style>
</head>
<body>
<!-- top-header -->
<div class="top-header">
<?php include('includes/header.php');?>
<div class="banner-1 ">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">RWS - RwandaWildlife & Education System</h1>
	</div>
</div>
<!--- /banner-1 ---->
<!--- privacy ---->
<div class="privacy">
	<div class="container" id="enquiry">
		<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Donate Form Here!</h3>
		<form name="enquiry" method="post">
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	<p style="width: 350px;">
		
			<b>First Name</b>  <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" required="">
	</p> 
    <p style="width: 350px;">
		
			<b>Last Name</b>  <input type="text" name="lname" class="form-control" id="fname" placeholder="Last Name" required="">
	</p> 
<p style="width: 350px;">
<b>Email</b>  <input type="email" name="email" class="form-control" id="email" placeholder="Valid Email id" required="">
	</p> 

	<p style="width: 350px;">
        <b>Mobile No</b>  <input type="text" name="mobileno" class="form-control" id="mobileno" maxlength="10" placeholder="10 Digit mobile No" required="">
	</p> 

	<p style="width: 350px;">
        <b>Occupation</b>  <input type="text" name="occupation" class="form-control" id="subject"  placeholder="Your occupation" required="">
	</p> 
    <p style="width: 350px;">
        <b>Amout</b>  <input type="number" name="amount" class="form-control" id="subject"  placeholder="Enter Amount RWF" required="">
	</p> 
	
			<p style="width: 350px;">
<button type="submit" name="submit1" class="btn-primary btn">Submit</button>
			</p>
			</form>

		
	</div>
</div>
<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>