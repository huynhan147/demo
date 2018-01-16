    <style type="text/css">
    .table > tbody > tr > td {
      vertical-align: middle;
    }
    .myinput{width: 320px;}
    </style>
    <?php 
      $m = $_GET['state'] ?? '';

     ?>
    <div class="container">
      <div class="row">
        <?php if ($m=='success'): ?>
            <h3 class="text-center">Bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất !!</h3>
            <?php elseif ($m=='err'): ?>
            <h3 class="text-center">Có lỗi xảy ra vui lòng thực hiện lại</h3>
            <?php elseif (!isset($_SESSION['cart']) OR empty($_SESSION['cart']))  : ?>
            <h3 class="text-center">Vui lòng chọn mua sản phẩm để thanh toán !</h3>
          <?php endif; ?>
      </div>
      <div class="heading-bar">
          <a class="more-btn">Tiến hành kiểm tra</a>
      </div>

      <div class="table_gio_hang">
          <form method="POST" action="?c=cart&m=update" id="form_gio_hang">
              <table class="table table-hover table-striped" style="margin: 0px;padding: 0px;">
                  <tr>
                      <th>&nbsp;#</th>
                      <th>Tên sách</th>
                      <th>Ảnh</th>
                      <th class="center1">Giá</th>
                      <th class="center1">Số lượng</th>
                      <th class="center1" >Thành tiền</th>
                      <th>Xóa</th>
                  </tr>
                  <?php $index =1; $totalMoney =0 ?>
                  <?php foreach($data['cart'] as $key=>$cart): ?>
                  <tr>
                      <td><?php echo $index;?></td>
                      <td><?php echo $cart['name_book']; ?></td>
                      <td>
                        <img width="100" height="100" src="<?php echo IMG_PATH_UPLOAD.$cart['images'] ?>" alt="image book">
                      </td>
                      <td class="center1"><?php echo number_format($cart['price']); ?>vnd</td>

                      <td class="center1" >
                        <input class="soluong1" required pattern="[0-9]{1,3}" title="Số lượng phải là chữ số và nhỏ hơn 4 kí tự" name="txtQty[<?php echo $cart['id'] ?>]" size="2" type="text" value="<?php echo $cart['qty'] ?>"/>
                      </td>
                      <td  class="center1 img_gio_hang">
                            <?php echo number_format($cart['qty']*$cart['price']); ?> vnd
                      </td>
                      <td >
                        <a href="?c=cart&m=remove&id=<?php echo $cart['id']; ?>"> <i class="icon-trash"></i></a>
                      </td>
                  </tr>
                  <?php $index++;$totalMoney += ($cart['qty']*$cart['price']); ?>
                <?php endforeach; ?>
                  <tr>
                    <td colspan="5">Tổng tiền: </td>
                    <td class="center1"> <span><?php echo number_format($totalMoney);?> vnd</span></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="7" style="text-align: right">
                      <button type="submit" style="" class="btn btn-info" name="btnsubmit">Cập nhật giỏ hàng</button>
                      <a href="?c=cart&m=delete" class="btn btn-warning">Xóa tất cả</a>
                    </td>
                  </tr>
              </table>
          </form>
      </div>
      <?php if (isset($_SESSION['cart'])&&!empty($_SESSION['cart'])) : ?>
      <div class="heading-bar">
          <a class="more-btn">Tiến hành đặt hàng</a>
      </div>
      <div class="table_gio_hang">
        <form id="enableForm3" action="?c=cart&m=order" method="POST" class="form-horizontal">
          <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="form-group">
                  <label class="col-md-5 control-label">Họ Tên (*)</label>
                  <div class="col-md-7">
                    <input class="myinput" type="text" value="" class="form-control" name="txtHoTen" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-5 control-label">Số điện thoại (*)</label>
                  <div class="col-md-7">
                    <input class="myinput" type="text" value="" class="form-control" name="txtSoDienThoai" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-5 control-label">Email (*)</label>
                  <div class="col-md-7">
                    <input class="myinput" type="email" value="" class="form-control" name="txtEmail" />
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="form-group">
                  <label class="col-md-5 control-label">Địa chỉ (*)</label>
                  <div class="col-md-7">
                    <input class="myinput" type="text"  value="" class="form-control" name="txtDiaChi" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-5 control-label">Ghi chú</label>
                  <div class="col-md-7">
                    <textarea style="width: 550px;" name="txtGhiChu" ></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <input type="submit" name="bnSubmit" class="btn btn-info btn-block" value="Đặt hàng"/>
              </div>
          </div>
        </form>
      </div>
      <?php endif;  ?>
    </div>