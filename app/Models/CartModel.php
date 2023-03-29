<?php

namespace App\Models;

use PDO;

class CartModel extends BaseModel
{
  protected $tableName = 'cart';
  public static function findOneCart($id)
  {
    $model = new static;
    $model->sqlBuilder = "SELECT cart.name, cart.price,cart.size, cart.amount, bill.total_money, product.image FROM bill JOIN cart ON bill.id=cart.bill_id JOIN product ON cart.product_id=product.id WHERE bill.id='$id'";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }

  public function insertCart($price, $amount, $size, $bill_id, $name, $image, $product_id)
  {
    $this->sqlBuilder = "INSERT INTO cart (`price`,`amount`,`size`,`bill_id`,`name`,`image`,`product_id`) values('$price','$amount','$size','$bill_id','$name','$image','$product_id') ";
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute();
  }
}
