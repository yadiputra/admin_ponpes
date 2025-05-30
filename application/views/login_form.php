<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Pondok Pesantren Darussalamah</title>
    <link href="<?php echo base_url(); ?>assets/foto/logo.png" rel="icon">
 
    <link href="<?php echo base_url(); ?>assets/foto/logo.png" rel="icon">
 
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	 <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/admin/css/adminlte.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
   
</head>
<body class="login-page" style="min-height: 466px;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
  <div class="card-header text-center">
      <a href="" class="h1"><b>Admin</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">From Login Admin</p>

      <form action="<?php echo base_url('login/process_login'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
		    <div class="input-group-append">
            <div class="input-group-text">
              <i id="togglePassword" class="fas fa-eye"></i>
            </div>
          </div>
		         
       
        </div>
        <div class="row">
          <!-- /.col -->
		  <div class="col-8">
            <div class="icheck-primary">
			<p class="mb-1">
				<a href="">Lupa Password</a>
			  </p>
			  <p class="mb-0">
				<a href="" class="text-center">Daftar</a>
			  </p>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
	  
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

</body>
<script>

const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>

</html>
