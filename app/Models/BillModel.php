<?php

namespace App\Models;

use PDO;

class BillModel extends BaseModel
{
  protected $tableName = 'bill';
  public static function getBills()
  {
    $model = new static;
    $model->sqlBuilder = "SELECT *,bill.id as bill_id ,sum(cart.amount) as countcart FROM bill JOIN cart ON bill.id= cart.bill_id group by bill.id ORDER BY bill.id DESC";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
  public static function findNewBill()
  {
    $model = new static;
    //thay thế cho this khi dùng fn static
    $model->sqlBuilder = "SELECT * FROM $model->tableName ORDER BY id DESC";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
  public static function findUserBill($username)
  {
    $model = new static;
    $model->sqlBuilder = "SELECT *,bill.id as bill_id ,sum(cart.amount) as countcart FROM bill JOIN cart ON bill.id= cart.bill_id WHERE `username`='$username' group by bill.id";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
}
