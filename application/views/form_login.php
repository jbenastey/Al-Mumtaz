<html>
<head>
<meta charset="utf-8">
<title>Al-Mumtaz</title>
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.css" type="text/css">
<link href="<?php echo base_url();?>/assets/css/login_style2.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/login.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

<!--//webfonts-->
<link rel="shorcut icon" href="<?php echo base_url() ?>/assets/img/logomumtaz.png">
<!-- <script>
	function myFunction()
		{
			alert("Thanks for login");
		}

</script> -->
<style media="screen">
	.captcha{
		margin: 0 auto;
	}
</style>
</head>

<body>
	<div class="main">

		<div class="login">

			<div class="inset">
				<div class="user">
					<img src="<?php echo base_url().'assets/img/' ?>logomumtaz3.png" alt="">
				</div>
				<br>



					<?php echo form_open('admin/login'); ?>
			         <div>


						<span><input type="text" name="username" class="textbox" autocomplete="off" required placeholder="Username"></span>
					 </div>
					 <div>
					
					    <span><input type="password" name="password" class="password" autocomplete="off" required placeholder="Password"></span>
					 </div>

					 <?php
						$wrong = $this->input->get('login_error');
						if($wrong){
					 ?>
						<span style="color:red;" class="alert alert-danger text-center">Username atau Password Salah</span>
					 <?php
						}
					 ?>

					 <?php
					 $message = $this->session->flashdata('notif');
					 if($message){
							 echo '<p class="alert alert-danger text-center">'.$message .'</p>';
					 }?>

					 <!-- <div>
						<span><label>Masukkan Captcha</label></span>
						<span class="captcha"><?php echo $captcha_img;?></span>
					    <span><input type="text" name="captcha" class="textbox" autocomplete="off"></span>
							<?php
				       $wrong = $this->input->get('cap_error');
				       if($wrong){
				      ?>
				       <span style="color:red;">
								 <p class="alert alert-danger text-center" role="alert">Captcha Salah</p>
								 </span>

				      <?php
				       }
				      ?>
					 </div> -->

					<div class="sign">
						<div class="submit">
						  <input type="submit" name="submit" value="LOGIN" onclick="Login()">
						</div>
						<!-- <span class="forget-pass">
							<a href="#">Forgot Password?</a>
						</span> -->
							<div class="clear"> </div>
					</div>
					</form>
				</div>
			</div>

		</div>

   					<div class="copy-right">
						<p>&copy; Al-Mumtaz</p>
					</div>


</body>
</html>
