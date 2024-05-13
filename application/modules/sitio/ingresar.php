<?php 

// Generamos un random para evitar el cacheado del script
$version = rand(0, 1000000);

//Obtien las cadena csrf
$csrf = set_csrf();

//obtiene un mensaje
//$message = get_notification();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Torre de Agua | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="assets/imgs/logo.jpg" class="brand-image" alt="">
  </div>
  <!-- /.login-logo -->
 
  <div class="card">
          <?php if ($message = get_notification()) : ?>
            
              <div class="alert alert-<?= $message['type']; ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?= $message['title']; ?></strong>
                  <p><?= $message['content']; ?></p>
              </div>
            <?php endif ?>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar Sesión</p>

      <form action="?/<?= site; ?>/autenticar" method="post">
      <input type=hidden name="<?= $csrf;?>">
        <div class="input-group mb-3">
          <input type="hidden" name="locale" value="">
          <input type="text" class="form-control" placeholder="Usuario" name="username" id="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append" ><span class="input-group-text"><i class="fa fa-eye" id="mostrar"></i></span></div>
          <!--div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div-->
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
              Recordar
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div-->
      <!-- /.social-auth-links -->

      <!--p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p-->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>

<script>
    $(document).ready( function(){
       $('#mostrar').click(function(){
          if($(this).hasClass('fa-eye'))
          {
          $('#password').removeAttr('type');
          $('#mostrar').addClass('fa-eye-slash').removeClass('fa-eye');
          }
          else
          {
          //Establecemos el atributo y valor
          $('#password').attr('type','password');
          $('#mostrar').addClass('fa-eye').removeClass('fa-eye-slash');
          }
       });
    });
</script>

</body>
</html>
