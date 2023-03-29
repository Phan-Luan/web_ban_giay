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
        <h2 class="card-title">Danh sách đơn hàng</h2>
        <form class="boloc" action="index.php?act=list_bill" method="post">
          <div class="boloc2 form-group">
            <select style="width: 11rem;" class="form-select" name="id_search_bill" id="tt">
              <option value="0" selected>Tất cả</option>
              <?php
              foreach ($list_bill as $bill) {
                extract($bill);
                echo '
            <option value="' . $bill['bill_id'] . '"> DAM-' . $bill['bill_id'] . '</option>
            ';
              }
              ?>
            </select>
            <button type="submit" class="btn btn-primary" name="search_bill" value="Search">Tìm kiếm</button>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table text-center">
            <table class="table table-bordered text-center table1">
              <thead>
                <tr>
                  <th style="width: 9%;">#</th>
                  <th>Mã đơn hàng</th>
                  <th>Khách hàng</th>
                  <th>Số lượng hàng</th>
                  <th>Giá trị đơn hàng</th>
                  <th>Ngày đặt hàng</th>
                  <th>Tình trạng đơn hàng</th>
                  <th style="width: 22%;">Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $index = 1;
                foreach ($bills as $bill) :
                  switch ($bill->status) {
                    case '0':
                      $stt = "Đơn hàng mới";
                      break;

                    case '1':
                      $stt = "Đang xử lý";
                      break;
                    case '2':
                      $stt = "Đang giao hàng";
                      break;
                    case '3':
                      $stt = "Đã giao hàng";
                      break;
                    case '4':
                      $stt = "Đã hủy";
                      break;
                    default:
                      $stt = "Đơn hàng mới";
                      break;
                  } ?>
                  <tr>
                    <td><?= $index++ ?></td>
                    <td>DAM-<?= $bill->bill_id ?></td>
                    <td><?= $bill->username ?></td>
                    <td><?= $bill->countcart ?>
                    <td><?= $bill->total_money ?></td>
                    <td><?= $bill->date ?></td>
                    <td><?= $stt ?></td>
                    <td class="btn1">
                      <a href="/update-bill?id=<?= $bill->bill_id ?>"><input class="btn btn-primary btn2" type="button" value="Sửa"></a>
                      <a href="/bill-detail?id=<?= $bill->bill_id ?>"><input class="btn btn-danger btn2" type="button" value="Detail"></a>
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