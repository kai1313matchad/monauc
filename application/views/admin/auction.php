				<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Auction</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Auctions</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div id="alert-del"></div>
                    <table id="dtb-auctionall" class="table table-striped table-bordered" width="100%">
                    	<thead>
                      	<tr>
                      		<th>No</th>
                      		<th>Kode</th>
                      		<th>Produk</th>
                      		<th>Tanggal</th>
                          <th>Open Price - Buyout</th>
                      		<th>Status</th>
                      		<th>Edit</th>
                      	</tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add/Edit Auction</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form-auctions" class="form-horizontal form-label-left">
                    	<input type="hidden" name="form_status" value="1">
                    	<div class="col-xs-12" id="alert-div">
                    	</div>
                    	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Auction ID
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="auctionid" readonly="readonly" class="form-control col-md-7 col-xs-12">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Produk Lelang <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="auctionprod" name="auctionprod" class="form-control text-center" data-live-search="true" data-dropup-auto="false" required>
                          </select>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Peserta <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="auctionmember" name="auctionmember[]" class="form-control text-center" multiple required>
                          </select>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class='input-group date dtp'>
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <input id="auctiondate" type='text' class="form-control input-group-addon" name="auctiondate" value="<?= date('Y-m-d')?>" />
                          </div>
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Open Price <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12 curr-num" type="text" name="auctionop" required="required" placeholder="Open Price">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Buy Out <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12 curr-num" type="text" name="auctionbo" required="required" placeholder="Buy Out">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bid <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12 curr-num" type="text" name="auctionbid" required="required" placeholder="Bid">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  						<button class="btn btn-primary" type="reset" onclick="resetbtn()">Reset</button>
                          <button type="button" class="btn btn-success" onclick="save()">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php include 'application/views/admin/layout/footer.php'; ?>
      </div>
    </div>
    <?php include 'application/views/admin/layout/jspack.php'; ?>
    <script>
    	$(document).ready(function(){
    		tables();
    		gen_();
        drop_();
        dropms_();
    	});
    	function tables()
    	{
    		table = $('#dtb-auctionall').DataTable({
    		"info": false,
				"responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
        	"url": "<?php echo site_url('admin/auction/Auction_/get_auctionall')?>",
          "type": "POST",
          },
      	"columnDefs": [{"className": "text-center", "targets": ['_all']}],
    		});
    	}
    	function reload_table()
      {
      	table.ajax.reload(null,false);
      }
      function save()
      {
      	url = "<?php echo site_url('admin/auction/Auction_/save_auction')?>";
      	$.ajax({
					url : url,
          type: "POST",
          data: $('#form-auctions').serialize(),
          dataType: "JSON",
          success: function(data)
          {
          	if(data.status)
            {
            	$('#alert-div').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Adding / Update Auction User</div>');
              reload_table();
              resetbtn();
            }
            else
            {
            	$('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Error Adding / Update Auction Data</div>');
            	for (var i = 0; i < data.inputerror.length; i++) 
              {
              	$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
              }
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Adding / Update User Data');
          }
        });
      }
      function resetbtn()
      {
      	$('[name="form_status"]').val('1');
      	$('#form-auctions')[0].reset();
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
        gen_();
        drop_();
      }
      function edit_auc(id)
      {
      	$('[name="form_status"]').val('2');
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
        	url : "<?php echo site_url('admin/auction/Auction_/get_auctionrow/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
          	$('[name="auctionid"]').val(data.AUCG_ID);
          	$('[name="auctionop"]').val(data.AUCG_OPENPRICE);
          	$('[name="auctionbo"]').val(data.AUCG_BUYOUT);
            $('[name="auctionbid"]').val(data.AUCG_BID);
            $('select#auctionprod').val(data.PROD_ID);
            $('#auctionprod').selectpicker('refresh');
            pickmember_(data.AUCG_ID);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Get User Data');
          }
        });
      }
      function chgsts_auc(id)
      {
      	if(confirm('anda yakin untuk mengganti status lelang?'))
      	{
      		$.ajax({
	        	url : "<?php echo site_url('admin/auction/Auction_/chgsts_auction/')?>"+id,
	          type: "GET",
	          dataType: "JSON",
	          success: function(data)
	          {
	          	if(data.status)
	          	{
	          		$('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Sukses Update Data Lelang</div>');
              	reload_table();
	          	}
              else
              {
                $('#alert-del').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Masih Ada Lelang Aktif</div>');
                reload_table();
              }
	          },
	          error: function (jqXHR, textStatus, errorThrown)
	          {
	          	alert('Error Delete User Data');
	          }
	        });
      	}
      }
      function pickmember_(id)
      {
        $.ajax({
          url : "<?php echo site_url('admin/auction/Auction_/get_auctionmember/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            $('#auctionmember option:selected').prop('selected', false);
            for (var i = 0; i < data.length; i++)
            {
              $('#auctionmember option[value="' + data[i]["USER_ID"] + '"]').prop('selected',true);
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from ajax');
          }
        });
      }
      function gen_()
      {
      	$.ajax({
        	url : "<?php echo site_url('admin/auction/Auction_/gen_auction')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {                    
          	$('[name="auctionid"]').val(data.kode);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Generate Number');
          }
        });
      }
      function drop_()
      {
        $.ajax({
          url : "<?php echo site_url('admin/auction/Auction_/get_proddrop')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById('auctionprod');
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i]["PROD_ID"]
              option.text = data[i]["PROD_ID"]+' - '+data[i]["PROD_NAME"];
              select.add(option);
            }
            $('#auctionprod').selectpicker({});
            $('#auctionprod').selectpicker('refresh');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get product data');
          }
        });
      }
      function dropms_()
      {
        $.ajax({
          url : "<?php echo site_url('admin/auction/Auction_/get_userdrop')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {   
            var select = document.getElementById('auctionmember');
            var option;
            for (var i = 0; i < data.length; i++)
            {
              option = document.createElement('option');
              option.value = data[i]["USER_ID"]
              option.text = data[i]["USER_NAME"];
              select.add(option);
            }
            multi_();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get member data');
          }
        });
      }
      function multi_()
      {
        $('#auctionmember option').mousedown(function(e) 
        {
          e.preventDefault();
          var originalScrollTop = $(this).parent().scrollTop();
          console.log(originalScrollTop);
          $(this).prop('selected', $(this).prop('selected') ? false : true);
          var self = this;
          $(this).parent().focus();
          setTimeout(function() 
          {
            $(self).parent().scrollTop(originalScrollTop);
          }, 0);
          return false;
        });
      }
    </script>
  </body>
</html>