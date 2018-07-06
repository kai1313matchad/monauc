<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../../../favicon.ico"> -->
    <title>Cover Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->    
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/cover.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/signin.css')?>" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <!-- <h3 class="masthead-brand">Cover</h3> -->
          <img class="img-responsive masthead-brand logo" src="<?php echo base_url()?>assets/img/test/testlogo.png">
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="<?php echo base_url('Cover')?>">Home</a>
            <a class="nav-link" href="<?php echo base_url('auction/Auction')?>">Auction</a>
            <a class="nav-link active" href="<?php echo base_url('user/User')?>"><?php if($this->session->userdata('user_id')!=''){echo $this->session->userdata('user_name');} else {echo 'Sign In';} ;?></a>
            <a class="nav-link" href="<?php echo base_url('contact/Contact')?>">Contact</a>
          </nav>
        </div>
      </header>
      <input type="hidden" name="userid" value="<?= $this->session->userdata('user_id')?>">
      <main role="main" class="inner cover" id="signin">
        <form class="form-signin" id="form-signin">
          <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
          <div class="row">                            
            <?php
              if(isset($_SESSION['alert']))
              {
                echo $_SESSION['alert'];
              }
            ?>
          </div>
          <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
          <label for="inputUsername" class="sr-only">Username</label>
          <input type="text" id="inputUsername" class="form-control" name="username" placeholder="Username" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="button" onclick="loginsys()">Sign in</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
      </main>
      <main role="main" class="inner cover" id="signedin">
        <div class="jumbotron jumbo">
          <div class="container">
            <h1 class="display-3">Hello <?= $this->session->userdata('user_name');?></h1>
            <a href="<?php echo base_url('user/User/logout_')?>" class="btn btn-lg btn-danger btn-block">Sign Out</a>
          </div>
        </div>
      </main>
      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        </div>
      </footer>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery-2.2.3.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script>
      $(document).ready(function() 
      {
        if($('[name="userid"]').val()!='')
        {
          $('#signedin').css({'display':'block'});
          $('#signin').css({'display':'none'});
        }
        else
        {
          $('#signedin').css({'display':'none'});
          $('#signin').css({'display':'block'});
        }
      });
      function loginsys()
      {
          $.ajax({
            url : "<?php echo site_url('user/User/loginauth_')?>",
            type: "POST",
            data: $('#form-signin').serialize(),
            dataType: "JSON",
            success: function(data)
            {
              if(data.status)
              {
                location.reload(false);
              }
              else
              {
                location.reload(false);
              }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error adding / update data');
            }
          });
      }
    </script>
  </body>
</html>
