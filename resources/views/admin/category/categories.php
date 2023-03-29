<?php
include '../resources/views/admin/header.php';

?>
<style>
  .thaotac {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  a {
    text-decoration: none;
  }

  td {
    line-height: 40px;
  }

  .btn1 input:nth-child(1) {
    margin-right: 10px;
  }

  .btn2 {
    padding-left: 30px;
    padding-right: 30px;
  }

  .table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
  }
</style>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <a href="/create-category" class="btn btn-gradient-primary me-2 mb-2">Thêm loại hàng</a>
        <h4 class="card-title">Danh sách loại hàng</h4>
        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <tr>
                <th style="width: 9%;">#</th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th style="width: 22%;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $index = 1;
              foreach ($categories as $category) : ?>
                <tr>
                  <td><?= $index++ ?></td>
                  <td><?= $category->id ?></td>
                  <td><?= $category->name ?></td>
                  <td class="btn1"><a href="/update-category?id=<?= $category->id ?>"><input class="btn btn-gradient-primary btn2" type="button" value="Sửa"></a><a href="/delete-category?id=<?= $category->id ?>" onclick="return confirm(`Bạn muốn xóa?`)" ; id="delete"><input class="btn btn-gradient-danger btn2" type="button" value="Xóa"></a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="thaotac">
  <!-- <div class="">
    <input class="btn btn-primary" type="button" value="Chọn tất cả">
  </div>
  <div class="">
    <input class="btn btn-primary" type="button" value="Bỏ chọn tất cả">
  </div>
  <div class="">
    <input class="btn btn-danger" type="button" onclick="return confirm('Bạn muốn xóa?')" ; value="Xóa mục đã chọn">
  </div> -->
  <div class="">
    <a href="index.php?act=add_danhmuc"><input class="btn btn-primary" type="button" value="Thêm danh mục"></a>
  </div>
</div>