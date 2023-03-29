<?php
include '../resources/views/admin/header.php';

?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm sản phẩm</h4>
        <form action="/create-product" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input name="name" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Giá</label>
            <input name="price" type="number" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Hình sản phẩm</label>
            <input name="image" multiple="multiple" type="file" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Mô tả</label>
            <textarea name="mota" id="" cols="" rows="" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="">Danh mục</label>
            <select name="categori_id" class="form-select" id="">
              <option value="" selected>Select Option</option>
              <?php foreach ($categories as $categori) : ?>
                <option value="<?= $categori->id ?> "><?= $categori->name ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">chọn size</label>
            <div class="pr_size d-flex align-items-center" style="gap: 15px;">
              <div class="">
                <p>36 <input name="pr_size[]" type="checkbox" value="36"></p>
              </div>
              <div class="">
                <p>37 <input name="pr_size[]" type="checkbox" value="37"></p>
              </div>
              <div class="">
                <p>38 <input name="pr_size[]" type="checkbox" value="38"></p>
              </div>
              <div class="">
                <p>39 <input name="pr_size[]" type="checkbox" value="39"></p>
              </div>
              <div class="">
                <p>40 <input name="pr_size[]" type="checkbox" value="40"></p>
              </div>
              <div class="">
                <p>41 <input name="pr_size[]" type="checkbox" value="41"></p>
              </div>
              <div class="">
                <p>42 <input name="pr_size[]" type="checkbox" value="42"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Số lượng</label>
            <input class="form-control" type="number" name="amount" id="">
          </div>
          <div class="form-group mt-3">

            <input class="btn btn-primary" type="submit" value="Thêm mới">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            <a href="/products"><input class="btn btn-primary" type="button" value="Danh sách"></a>
          </div>
        </form>
      </div>
    </div>
  </div>