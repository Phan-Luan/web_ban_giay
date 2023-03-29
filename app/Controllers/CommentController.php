<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Request;

class CommentController extends Controller
{
  public function index()
  {
    $comments = CommentModel::getDetailComment();
    return $this->render('admin/comment/comments', ['comments' => $comments]);
  }
  public function delete(Request $request)
  {
    $id = $request->getBody()['id'];
    $p = new CommentModel;
    $p->delete($id);
    header('Location:/comments');
  }
  public function addComment(Request $request)
  {
    $data = $request->getBody();
    $comment = new CommentModel;
    $comment->insert($data);
    $id = $data['product_id'];
    header('Location:/detail-product?id=' . $id);
  }
}
