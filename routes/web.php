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
//Route::get('/admin/admin_change_message','Admin\AdminController@admin_change_message');
Route::post('/admin/message/{id}','Admin\AdminController@message');
Route::get('/admin/admin_change/{id}','Admin\AdminController@admin_change');
//管理员管理  admin_change_admin.blade.php
Route::get('/admin/admin_change_admin','Admin\AdminController@admin_change_admin');
Route::get('/admin/admin_update/{id}','Admin\AdminController@admin_update'); //管理员修改
Route::post('/admin/adminup','Admin\AdminController@adminup'); //管理员修改
Route::post('/admin/checkname','Admin\AdminController@checkname'); //管理员修改(校验名字是否重复,不包括自己)
Route::post('/admin/adminadd','Admin\AdminController@adminadd');
Route::post('/admin/adminadds','Admin\AdminController@adminadds');
Route::get('/admin/admin_change_status','Admin\AdminController@admin_change_status');
Route::get('/admin/admin_change_status2','Admin\AdminController@admin_change_status2');
Route::get('/admin/del/{id}','Admin\AdminController@del');


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
//测试分页
Route::get('/fenye/page','Admin\UserController@page');
Route::get('/fenye/page_pro','Admin\UserController@page_pro');


//品牌管理  brand.blade.php
Route::resource('brand','Admin\Goods\BrandController');
Route::get('brand_edit','Admin\Goods\BrandController@edit');
// Route::get('/admin/brand','Admin\BrandController');
//规格管理  specification.blade.php
Route::resource('specification','Admin\Goods\SpecificationController');
Route::get('specification_edit','Admin\Goods\SpecificationController@edit');
// Route::get('/admin/specification','Admin\AdminController@specification');
//模板管理  type_template.blade.php
Route::resource('type_template','Admin\Goods\Type_templateController');
Route::get('type_template_edit','Admin\Goods\Type_templateController@edit');
// Route::get('/admin/type_template','Admin\AdminController@type_template');
//分类管理  item_cat.blade.php
Route::resource('item_cat','Admin\Goods\Item_catController');
Route::get('item_cat_edit','Admin\Goods\Item_catController@edit');
// Route::get('/admin/item_cat','Admin\AdminController@item_cat');
//商品审核  goods.blade.php
Route::get('/admin/goods','Admin\AdminController@goods');
//广告管理->广告类型管理  content_category.blade.php
Route::get('/admin/content_category','Admin\AdminController@content_category');
//广告管理->广告管理 content
Route::get('/admin/content','Admin\AdminController@content');
//友情链接
Route::resource('/link','Link\AdvertisementController');
Route::post('/link/xiugai/{id}','Link\AdvertisementController@xiugai');
//运营商登录页  login.blade.php
Route::get('/admin/login','Admin\AdminController@login');
Route::post('/admin/login_in','Admin\AdminController@login_in');

Route::get('/l','Link\AdvertisementController@upload');
Route::post('/l/l','Link\AdvertisementController@up');

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





/*************前台页面显示***************/
// 购物车
Route::get('/cart', function () {
    return view('/Home/cart');
});
// 订单提交页面
Route::get('/getOrderInfo', function () {
    return view('/Home/getOrderInfo');
});
// 订单结算
Route::get('/pay', function () {
    return view('/Home/pay');
});
// 注册
// Route::get('/register', function () {
//     return view('/Home/register');
// });
// 登录
Route::get('/login', function () {
    return view('/Home/login');
});
// 商品详情
Route::get('/item', function () {
    return view('/Home/item');
});
// 我的订单
Route::get('/home', function () {
    return view('/Home/home-index');
});

/*************前台页面显示结束***************/


/*************前台路由显示***************/
Route::get('/register','Home\RegisterController@index');
Route::post('/register/insert','Home\RegisterController@insert');