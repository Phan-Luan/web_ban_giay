<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Request;

class UserController extends Controller
{
  public function index()
  {
    $list_user = UserModel::all();
    return $this->render("/admin/account/list_account", ['list_user' => $list_user]);
  }

  public function create()
  {
    return $this->render('admin/account/add');
  }

  public function setUser(Request $request)
  {
    $user = $request->getBody();
    $user['avatar'] = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], 'images/' . $_FILES['file']['name']);
    $p = new UserModel;
    $p->insert($user);
    header('location:/account');
    die;
  }

  public function detail_user(Request $request)
  {
    $id = $request->getBody()['id'];
    $user = UserModel::findOne($id);
    return $this->render('admin/account/update_account', ['user' => $user]);
  }

  public function update_user(Request $request)
  {
    $user = $request->getBody();
    if ($_FILES['file']['name']) {
      $user['avatar'] = $_FILES['file']['name'];
      move_uploaded_file($_FILES['file']['tmp_name'], 'images/' . $_FILES['file']['name']);
    }
    $p = new UserModel;
    $p->update($user, $user['id']);
    header('location:/account');
    die;
  }

  public function delete(Request $request)
  {
    $id = $request->getBody()['id'];
    $p = new UserModel;
    $p->delete($id);
    header("Location:/account");
    exit;
  }
  public function login()
  {
    return $this->render('client/account/login');
  }
  public function checkLogin(Request $request)
  {
    if ($request) {
      $user = $request->getBody();
      $userDetail = UserModel::checkLogin($user['username'], $user['password']);
      if ($userDetail) {
        $_SESSION['user'] = $userDetail;
        header("Location:/");
      } else {
        return $this->render('client/account/login', ['errol' => '<span style="color:red">Không tìm thấy tài khoản</span>']);
      }
    }
  }
  public function checkAdmin(Request $request)
  {
    if ($request) {
      $user = $request->getBody();
      $userDetail = UserModel::checkLogin($user['username'], $user['password']);
      if ($userDetail) {
        if ($userDetail['role'] === 1) {
          $_SESSION['user'] = $userDetail;
          header("Location:/admin");
        } else {
          return $this->render('admin/account/login', ['errol' => '<span style="color:red">Bạn không phải admin</span>']);
        }
      } else {
        return $this->render('admin/account/login', ['errol' => '<span style="color:red">Không tìm thấy tài khoản</span>']);
      }
    }
  }
  public function loginAdmin()
  {
    return $this->render('admin/account/login');
  }
  public function forgotDetail()
  {
    return $this->render('client/account/forgot_password', ['errol' => '']);
  }
  public function checkForgotpw(Request $request)
  {
    $user = $request->getBody();
    $checkUser = UserModel::checkForgotpw($user['username'], $user['email']);
    // var_dump($checkUser);
    if ($checkUser) {
      $detail = $checkUser;
      return $this->render('client/account/forgot_password', ['detail' => $detail]);
    } else {
      return $this->render('client/account/forgot_password', ['errol' => '<span style="color:red">Không tìm thấy tài khoản</span>']);
    }
  }

  public function registration()
  {
    $list_user = UserModel::all();
    return $this->render('client/account/registration', ['list_user' => $list_user]);
  }
  public function setAccount(Request $request)
  {
    $user = $request->getBody();
    $user['avatar'] = $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], 'images/' . $_FILES['avatar']['name']);
    array_splice($user, 2, 1);
    array_splice($user, 5, 1);
    array_splice($user, 5, 1);
    $p = new UserModel;
    $p->insert($user);
    header('location:/login');
    die;
  }
  public function logout()
  {
    unset($_SESSION['user']);
    header('Location:/login');
  }
  public function logoutAdmin()
  {
    unset($_SESSION['user']);
    header('Location:/admin');
  }
}
