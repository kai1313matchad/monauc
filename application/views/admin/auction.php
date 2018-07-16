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
                      		<th>Edit</th>
                      		<th>Hapus</th>
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
                    <h2>Add/Edit User</h2>
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
                          <input class="form-control col-md-7 col-xs-12" type="text" name="auctionop" required="required" placeholder="Open Price">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Buy Out <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="auctionbo" required="required" placeholder="Buy Out">
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
      	url = "<?php echo site_url('admin/user/User_/save_user')?>";
      	$.ajax({
					url : url,
          type: "POST",
          data: $('#form-users').serialize(),
          dataType: "JSON",
          success: function(data)
          {
          	if(data.status)
            {
            	$('#alert-div').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Adding / Update Data User</div>');
              reload_table();
              resetbtn();
            }
            else
            {
            	$('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Error Adding / Update User Data</div>');
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
      function edit_user(id)
      {
      	$('[name="form_status"]').val('2');
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
        	url : "<?php echo site_url('admin/user/User_/get_userrow/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
          	$('[name="userid"]').val(data.USER_ID);
          	$('[name="username"]').val(data.USER_NAME);
          	$('[name="comp_name"]').val(data.USER_COMPANY);
          	$('[name="comp_address"]').val(data.USER_ADDRESS);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Get User Data');
          }
        });
      }
      function delete_user(id)
      {
      	if(confirm('Are you sure delete this data?'))
      	{
      		$.ajax({
	        	url : "<?php echo site_url('admin/user/User_/del_user/')?>"+id,
	          type: "GET",
	          dataType: "JSON",
	          success: function(data)
	          {
	          	if(data.status)
	          	{
	          		$('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Delete User Data</div>');
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
            alert('Error get data from ajax');
          }
        });
      }
    </script>
  </body>
</html>