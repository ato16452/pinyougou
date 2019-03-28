<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tb_goods;
class GoodsaddController extends Controller
{
        public function add(Request $request){
            $goods = new tb_goods();
            $html = $request->input('html');
            $goods_name = $request->input('goods_name');
            $price = $request->input('price');

        }
}
