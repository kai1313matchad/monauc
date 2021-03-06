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
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <!-- <h3 class="masthead-brand">Cover</h3> -->
          <img class="img-responsive masthead-brand logo" src="<?php echo base_url()?>assets/img/test/testlogo.png">
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="<?php echo base_url('Cover')?>">Home</a>
            <a class="nav-link" href="<?php echo base_url('auction/Auction')?>">Auction</a>
            <a class="nav-link" href="<?php echo base_url('user/User')?>"><?php if($this->session->userdata('user_id')!=''){echo $this->session->userdata('user_name');} else {echo 'Sign In';} ;?></a>
            <a class="nav-link" href="<?php echo base_url('contact/Contact')?>">Contact</a>
          </nav>
        </div>
      </header>
      <main role="main" class="inner cover">
        <h1 class="cover-heading" id="cd"></h1>
        <img class="img-responsive img-thumbnail" src="<?php echo base_url()?>assets/img/test/testbanner.jpg">
        <p class="lead">Pertama kali di Indonesia. Lelang Billboard Online.</p>
        <p class="lead">
          <div class="row">
            <div class="col-md-4">
              <a href="https://www.matchadonline.com/Probolinggo-Jl-Soekarno-Hatta-to-Surabaya?search=probolinggo" target="blank__" class="btn btn-block btn-primary">Lihat Lokasi</a>
            </div>
            <div class="col-md-4">
              <a href="https://www.matchadonline.com/Promo" target="blank__" class="btn btn-block btn-secondary">Syarat dan Ketentuan</a>
            </div>
            <div class="col-md-4">
              <a href="<?php echo base_url('auction/Auction')?>" class="btn btn-block btn-danger">Mulai Lelang</a>
            </div>
          </div>          
        </p>
      </main>
      <footer class="mastfoot mt-auto">
        <div class="inner">
          <!-- <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p> -->
        </div>
      </footer>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery-slim.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script>
      // Set the date we're counting down to
      var countDownDate = new Date("August 22, 2018 00:00:01").getTime();
      // Update the count down every 1 second
      var x = setInterval(function()
      {
          // Get todays date and time
          var now = new Date().getTime();          
          // Find the distance between now an the count down date
          var distance = countDownDate - now;        
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);        
          // Output the result in an element with id="demo"
          document.getElementById("cd").innerHTML = days + "d " + hours + "h "
          + minutes + "m " + seconds + "s ";          
          // If the count down is over, write some text 
          if (distance < 0)
          {
              clearInterval(x);
              document.getElementById("cd").innerHTML = "EXPIRED";
          }
      }, 1000);
    </script>
  </body>
</html>
