<?php

namespace App\Models;

use PDO;

class UserModel extends BaseModel
{
  protected $tableName = 'user';
  public static function checkLogin($username, $password)
  { //Lấy ra toàn bộ dữ liệu của bảng
    $model = new static;
    //thay thế cho this khi dùng fn static
    $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE `username`='$username' AND `password`=$password";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
  public static function checkForgotpw($username, $email)
  { //Lấy ra toàn bộ dữ liệu của bảng
    $model = new static;
    //thay thế cho this khi dùng fn static
    $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE `username`='$username' AND `email`='$email'";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
}
