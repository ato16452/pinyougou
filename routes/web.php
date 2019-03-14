<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//前台首页
Route::get('/', function () {
    return view('/Home/index');
});
//登陆页面
//Route::get('/admin/login','Admin\AdminController@login');
/*************************************运营商后台页面显示**********************************/
//运营商后台首页 index.blade.php
Route::get('/admin/index','Admin\AdminController@index');
//首页 home.blade.php
Route::get('/admin/home','Admin\AdminController@home');
//管理员管理  修改资料 admin_change_message.blade.php
Route::get('/admin/admin_change_message','Admin\AdminController@admin_change_message');
Route::post('/admin/message/{id}','Admin\AdminController@message');
Route::get('/admin/admin_change/{id}','Admin\AdminController@admin_change');
//管理员管理  admin_change_admin.blade.php
Route::get('/admin/admin_change_admin','Admin\AdminController@admin_change_admin');
//商家审核 seller_1.blade.php
Route::get('/admin/seller_1','Admin\SellerController@seller_1');
//商家管理 seller.blade.php
Route::get('/admin/seller','Admin\SellerController@seller');

//用户管理  编辑用户
Route::resource('/user','Admin\UserController');
//批量删除用户
Route::post('/user/delAll','Admin\UserController@delAll');
//搜索用户
Route::get('/user/search','Admin\UserController@index');

//品牌管理  brand.blade.php
Route::resource('brand','Admin\Goods\BrandController');
// Route::get('/admin/brand','Admin\BrandController');
//规格管理  specification.blade.php
Route::get('/admin/specification','Admin\AdminController@specification');
//模板管理  type_template.blade.php
Route::get('/admin/type_template','Admin\AdminController@type_template');
//分类管理  item_cat.blade.php
Route::get('/admin/item_cat','Admin\AdminController@item_cat');
//商品审核  goods.blade.php
Route::get('/admin/goods','Admin\AdminController@goods');
//广告管理->广告类型管理  content_category.blade.php
Route::get('/admin/content_category','Admin\AdminController@content_category');
//广告管理->广告管理 content
Route::get('/admin/content','Admin\AdminController@content');
//运营商登录页  login.blade.php
Route::get('/admin/login','Admin\AdminController@login');
Route::post('/admin/login_in','Admin\AdminController@login_in');



/*************************************运营商后台页面显示**********************************/



/*************商家后台页面显示***************/
//首页 index.blade.php
Route::get('/seller/index','Seller\SellerController@index');
//品优购商家后台 home.blade.php
Route::get('/seller/home','Seller\SellerController@home');
//修改资料  seller.blade.php
Route::get('/seller/seller','Seller\SellerController@seller');
//修改密码 password.blade.php
Route::get('/seller/password','Seller\SellerController@password');
//新增商品  goods_edit.blade.php
Route::get('/seller/goods_edit','Seller\SellerController@goods_edit');
//商品管理 goods.blade.php
Route::get('/seller/goods','Seller\SellerController@goods');
//登录注册页面  shoplogin.blade.php
Route::get('/seller/shoplogin','Seller\SellerController@shoplogin');
//商家入驻 register.blade.php
Route::get('/seller/register','Seller\SellerController@register');
/*************商家后台页面显示***************/

