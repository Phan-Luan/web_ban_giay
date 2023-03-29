<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\ProductModel;
use App\Models\SizeModel;
use App\Models\UserModel;
use App\Request;

class HomeController extends Controller
{
  public function index()
  {
    $products = ProductModel::limit('id', 8);
    return $this->render('home', ['products' => $products]);
  }
  public function detail_product(Request $request)
  {
    $id = $request->getBody()['id'];
    $product = ProductModel::findOne($id);
    $cmt = CommentModel::findProductComment($id);
    $sizes = SizeModel::findSize($id);
    $sameProducts = ProductModel::sameProduct($product->categori_id, $id);
    return $this->render('client/product/detail-product', ['product' => $product, 'sizes' => $sizes, 'comments' => $cmt, 'sameProducts' => $sameProducts]);
  }
  public function contact()
  {
    return $this->render('client/contact');
  }
}
