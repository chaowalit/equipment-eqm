<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>ระบบควบคุมวัสดุ-ครุภัณฑ์ออนไลน์</title>

    <style>

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #000;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	width: auto;
	height: auto;
	//background-image: url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	width: auto;
	height: auto;
	//background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	background: #f0f0f0;
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 325px);
	z-index: 2;
}

.header div{
	float: left;
	color: #000;
	font-family: 'leelawadee', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(0,0,0,0.6);
	border-radius: 2px;
	color: #000;
	font-family: 'leelawadee', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(0,0,0,0.6);
	border-radius: 2px;
	color: #000;
	font-family: 'leelawadee', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 260px;
	height: 35px;
	background: #000;
	border: 1px solid #000;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'leelawadee', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(0,0,0,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(0,0,0,0.9);
}

.login input[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(0,0,0,0.6);
}

::-moz-input-placeholder{
   color: rgba(0,0,0,0.6);
}
</style>


</head>

<body>
	<!-- Reference http://designscrazed.net/css-html-login-form-templates/ -->
  <div class="body"></div>
		<div class="header">
			<div>Please <span>Sign In</span><br /><label style="font-size:20px;">ระบบควบคุมวัสดุ-ครุภัณฑ์ออนไลน์</label></div>
		</div>
		<br>
		<form action="<?php echo base_url(); ?>index.php/login" method="post" role="form">
		<div class="login">
				<input type="text" placeholder="Username" name="user_name"><br>
				<input type="password" placeholder="Password" name="password"><br>
				<input type="submit" value="Login" name="submit_user">
		</div>
		</form>

</body>

</html>