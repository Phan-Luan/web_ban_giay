<?php

namespace App\Models;

use PDO;

class CartFakeModel extends BaseModel
{
  protected $tableName = 'cart_fake';
  public static function allCartFake()
  { //Lấy ra toàn bộ dữ liệu của bảng
    $model = new static;
    //thay thế cho this khi dùng fn static
    $model->sqlBuilder = "SELECT * FROM $model->tableName ORDER BY id DESC";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function deleteCartFake()
  {
    $this->sqlBuilder = "DELETE FROM $this->tableName";
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute();
  }
}
