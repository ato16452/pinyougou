<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    //商家审核 seller
    public function seller_1(){
        return view('Admin.admin.admin.seller_1');
    }
    //商家管理 seller
    public function seller(){


        return view('Admin.admin.admin.seller');
    }
}
