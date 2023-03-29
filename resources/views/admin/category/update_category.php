<?php
include '../resources/views/admin/header.php';

?>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cập nhật loại hàng</h4>
        <form class="forms-sample" action="/update-category" method="post">
          <div class="form-group">
            <label for="">Mã loại</label>
            <input disabled name="maloai" value="<?= $cate->id ?>" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Tên loại
            </label>
            <input name="name" type="text" class="form-control" value="<?= $cate->name ?>">
          </div>

          <div class="form-group mt-3">
            <input type="hidden" name="id" value="<?= $cate->id ?>">
            <input class="btn btn-gradient-primary me-2" type="submit" value="Cập nhật">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            <a href="/categories"><input class="btn btn-gradient-primary me-2" type="button" value="Danh sách"></a>
          </div>
        </form>
      </div>
    </div>
  </div>