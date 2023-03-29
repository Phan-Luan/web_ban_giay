<style>
  .thaotac {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  .table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
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
</style>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">Thống kê sản phẩm</h2>
        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <th>Mã danh mục</th>
              <th>Tên danh mục</th>
              <th>Số lượng</th>
              <th>Giá cao nhất</th>
              <th>Giá thấp nhất</th>
              <th>Giá trung bình</th>
            </thead>
            <tbody>
              <?php
              foreach ($list_thongke as $thongke) {
                extract($thongke);
                $avgprice = round($avgprice * 100) / 100;
                echo
                '
                    <tr>
                    <td>' . $id_danhmuc . '</td>
                    <td>' . $name_danhmuc . '</td>
                    <td>' . $countpr . '</td>
                    <td>' . $maxprice . '</td>
                    <td>' . $minprice . '</td>
                    <td>' . $avgprice . '</td>
                    </tr>
                ';
              }

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="thaotac">
  <div class="">
    <a href="index.php?act=bieudo"><input class="btn btn-primary" type="button" value="Xem Biểu đồ"></a>
  </div>
</div>