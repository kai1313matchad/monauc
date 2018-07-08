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
    <link href="<?php echo base_url('assets/css/pricing.css')?>" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <!-- <h3 class="masthead-brand">MATCH ADVERTISING</h3> -->
          <img class="img-responsive masthead-brand logo" src="<?php echo base_url()?>assets/img/test/testlogo.png">
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="<?php echo base_url('Cover')?>">Home</a>
            <a class="nav-link active" href="<?php echo base_url('auction/Auction')?>">Auction</a>
            <a class="nav-link" href="<?php echo base_url('user/User')?>"><?php if($this->session->userdata('user_id')!=''){echo $this->session->userdata('user_name');} else {echo 'Sign In';} ;?></a>
            <a class="nav-link" href="<?php echo base_url('contact/Contact')?>">Contact</a>
          </nav>
        </div>
      </header>
      <main role="main" class="inner cover">
        <h1 class="cover-heading">Auction Main Page</h1>
      </main>
      <div class="container">
        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 box-shadow">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal header-color" name="auc_title">MATCHAD AUCTION - BB/0618/PROBOLINGGO</h4>
            </div>
            <div class="card-body">
              <div>
                <img class="img-responsive img-thumbnail" src="<?php echo base_url()?>assets/img/test/testprod.jpeg">
                <img name="bidsold" class="img-responsive img-thumbnail" src="<?php echo base_url()?>assets/img/test/sold.png">
              </div>
              <h1 name="bidprice" class="card-title pricing-card-title header-color">Rp150.000.000 <small class="text-muted">/ year</small></h1>
              <!-- <ul class="list-unstyled mt-3 mb-4">
                <li>JL Soekarno Hatta</li>
                <li>Horizontal</li>
                <li>Priority email support</li>
                <li>Help center access</li>
              </ul> -->
              <form id="form_bid">
                <input type="hidden" name="auc_id" value="">
                <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id');?>">
              </form>
              <button onclick="bidbtn()" name="bidbtn" type="button" class="btn btn-lg btn-block btn-primary">Bid</button>
              <button onclick="bidsoldbtn()" name="bidsoldbtn" type="button" class="btn btn-lg btn-block btn-danger">Buyout</button>
            </div>
          </div>
        </div>
      </div>
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
    <script src="<?php echo base_url('assets/js/holder.min.js')?>"></script>
    <script>
      $(document).ready(function()
      {
        $('[name="bidsold"]').css({'display':'none'});
        aucdata();
      })
      function bidbtn()
      {
        // $('[name="bidbtn"]').prop('disabled',true);
        // $('[name="bidprice"]').text('');
        // $('[name="bidprice"]').append('Rp160.000.000 <small class="text-muted">/ year</small>');
        $.ajax({
          url : "<?php echo site_url('auction/Auction/aucbid')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            alert(data.msg);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error adding / update data');
          }
        });
      }
      function bidsoldbtn()
      {
        $('[name="bidsold"]').css({'display':'block'});
        $('[name="bidsold"]').addClass('sold');
        $('[name="bidbtn"]').prop('disabled',true);
        $('[name="bidsoldbtn"]').prop('disabled',true);
        $('[name="bidprice"]').text('');
        $('[name="bidprice"]').append('Rp300.000.000 <small class="text-muted">/ year</small>');
      }
      function aucdata()
      {
        $.ajax({
          url : "<?php echo site_url('auction/Auction/aucdata')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            $('[name="auc_title"]').text('MATCHAD AUCTION - '+data.PROD_ID);
            $('[name="auc_id"]').val(data.AUCG_ID);
            var out = parseFloat((data.LAST_BID).replace(/,/g, "")).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('[name="bidprice"]').text('');
            $('[name="bidprice"]').append('Rp'+out+' <small class="text-muted">/ year</small>');
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
