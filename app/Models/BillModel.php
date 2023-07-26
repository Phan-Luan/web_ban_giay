<?php

namespace App\Models;

use PDO;

class BillModel extends BaseModel
{
  protected $tableName = 'bill';
  public static function getBills()
  {
    $model = new static;
    $model->sqlBuilder = "SELECT bill.*, bill.id AS bill_id, SUM(cart.amount) AS countcart
                          FROM bill
                          JOIN cart ON bill.id = cart.bill_id
                          GROUP BY bill.id
                          ORDER BY bill_id DESC
    ";
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
    $model->sqlBuilder = "SELECT bill.*, bill.id AS bill_id, SUM(cart.amount) AS countcart
                          FROM bill
                          JOIN cart ON bill.id = cart.bill_id
                          WHERE bill.username = '$username'
                          GROUP BY bill.id
    ";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
}
