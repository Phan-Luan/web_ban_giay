<?php
include '../resources/views/admin/header.php';

?>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cập nhật sản phẩm</h4>
        <form action="/update-product" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="">Mã sản phẩm</label>
            <input disabled name="id" type="text" value="<?= $product->id ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input name="name" type="text" value="<?= $product->name ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Giá</label>
            <input name="price" type="text" value="<?= $product->price ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <img style="width: 200px;height: 200px;" class="form-control mb-2" src="images/<?= $product->image ?>" alt="Ảnh">
            <input type="file" name="image" class="form-control" id="">
          </div>
          <div class="form-group">
            <label for="">Mô tả</label>
            <textarea name="mota" id="" cols="" rows="" class="form-control"><?= $product->mota ?></textarea>
          </div>
          <div class="form-group">
            <label for="">Danh mục</label>
            <select name="categori_id" class="form-select" id="">
              <?php foreach ($categories as $cate) : ?>
                <option <?= ($cate->id === $product->categori_id) ? 'selected' : false ?> value="<?= $cate->id ?>"><?= $cate->name ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Số lượng</label>
            <input class="form-control" type="number" name="amount" id="" value="<?= $product->amount ?>">
          </div>
          <div class="form-group mt-3">
            <input type="hidden" name="id" value="<?= $product->id ?>">
            <input class="btn btn-primary" type="submit" value="Cập nhật">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            <a href="/products"><input class="btn btn-primary" type="button" value="Danh sách"></a>
          </div>
        </form>
      </div>
    </div>
  </div>