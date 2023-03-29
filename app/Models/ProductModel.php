<?php

namespace App\Models;

use PDO;

class ProductModel extends BaseModel
{
  protected $tableName = 'product';
  public static function loadal_product($kyw = "", $id_category = '')
  {
    $model = new static;
    $model->sqlBuilder = "SELECT * FROM  $model->tableName WHERE 1";
    if ($kyw != "") {
      $model->sqlBuilder .= " and name like '%" . $kyw . "%'";
    }
    if ($id_category > 0) {
      $model->sqlBuilder .= " and categori_id ='" . $id_category . "'";
    }
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
  public static function findNewProduct()
  {
    $model = new static;
    //thay thế cho this khi dùng fn static
    $model->sqlBuilder = "SELECT * FROM $model->tableName ORDER BY id DESC";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
  public function updateAmount($newAmount, $id)
  {
    $this->sqlBuilder = "UPDATE `product` SET `amount` = '$newAmount' WHERE `product`.`id` = '$id' ";
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute();
  }
  public static function findProduct($id)
  {
    $model = new static;
    //thay thế cho this khi dùng fn static
    $model->sqlBuilder = "SELECT * FROM $model->tableName Where `id`='$id'";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
  public static function sameProduct($cate_id, $pr_id)
  {
    $model = new static;
    //thay thế cho this khi dùng fn static
    $model->sqlBuilder = "SELECT * FROM product where categori_id=" . $cate_id . " and id<>" . $pr_id . " LIMIT 0,8";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
}
