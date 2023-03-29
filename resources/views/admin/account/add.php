<?php
include '../resources/views/admin/header.php';

?>
<style>
  .role {
    margin-left: 1rem;
  }
</style>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm người dùng</h4>
        <form action="/create-user" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" value="">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" value="">
          </div>
          <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" value="">
          </div>
          <div class="form-group">
            <label for="">Phone</label>
            <input type="phone" class="form-control" name="phone" value="">
          </div>
          <div class="form-group">
            <label for="">Avatar</label>
            <input class="form-control mt-2" type="file" name="file" id="" multiple="multiple">
          </div>
          <div class="form-group">
            <label for="">Vài trò</label> <br>
            <input type="radio" class="form-check-input" name="role" value="0"> Khách hàng
            <input type="radio" class="form-check-input role" name="role" value="1"> Admin
          </div>
          <button type="submit" class="mt-3 btn btn-primary">Thêm</button>
        </form>
      </div>
    </div>
  </div>