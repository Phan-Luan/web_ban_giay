<?php

use App\Controllers\BillController;
use App\Controllers\CategoriController;
use App\Controllers\CommentController;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\UserController;
use App\Router;

session_start();
ob_start();
require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router;


//ADMIN
if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 1) {
  Router::get('/admin', [UserController::class, 'index']);
} else {
  Router::get('/admin', [UserController::class, 'loginAdmin']);
  Router::post('/admin', [UserController::class, 'checkAdmin']);
}
Router::get('/contact', [HomeController::class, 'contact']);
//user
Router::get('/account', [UserController::class, 'index']);
Router::get('/create-user', [UserController::class, 'create']);
Router::post('/create-user', [UserController::class, 'setUser']);
Router::get('/update-user', [UserController::class, 'detail_user']);
Router::post('/update-user', [UserController::class, 'update_user']);
Router::get('/delete-user', [UserController::class, 'delete']);
Router::get('/logoutAdmin', [UserController::class, 'logoutAdmin']);

//product
Router::get('/', [ProductController::class, 'index']);
Router::get('/products', [ProductController::class, 'index']);
Router::get('/create-product', [ProductController::class, 'create']);
Router::post('/create-product', [ProductController::class, 'setData']);
Router::get('/delete-product', [ProductController::class, 'delete_product']);
Router::get('/update-product', [ProductController::class, 'detail_product']);
Router::post('/update-product', [ProductController::class, 'update_product']);

//comment
Router::get('/comments', [CommentController::class, 'index']);
Router::get('/delete-comment', [CommentController::class, 'delete']);

//categories
Router::get('/categories', [CategoriController::class, 'index']);
Router::get('/create-category', [CategoriController::class, 'create']);
Router::post('/create-category', [CategoriController::class, 'setData']);
Router::get('/update-category', [CategoriController::class, 'detail_category']);
Router::post('/update-category', [CategoriController::class, 'update_category']);
Router::get('/delete-category', [CategoriController::class, 'delete']);

//bills
Router::get('/bills', [BillController::class, 'index']);
Router::get('/bill-detail', [BillController::class, 'detail']);
Router::get('/update-bill', [BillController::class, 'detail_bill_update']);
Router::post('/update-bill', [BillController::class, 'update_bill']);

Router::get('/disable_bill', [BillController::class, 'updateStatusBill']);

//Client
Router::get('/', [HomeController::class, 'index']);
Router::get('/detail-product', [HomeController::class, 'detail_product']);

//login
Router::get('/login', [UserController::class, 'login']);
Router::get('/logout', [UserController::class, 'logout']);
Router::post('/login', [UserController::class, 'checkLogin']);
Router::get('/forgot_password', [UserController::class, 'forgotDetail']);
Router::post('/forgot_password', [UserController::class, 'checkForgotpw']);
Router::get('/registration', [UserController::class, 'registration']);
Router::post('/registration', [UserController::class, 'setAccount']);
//client product
Router::get('/man-products', [ProductController::class, 'product']);
Router::post('/man-product', [ProductController::class, 'search_product']);
Router::get('/woman-products', [ProductController::class, 'product']);
Router::post('/woman-product', [ProductController::class, 'search_product']);


//cart

Router::get('/cart', [ProductController::class, 'carts']);
Router::post('/cart', [ProductController::class, 'addCart']);
Router::post('/confirmation', [ProductController::class, 'setBill']);
Router::get('/delete_cart', [ProductController::class, 'deleteCart']);
Router::get('/mycart', [ProductController::class, 'mycart']);
Router::get('/detail_bill', [ProductController::class, 'mycart']);

//comment
Router::post('/insert_comment', [CommentController::class, 'addComment']);

$router->resolve();
