
<?php

//edit_profile.php

include("./database/db.php");

if(isset($_POST['user_name']))
{
	if($_POST["user_new_password"] != '')
	{
		$query = "
		UPDATE user_details SET 
			user_name = '".$_POST["user_name"]."', 
			user_email = '".$_POST["user_email"]."', 
			user_password = '".password_hash($_POST["user_new_password"], PASSWORD_DEFAULT)."' 
			WHERE user_id = '".$_SESSION["user_id"]."'
		";
	}
	else
	{
		$query = "
		UPDATE user_details SET 
			user_name = '".$_POST["user_name"]."', 
			user_email = '".$_POST["user_email"]."'
			WHERE user_id = '".$_SESSION["user_id"]."'
		";
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	if(isset($result))
	{
		echo '<div class="alert alert-success">Profile Edited</div>';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update your profile</title>
	<style type="text/css">
		 
 body{
 	font-size:19px;
 	width:50%;
 	margin:50px auto; 
 	
 }
 table{
 	width:50%;
 	margin:30px auto;
 	border-collapse:collapse; 
	text-align:left; 
} 

form{
	width:50%;
	text-align:left;
	padding:20px;
	border:1px solid #bbbbbb;
	border-radius:5px; 
	margin:30px auto;    
}
.input-group{
	margin:10px 0px 10px 0px; 
}
.input-group label{
	display:block;
	text-align:left;
	margin:3px;                           
}
.input-group input{
	height:30px;
	width:95%;
	padding: 5px 10px;
	font-size:16px;
	border-radius:5px;
	border:1px solid gray;    
}
.btn{
	padding:10px;
	font-size:15px;
	color:white;
	background:#5F9EA0;
	border:none;
	border-radius:5px;    
}
.btn:hover{
	background:green; 

}
h1{
	text-align:center;
	color:seagreen;
	padding:20px;   
}

	</style>
</head>
<body>
	<h1>Here Update Your profile</h1>
	<table>
		<form method="post">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="user_name" id="user_name" class="form-control" required />
        </div>
        <div class="input-group">
			<label>Email Adress</label>
			<input type="email" name="user_email" id="user_email" class="form-control" required />
        </div>
       
					<label style="color:red" >Leave Password blank if you do not want to change</label>
					<div class="input-group">
						<label>New Password</label>
						<input type="password" name="user_new_password" id="user_new_password" class="form-control" />
					</div>
					<div class="input-group">
						<label>Re-enter Password</label>
						<input type="password" name="user_re_enter_password" id="user_re_enter_password" class="form-control" />
						<span id="error_password"></span>	
					</div>
        <div class="input-group">
			<button type="submit" name="save" class="btn">Save Your Profile</button> 
        </div>
	</form>
	</table>
	
</body>
</html>