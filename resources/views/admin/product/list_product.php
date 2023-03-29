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

  .table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
  }


  .table1 thead tr th:nth-child(6) td {
    width: 200px;
    word-break: break-all;
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
</style>

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-primary" href="/create-product">Thêm sản phẩm</a>
        <h2 class="card-title mt-2">Danh sách sản phẩm</h2>
        <form class="boloc" action="index.php?act=list_product" method="post">
          <div class="boloc2 form-group">
            <select style="width: 11rem;" class="form-select" name="iddm" id="tt">
              <option value="0" selected>Tất cả</option>
              <option value="">Giày nam</option>
            </select>
            <button type="submit" class="btn btn-primary" name="search_dm" value="Search">Tìm kiếm</button>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <tr>
                <th style="width: 9%;">#</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Image</th>
                <th>Mô tả</th>
                <th style="width: 22%;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $index = 1;
              foreach ($products as $product) :
              ?>
                <td><?= $index++ ?></td>
                <td><?= $product->id ?></td>
                <td><?= $product->name ?></td>
                <td><?= $product->price ?></td>
                <td><img width="150px" height="100px" src="images/<?= $product->image ?>" alt="Anh"></td>
                <td><?= $product->mota ?></td>
                <td class="btn1">
                  <a href="/update-product?id=<?= $product->id ?>"><input class="btn btn-primary btn2" type="button" value="Sửa"></a>
                  <a href="/delete-product?id=<?= $product->id ?>" onclick="return confirm(`Bạn muốn xóa?`)" id="delete"><input class="btn btn-danger btn2" type="button" value="Xóa"></a>
                </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>