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

  .btn3 {
    background-color: red;
  }

  .btn3:hover {
    opacity: 0.7;
    background-color: red;
  }
</style>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <a href="/bills"><input class="btn btn-primary mb-2" type="button" value="Đơn hàng"></a>
        <h2 class="card-title">Chi tiết đơn hàng DAM-</h2>
        <div class="table-responsive">
          <table class="table text-center">
            <table class="table table-bordered text-center table1">
              <thead>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th>Sản phẩm</th>
                  <th>Size</th>
                  <th>Đơn giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $total_bill = 0;
                foreach ($cart as $item) :
                  $total = $item->price * $item->amount;
                  $total_bill += $total;
                ?>
                  <tr>
                    <td><?= $item->name ?></td>
                    <td><img src="images/<?= $item->image?>" width="100px" alt=""></td>
                    <td><?= $item->size ?></td>
                    <td><?= $item->price ?></td>
                    <td><?= $item->amount ?></td>
                    <td><?= $total ?></td>
                  </tr>
                <?php endforeach ?>
                <tr>
                  <td class="font-weight-bold" style="font-size: 18px;" colspan="5">Thành tiền</td>
                  <td><?= $total_bill ?></td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>