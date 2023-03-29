<?php

namespace App\Controllers;

use App\Models\BillModel;
use App\Models\CartFakeModel;
use App\Models\CartModel;
use App\Models\CategoriModel;
use App\Models\ProductModel;
use App\Models\SizeModel;
use App\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = ProductModel::all();
    return $this->render('admin/product/list_product', ['products' => $products]);
  }
  public function create()
  {
    $categories = CategoriModel::all();
    return $this->render('admin/product/add_product', ['categories' => $categories]);
  }
  public function setData(Request $request)
  {
    $product = $request->getBody();
    $list_size = $_POST['pr_size'];
    $product['image'] = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $_FILES['image']['name']);
    array_splice($product, 4, 1);
    $p = new ProductModel;
    $p->insert($product);
    $getNewProduct = $p->findNewProduct();
    $id = $getNewProduct['id'];
    $size = new SizeModel;
    foreach ($list_size as $key => $pr_size) {
      $size->insertSize($id, $pr_size);
    }
    header('location:/products');
    die;
  }

  public function detail_product(Request $request)
  {
    $id = $request->getBody()['id'];
    $product = ProductModel::findOne($id);
    $categories = CategoriModel::all();
    return $this->render('admin/product/updatepr', ['product' => $product, 'categories' => $categories]);
  }

  public function update_product(Request $request)
  {
    $product = $request->getBody();
    if ($_FILES['image']['name']) {
      $product['image'] = $_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $_FILES['image']['name']);
    }
    $p = new ProductModel;
    $p->update($product, $product['id']);
    header('location:/products');
    die;
  }

  public function delete_product(Request $request)
  {
    $id = $request->getBody()['id'];
    $p = new ProductModel;
    $p->delete($id);
    header("Location:/products");
    exit;
  }


  public function product(Request $request)
  {
    $cate = $request->getBody()['cate'];
    $products = ProductModel::loadal_product('', $cate);
    if ($cate == 4) {
      return $this->render('client/product/man-product', ['products' => $products]);
    } elseif ($cate == 2) {

      return $this->render('client/product/woman-product', ['products' => $products]);
    }
  }
  public function search_product(Request $request)
  {
    $body = $request->getBody();
    if ($body['kyw']) {
      $products = ProductModel::loadal_product($body['kyw'], $body['cate_id']);
      if ($body['cate_id'] == 4) {
        return $this->render('client/product/man-product', ['products' => $products]);
      } elseif ($body['cate_id'] == 2) {
        return $this->render('client/product/woman-product', ['products' => $products]);
      }
    } else {
      $products = ProductModel::loadal_product('', $body['cate_id']);
      if ($body['cate_id'] == 4) {
        return $this->render('client/product/man-product', ['products' => $products]);
      } elseif ($body['cate_id'] == 2) {
        return $this->render('client/product/woman-product', ['products' => $products]);
      }
    }
  }

  public function carts()
  {
    $list_cart = CartFakeModel::all();
    return $this->render('client/product/cart', ['list_cart' => $list_cart]);
  }

  public function addCart(Request $request)
  {
    $detail_product = $request->getBody();
    $product = new CartFakeModel;
    $product->insert($detail_product);
    $list_cart = CartFakeModel::all();
    return $this->render('client/product/cart', ['list_cart' => $list_cart]);
  }

  public function deleteCart(Request $request)
  {
    $id = $request->getBody()['id'];
    $p = new CartFakeModel;
    $p->delete($id);
    header("Location:/cart");
    exit;
  }
  public function setBill(Request $request)
  {
    $bill = $request->getBody();
    // var_dump($bill);
    $p = new BillModel;
    $p->insert($bill);
    $newBill = BillModel::findNewBill();
    $bill_id = $newBill['id'];
    $carts = CartFakeModel::allCartFake();
    $cartReal = new CartModel;
    $product = new ProductModel;
    foreach ($carts as $key => $cart) {
      $cartReal->insertCart($cart['price'], $cart['amount'], $cart['size'], $bill_id, $cart['name'], $cart['image'], $cart['product_id']);
      $amount = $product->findProduct($cart['product_id']);
      $newAmount = $amount['amount'] - $cart['amount'];
      $product->updateAmount($newAmount, $cart['product_id']);
    }
    $a = new CartFakeModel;
    $a->deleteCartFake();

    $list_cart = CartModel::findOneCart($bill_id);
    return $this->render('client/product/confirmation', ['bill' => $newBill, 'list_cart' => $list_cart]);
    die;
  }
  public function mycart(Request $request)
  {
    $username = $_SESSION['user']['username'];
    $list_bill = BillModel::findUserBill($username);
    if ($request) {
      if (isset($request->getBody()['id'])) {
        $id = $request->getBody()['id'];
      } else {
        $id = 0;
      }
      $list_cart = CartModel::findOneCart($id);
      return $this->render('client/product/mycart', ['list_bill' => $list_bill, 'list_cart' => $list_cart]);
    } else {
      return $this->render('client/product/mycart', ['list_bill' => $list_bill]);
    }
  }
}
