<?php

namespace App\Controllers;

use App\Models\CategoriModel;
use App\Request;

class CategoriController extends Controller
{
  public function index()
  {
    $categories = CategoriModel::all();
    return $this->render('/admin/category/categories', ['categories' => $categories]);
  }
  public function create()
  {
    return $this->render('/admin/category/add_category');
  }
  public function setData(Request $request)
  {
    $cate = $request->getBody();
    $p = new CategoriModel;
    $p->insert($cate);
    header("Location:/categories");
    die;
  }
  public function detail_category(Request $request)
  {
    $id = $request->getBody()['id'];
    $detail_cate = CategoriModel::findOne($id);
    $categories = CategoriModel::all();
    return $this->render('/admin/category/update_category', ['cate' => $detail_cate, 'categories' => $categories]);
  }
  public function update_category(Request $request)
  {
    $cate = $request->getBody();
    $p = new CategoriModel;
    $p->update($cate, $cate['id']);
    header("Location:/categories");
    die;
  }
  public function delete(Request $request)
  {
    $id = $request->getBody()['id'];
    $p = new CategoriModel;
    $p->delete($id);
    header("Location:/categories");
    exit;
  }
}
