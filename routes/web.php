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
//首页
Route::get('/', function () {
    return view('/Home/index');
});
//登陆页面
Route::get('/index/login','Home\LoginController@login');
/*************************************运营商后台页面显示**********************************/
//运营商后台首页 index.blade.php
Route::get('/admin/index','Admin\AdminController@index');
//首页 home.blade.php
Route::get('/admin/home','Admin\AdminController@home');
//商家审核 seller_1.blade.php
Route::get('/admin/seller_1','Admin\AdminController@seller_1');
//商家管理 seller.blade.php
Route::get('/admin/seller','Admin\AdminController@seller');
//品牌管理  brand.blade.php
Route::get('/admin/brand','Admin\AdminController@brand');
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
Route::get('/admin/login','Admin\AdminController@content');
/*************************************运营商后台页面显示**********************************/



/*************商家后台页面显示***************/
Route::get('/admin/goods','Admin\AdminController@goods');

