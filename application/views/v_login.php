<!DOCTYPE html>
<html>
<head>
	<title>Login | Aplikasi Barbershop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="<?php echo base_url(); ?>assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?php echo base_url(); ?>assets/img/side_barber1.svg">
		</div>
		<div class="login-content">
			<form action="<?php echo base_url(); ?>auth/signin" method="post">
				<img src="<?php echo base_url(); ?>assets/img/avatar.svg">
				<h2 class="title" style="font-size: 150%;">Barbershop Apps Login</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main_log.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet"></link>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
	<script type='text/javascript'>
	<?php if($this->session->flashdata('error1') == 'failpassword') { ?>
		swal("Login Gagal","Cek kembali password anda !","error");
	<?php }else if($this->session->flashdata('error2') == 'failaccount') { ?>
		swal("Login Gagal","Cek kembali username dan password anda !","error");
	<?php } ?>
	</script>
</body>
</html>