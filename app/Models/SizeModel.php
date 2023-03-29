<?php

namespace App\Models;

use PDO;

class SizeModel extends BaseModel
{
  protected $tableName = 'size';
  public static function findSize($id)
  {
    $model = new static;
    $model->sqlBuilder = "SELECT size.pr_size FROM `size` WHERE `product_id`='$id'";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }

  public function insertSize($product_id, $size)
  {
    $this->sqlBuilder = "INSERT INTO size (product_id,pr_size) values('$product_id','$size') ";
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute();
  }
}
