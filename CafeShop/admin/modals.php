<script type="text/javascript" src="js/modals.js?v=<?php echo mt_rand(); ?>"></script>
<div id="modal1" class="modal fade" role="dialog" >
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="opacity: 1 !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quản lý nhóm menu thực đơn</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12">
        
        
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Tên nhóm hàng hóa</label>
              <ul class="list-unstyled" id="modal_list_type">
              <?php 
                $types = $config->selectData('select * from type_drink');
                foreach ($types as $type) {
                  $typex = '"'.$type['type_name'].'"';
                  
                  echo "<li class='col-md-12 col-lg-12 col-sm-6 col-xs-4'><input type='submit' class='btn btn-default btn-block' onclick='showName(".$typex.",".$type['type_id'].")' value='".$type['type_name']."'/></li>";
                }
               ?>
              </ul>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="result input-sm" name="typemenu_label" value="">
            <input type="hidden" class="result2" name="typemenu_id" value="">
            <div class="btn-group">
              <button class="btn btn-info" name="type_add" onclick="typeSubmit('add');">Thêm mới</button>
              <button class="btn btn-info" name="type_change" onclick="typeSubmit('change');">Thay đổi</button>
              <button class="btn btn-info" name="type_retype" onclick="typeSubmit('retype');">Nhập lại</button>
            </div>
            <button class="btn btn-danger" name="type_delete" onclick="typeSubmit('delete');">Xóa bỏ</button>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modal2" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="opacity: 1 !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quản lý menu thực đơn</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 modal2-left">
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Thuộc nhóm:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <select class="form-control" name="modal2-product-type" id="modal2-product-type">
                  <option value="all">Tất cả</option>
                  <?php
                    foreach ($types as $type) {
                    echo "<option value='".$type['type_name']."'>".$type['type_name']."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Tên hàng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" name="modal2-product-name" class="input-sm" id="modal2-product-name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Ảnh:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="file" name="modal2-product-image" accept="image/*" id="modal2-product-image">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Mã hàng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal2-product-id" id="modal2-product-id">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Đơn vị tính:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal2-product-unit" id="modal2-product-unit">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Giá bán:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal2-product-sell" id="modal2-product-sell">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Giá mua:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal2-product-buy" id="modal2-product-buy">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Số lượng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal2-product-quantity" id="modal2-product-quantity">
              </div>
            </div>
            
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label style="display: inline;">Tên hàng hóa <span class="badge">S.L</span></label>
                <div class="list-group" id="modal2-list-type">
                <!-- <?php 
                  $drinks = $config->selectData('select * from drink');
                  foreach ($drinks as $drink) {
                    $drinkx = '"'.$drink['drink_name'].'"';
                    
                    echo "<a onclick='parseName(".$drinkx.",".$drink['type_id'].")' class='col-md-12 col-lg-12 col-sm-6 col-xs-4 list-group-item'>".$drink['drink_name']."<span class='badge badge-secondary'>".$drink['quantity']."</span></a>";
                  }
                 ?> -->
                </div>  
            </div>
            
          </div>
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: auto">
          <div class="btn-group">
            <button class="btn btn-primary" name="type_add" onclick="modal2Submit('add');">Thêm mới</button>
            <button class="btn btn-info" name="type_change" onclick="modal2Submit('change');">Thay đổi</button>
            <button class="btn btn-info" name="type_retype" onclick="modal2Submit('retype');">Nhập lại</button>
            <button class="btn btn-danger" name="type_delete" onclick="modal2Submit('delete');">Xóa bỏ</button>
          </div>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>

  </div>
</div>

<div id="modal4" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="opacity: 1 !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm nguyên liệu</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 modal2-left">
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Thuộc nhóm:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <select class="form-control" name="modal4-product-type" id="modal4-product-type">
                  <option value="all">Tất cả</option>
                  <?php
                    foreach ($types as $type) {
                    echo "<option value='".$type['type_name']."'>".$type['type_name']."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Tên hàng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" name="modal4-product-name" class="input-sm" id="modal4-product-name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Ảnh:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="file" name="modal4-product-image" accept="image/*" id="modal4-product-image">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Mã hàng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal4-product-id" id="modal4-product-id">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Đơn vị tính:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal4-product-unit" id="modal4-product-unit">
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Giá mua:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal4-product-buy" id="modal4-product-buy">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Số lượng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal4-product-quantity" id="modal4-product-quantity">
              </div>
            </div>
            
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label style="display: inline;">Tên hàng hóa <span class="badge">S.L</span></label>
                <div class="list-group" id="modal4-list-type">
                <!-- <?php 
                  $drinks = $config->selectData('select * from drink');
                  foreach ($drinks as $drink) {
                    $drinkx = '"'.$drink['drink_name'].'"';
                    
                    echo "<a onclick='parseName(".$drinkx.",".$drink['type_id'].")' class='col-md-12 col-lg-12 col-sm-6 col-xs-4 list-group-item'>".$drink['drink_name']."<span class='badge badge-secondary'>".$drink['quantity']."</span></a>";
                  }
                 ?> -->
                </div>  
            </div>
            
          </div>
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: auto">
          <div class="btn-group">
            <button class="btn btn-primary" name="type_add4" onclick="modal4Submit('add');">Thêm mới</button>
            <button class="btn btn-info" name="type_change4" onclick="modal4Submit('change');">Thay đổi</button>
            <button class="btn btn-info" name="type_retype4" onclick="modal4Submit('retype');">Nhập lại</button>
            <button class="btn btn-danger" name="type_delete4" onclick="modal4Submit('delete');">Hủy nguyên liệu</button>
          </div>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>

  </div>
</div>

<div id="modal5" class="modal fade" role="dialog" >
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nhập kho nguyên liệu</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12" id="modal5-body">
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <span class="text-primary">Đơn vị bán</span>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <input type="text" class="input-sm" name="modal5-seller" id="modal5-seller" value="">
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <span class="text-primary">Địa chỉ</span>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <input type="text" class="input-sm" name="modal5-seller-address" id="modal5-seller-address" value="">
            </div>
          </div>
          
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <span class="text-primary">Số điện thoại</span>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <input type="text" class="input-sm" name="modal5-seller-number" id="modal5-seller-number" value="">
            </div>
          </div>
          
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
            <table class="table-striped table-bordered" id="modal5-table" width="100%">
              <tr>
                <th>ST</th>
                <th>Tên hàng hóa</th>
                <th>Unit</th>
                <th>Giá mua</th>
                <th>SL</th>
                <th>T.Tiền</th>
              </tr>
              
            </table>
            <div class="row" style="margin-top: 10px;">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label id="modal5-name-table">None</label>
              </div>

                <input type="number" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-sm" name="modal5-set-quantity" id="modal5-set-quantity" value="1">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label class="col-lg-6 col-md-6 col-xs-6 col-sm-6">Tổng tiền: </label>
                <label id="modal5-sum-price" class="col-lg-6 col-md-6 col-xs-6 col-sm-6">0d</label>
              </div>
              <div class="btn-group btn-group-justified" style="padding:10px 20px 0px 20px;">
                
                  <a href="#" class="btn btn-default" id="modal5-set-btn">Đặt số lượng</a>
                  <a href="#" class="btn btn-default btn-success" onclick="btnImport();" id="modal5-import-btn">Nhập kho</a>
                  <a href="#" class="btn btn-default btn-warning" id="modal5-cancel-btn">Hủy bỏ</a>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 modal5-left">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <span class="text-left text-primary">Nhóm</span>
              </div>
              <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
                <select class="form-control" name="modal5-product-type" id="modal5-product-type">
                  <option value="all">Tất cả</option>
                  <?php
                    foreach ($types as $type) {
                    echo "<option value='".$type['type_name']."'>".$type['type_name']."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="row" style="padding: 5px 0px 0px 10px;">
              <input type="text" class="input-sm col-lg-9 col-md-9 col-sm-9 col-xs-9" name="modal5-search" id="modal5-search" value="">
              <input type="submit" class="btn btn-default col-lg-3 col-md-3 col-sm-3 col-xs-3" name="modal5-search-btn" id="modal5-search-btn" value="Tìm">
            </div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <span class="text-primary">Tên hàng hóa</span>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <span class="text-primary">S.Lượng</span>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="modal5-list-type">
                
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modal6" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Danh sách nhập kho nguyên liệu</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12" id="modal6-body">

          <table class="table-bordered text-center" id="modal6-table" width="100%">
            <tr>
              <th>Mã nhập kho</th>
              <th>Nhà cung cấp</th>
              <th>Mặt hàng</th>
              <th>Thời gian nhập</th>
            </tr>
            <?php 
              $result = $config->selectData('select * from nhapkho_detail');
              foreach ($result as $row) {
                echo "<tr onclick='parseName6(".$row['nk_id'].")'><td>".$row['nk_id']."</td><td>".$row['nk_provider']."</td><td>".$row['src_name']."</td><td>".$row['nk_date']."</td></tr>";
              }
              
             ?>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="modal61" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chi tiết danh sách nhập kho nguyên liệu</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12" id="modal6-body">
          
          <table class="table-bordered text-center" id="modal61-table" width="100%">
            <tr>
              <th>Mã nhập kho</th>
              <th>Nhà cung cấp</th>
              <th>Đìa chỉ NCC</th>
              <th>Số điện thoại</th>
              <th>Thời gian nhập</th>
            </tr>
            
          </table>
          <br>
          <label class="text-success">Chi tiết hàng được nhập:</label>
          <table id="modal61-tddetail" class="table-bordered text-center">
            <tr>
              <th>Tên hàng (1)</th>
              <th>Giá thành (2)</th>
              <th>Số lượng (3)</th>
              <th>Tổng tiền (2x3)</th>
            </tr>
            
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
              

  </div>
</div>

<div id="modal78" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chi tiết danh sách nhập kho nguyên liệu</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12" id="modal78-body">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <span class="text-warning" style="white-space: nowrap;">Tên khách hàng: </span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <input type="text" name="modal78_name_kh" id="modal78_name_kh" value="">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <span class="text-warning" style="white-space: nowrap;">Địa chỉ: </span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <input type="text" name="modal78_address" id="modal78_address" value="">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <span class="text-warning" style="white-space: nowrap;">Số điện thoại: </span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <input type="text" name="modal78_number" id="modal78_number" value="">
            </div>
          </div>
          <div class="clearfix visible-lg visible-sm visible-md hidden-xs"></div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
              <p class="text-warning" style="white-space: nowrap;">Ghi chú: </p>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <textarea id="modal78_textarea" style="min-height: 70px;">
                
              </textarea>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
              <span class="text-warning" style="white-space: nowrap;">Loại phiếu: </span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <p id="thuchi_type"></p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
              <span class="text-warning" style="white-space: nowrap;">Thành tiền: </span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <input type="text" name="modal78_price" id="modal78_price" value="">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="modal78_submit">Xác Nhận</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
              

  </div>
</div>

<div id="modal-info" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thông tin quán café của bạn</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12" id="modal78-body">
          <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-right">         
              <span class="text-primary">Tên: </span>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
              <input class="input-lg" type="text" name="info_name" id="info_name" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-right">
              <span class="text-primary">Mã số thuế: </span>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
              <input class="input-sm" type="text" name="info_vat" id="info_vat" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-right">         
              <span class="text-primary">Số tài khoản: </span>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
              <input class="input-sm" type="text" name="info_bankid" id="info_bankid" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-right">         
              <span class="text-primary">Ngân hàng: </span>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
              <input class="input-sm" type="text" name="info_bank" id="info_bank" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-right">         
              <span class="text-primary">Địa chỉ: </span>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
              <input class="input-sm" type="text" name="info_address" id="info_address" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-right">         
              <span class="text-primary">Hotline: </span>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
              <input class="input-sm" type="text" name="info_hotline" id="info_hotine" value="">
            </div>
          </div>
          <div class="row text-center">
            <div class="btn-group">
              <a href="#" class="btn btn-success btn-group-sm" id="btn-info-create">Tạo chuỗi</a>
              <a href="#" class="btn btn-primary btn-group-sm" id="btn-info-update">Cập nhật</a>
            </div>  
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
              

  </div>
</div>