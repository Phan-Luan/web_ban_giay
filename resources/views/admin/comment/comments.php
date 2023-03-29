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

  .boloc {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-bottom: 15px;
  }

  .boloc2 {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  .boloc select {
    height: 38px;
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
        <h4 class="card-title">Danh sách bình luận</h4>
        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <tr>
                <th style="width: 5%;">#</th>
                <th>ID</th>
                <th>Username</th>
                <th>Nội dung</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh sản phẩm</th>
                <th>Ngày bình luận</th>
                <th style="width: 17%;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $index = 1;
              foreach ($comments as $comment) : ?>
                <tr>
                  <td><?= $index++ ?></td>
                  <td><?= $comment->id?></td>
                  <td><?= $comment->username?></td>
                  <td><?= $comment->content?></td>
                  <td><?= $comment->id?></td>
                  <td><img src="images/<?= $comment->image?>" alt=""></td>
                  <td><?= $comment->date?></td>
                  <td class="btn1"><a href="delete-comment?id=<?= $comment->id ?>" onclick="return confirm(`Bạn muốn xóa?`)" ; id="delete"><input class="btn btn-danger btn2" type="button" value="Xóa"></a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="thaotac">
  <div class="">
    <input class="btn btn-primary" type="button" value="Chọn tất cả">
  </div>
  <div class="">
    <input class="btn btn-primary" type="button" value="Bỏ chọn tất cả">
  </div>
  <div class="">
    <input class="btn btn-danger" type="button" onclick="return confirm('Bạn muốn xóa?')" ; value="Xóa mục đã chọn">
  </div>
</div> -->