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
</style>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-primary" href="/create-user">Thêm khách hàng</a>
        <h4 class="card-title mt-3">Danh sách khách hàng</h4>
        <div class="table-responsive">
          <table id="example" class="table table-bordered text-center table1">
            <thead>
              <tr>
                <th style="width: 5%;">#</th>
                <th>Mã KH</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Phone</th>
                <th>Avatar</th>
                <th>Vai trò</th>
                <th style="width: 17%;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $index = 1;
              foreach ($list_user as $user) :
                if ($user->role == 0) {
                  $role1 = 'User';
                } else {
                  $role1 = 'Admin';
                } ?>
                <tr>
                  <td><?= $index++ ?></td>
                  <td><?= $user->id ?></td>
                  <td><?= $user->username ?></td>
                  <td><?= $user->password ?></td>
                  <td><?= $user->email ?></td>
                  <td><?= $user->address ?></td>
                  <td><?= $user->phone ?></td>
                  <td><img src="images/<?= $user->avatar ?>" alt="Avatar"></td>
                  <td><?= $role1 ?></td>
                  <td class="btn1">
                    <a class="btn btn-danger" href="/delete-user?id=<?= $user->id ?>" onclick="return confirm(`Bạn muốn xóa?`)">Xóa</a>
                    <a href="/update-user?id=<?= $user->id ?>" class="btn btn-primary">Sửa</a>
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
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>