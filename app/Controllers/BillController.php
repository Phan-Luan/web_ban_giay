<?php

namespace App\Controllers;

use App\Models\BillModel;
use App\Models\CartModel;
use App\Request;

class BillController extends Controller
{
  public function index()
  {
    $bills = BillModel::getBills();
    return $this->render('/admin/bill/list_bill', ['bills' => $bills]);
  }
  public function detail(Request $request)
  {
    $id = $request->getBody()['id'];
    $cart = CartModel::findOneCart($id);
    return $this->render('/admin/bill/detail_bill', ['cart' => $cart]);
  }
  public function detail_bill_update(Request $request)
  {
    $id = $request->getBody()['id'];
    $bill = BillModel::findOne($id);
    return  $this->render('/admin/bill/update_bill', ['bill' => $bill]);
  }
  public function update_bill(Request $request)
  {
    $bill = $request->getBody();
    $p = new BillModel;
    $p->update($bill, $bill['id']);
    header('Location:/bills');
    exit;
  }
  public function updateStatusBill(Request $request)
  {
    $id = $request->getBody();
    $bill = ['status' => '4'];
    $p = new BillModel;
    $p->update($bill, $id['id']);
    header('Location:/mycart');
  }
}
