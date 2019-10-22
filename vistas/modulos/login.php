 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

  <script>
    $(document).on('ready', function() {
      $('#show-hide-passwd').on('click', function(e) {
        e.preventDefault();
        var current = $(this).attr('action');
        if (current == 'hide') {
          $(this).prev().attr('type','text');
          $(this).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').attr('action','show');
        }
        if (current == 'show') {
          $(this).prev().attr('type','password');
          $(this).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').attr('action','hide');
        }
      })
    })
  </script>

  <style>
    span {
      cursor: pointer;
    }
  </style>


<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img src="vistas/img/plantilla/MC.png" class="img-responsive" style="padding:30px 100px 0px 100px">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>



      <div class="input-group">
        <input class="form-control" type="password" name="ingPassword"  placeholder="Contraseña">
        <span id="show-hide-passwd" action="hide" class="input-group-addon glyphicon glyphicon glyphicon-eye-open"></span>
      </div><br>


      
    

      <div class="row">
       
        <div class="col-xs-12"><center>

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        
        </div></center>

      </div><br>

      <div><center>
        <h4><i class="fa fa-car"></i> Mercantil S.A. de C.V.</h4>
          <p>©2019 All Rights Reserved & Privacy and Terms</p>
      </div></center>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>    

  </div>

</div>   <!-- "login/css/style.css" -->
 
 