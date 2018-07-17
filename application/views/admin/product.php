				<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Product</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Products</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div id="alert-del"></div>
                    <table id="dtb-prodall" class="table table-striped table-bordered" width="100%">
                    	<thead>
                      	<tr>
                      		<th class="col-sm-1">No</th>
                          <th class="col-sm-2">Kode Produk</th>
                      		<th class="col-sm-3">Nama</th>
                      		<th class="col-sm-2">Price</th>
                      		<th class="col-sm-3">Picture</th>
                      		<th class="col-sm-1">Edit</th>
                      		<th class="col-sm-1">Hapus</th>
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
                    <form id="form-product" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    	<input type="hidden" name="form_status" value="1">
                    	<div class="col-xs-12" id="alert-div">
                    	</div>
                    	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product ID
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="productid" required="required" class="form-control col-md-7 col-xs-12" placeholder="Product ID">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="productname" required="required" class="form-control col-md-7 col-xs-12" placeholder="Product Name">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Price <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12 curr-num" type="text" name="productprice" required="required" placeholder="Price">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Picture <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="file" id="productpic" name="productpic" required="required">
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
    	});
    	function tables()
    	{
    		table = $('#dtb-prodall').DataTable({
    		"info": false,
				"responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
        	"url": "<?php echo site_url('admin/product/Product_/get_productall')?>",
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
        var fd = new FormData();
        var file_data = $('#productpic').prop('files')[0];
        fd.append("file", file_data);
        var other_data = $('#form-product').serializeArray();
        $.each(other_data,function(key,input){fd.append(input.name,input.value);});
      	url = "<?php echo site_url('admin/product/Product_/save_product')?>";
      	$.ajax({
					url : url,
          type: "POST",
          cache: false,
          contentType: false,
          processData: false,
          data: fd,
          dataType: "JSON",
          success: function(data)
          {
          	if(data.status)
            {
            	$('#alert-div').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Adding / Update Product</div>');
              reload_table();
              resetbtn();
            }
            else
            {
            	$('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Error Adding / Update Product</div>');
              if(data.error_str_sts)
              {
                $('#alert-div').append('<div class="alert alert-danger alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>'+data.error_str+'</div>');
              }
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
      	$('#form-product')[0].reset();
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
      }
      function edit_prod(id)
      {
        $('#form-product')[0].reset();
      	$('[name="form_status"]').val('2');
      	$('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
        	url : "<?php echo site_url('admin/product/Product_/get_prodrow/')?>"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
          	$('[name="productid"]').val(data.PROD_ID);
          	$('[name="productname"]').val(data.PROD_NAME);
          	$('[name="productprice"]').val(data.PROD_PRICE);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
          	alert('Error Get Product Data');
          }
        });
      }
      function delete_prod(id)
      {
      	if(confirm('Are you sure delete this data?'))
      	{
      		$.ajax({
	        	url : "<?php echo site_url('admin/product/Product_/del_product/')?>"+id,
	          type: "GET",
	          dataType: "JSON",
	          success: function(data)
	          {
	          	if(data.status)
	          	{
	          		$('#alert-del').append('<div class="alert alert-success alert dismissible fade in" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Success Delete Product Data</div>');
              	reload_table();
	          	}
	          },
	          error: function (jqXHR, textStatus, errorThrown)
	          {
	          	alert('Error Delete Product Data');
	          }
	        });
      	}
      }
    </script>
  </body>
</html>