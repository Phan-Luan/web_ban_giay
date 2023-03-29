<?php
include '../resources/views/admin/header.php';

?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm mới loại hàng</h4>
        <form class="forms-sample" action="/create-category" method="post">
          <div class="form-group">
            <label for="">Mã loại</label>
            <input disabled name="id" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Tên loại
            </label>
            <input name="name" type="text" class="form-control">
          </div>
          <div class="form-group mt-3">
            <input class="btn btn-gradient-primary me-2" type="submit" value="Thêm mới">
            <input class="btn btn-secondary" type="reset" name="reset" value="Nhập lại">
            <a href="/categories"><input class="btn btn-primary" type="button" value="Danh sách"></a>
          </div>
        </form>
      </div>
    </div>
  </div>