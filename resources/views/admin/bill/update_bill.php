<?php
include '../resources/views/admin/header.php';

?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cập nhật đơn hàng</h4>
        <form class="forms-sample" action="/update-bill" method="post">
          <div class="form-group">
            <label for="">Mã đơn hàng</label>
            <input disabled value="<?= $bill->id ?>" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="bill_status">Tình trạng đơn hàng</label>
            <select name="status" id="" class="form-select">
              <option <?= ($bill->status === 0) ? 'selected' : false ?> value="0">Đơn hàng mới</option>
              <option <?= ($bill->status === 1) ? 'selected' : false ?> value="1">Đang xử lý</option>
              <option <?= ($bill->status === 2) ? 'selected' : false ?> value="2">Đang giao hàng</option>
              <option <?= ($bill->status === 3) ? 'selected' : false ?> value="3">Đã giao hàng</option>
              <option <?= ($bill->status === 4) ? 'selected' : false ?> value="4">Đã hủy</option>
            </select>
          </div>
          <div class="form-group mt-3">
            <input type="hidden" name="id" value="<?= $bill->id ?>">
            <input class="btn btn-primary" type="submit" value="Cập nhật">
            <a href="/bills"><input class="btn btn-dark" type="button" value="Danh sách"></a>
          </div>
        </form>
      </div>
    </div>
  </div>