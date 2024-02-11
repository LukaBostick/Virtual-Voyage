<?php 
require "../includes/header.php";
require "../config/config.php";

if(isset($_POST["submit"])) {
    if(empty($_POST['email']) OR empty($_POST['password'])){
        echo "<script>alert('One or more inputs are invalid');</script>";
    } else {
        // Get data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Write the query with prepared statement
        $login = $conn->prepare("SELECT * FROM users WHERE email=:email");
        $login->bindParam(':email', $email);
        $login->execute();

        // Fetch user data
        $fetch = $login->fetch(PDO::FETCH_ASSOC);

        if($login->rowCount() > 0) {
            // Verify password
            if (password_verify($password, $fetch['password'])) {
               $_SESSION['username']=$fetch['username'];
               $_SESSION['user_id']=$fetch['id'];
               $_SESSION['email']=$fetch['email'];

               header("location: ".APPURL."");

            } else {
                echo "<script>alert('Email or Password is wrong.');</script>";
            }
        } else {
            echo "<script>alert('Email or Password is wrong.');</script>";
        }

        // Close the database connection
        $conn = null;
    }
}
?> 
<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left">Login</h1>
						<h4 class="pull-right">A Simple Forum</h4>
						<div class="clearfix"></div>
						<hr>
						<form role="form"  method="post" action="login.php">
							<div class="form-group">
							<label>Email Address*</label> <input type="email" class="form-control"
							name="email" placeholder="Enter Your Email Address">
							</div>
					<div class="form-group">
					<label>Password*</label> <input type="password" class="form-control"
				name="password" placeholder="Enter A Password">
				</div>
				
        <input name="submit" type="submit" class="color btn btn-default" value="Login" />
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo APPURL;?>index.html">Forum</a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?php echo APPURL;?>/index.php">Home</a></li>
            <li><a href="<?php echo APPURL;?>/auth/register.php">Register</a></li>
            <li><a href="<?php echo APPURL;?>/auth/login.php">Login</a></li>
            <li><a href="<?php echo APPURL;?>/create.html">Create Topic</a></li>
        </ul>
    </div>
</div>

<?php require "<? php echo APPURL?> /includes/footer.php"; ?>