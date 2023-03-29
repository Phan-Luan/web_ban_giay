<?php


namespace App\Models;

use PDO;

class CommentModel extends BaseModel
{
  protected $tableName = 'comment';
  public static function getDetailComment()
  {
    $model = new static;
    //thay thế cho this khi dùng fn static
    $model->sqlBuilder = "SELECT comment.id,comment.content,comment.date,user.username,product.name,product.image FROM comment JOIN product ON comment.product_id=product.id JOIN user ON comment.user_id=user.id ORDER BY comment.id DESC";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
  public static function findProductComment($id)
  {
    $model = new static;
    $model->sqlBuilder = "SELECT comment.id,comment.content,comment.product_id,comment.date,user.username,user.avatar FROM $model->tableName JOIN user ON comment.user_id=user.id WHERE product_id=$id";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
}
