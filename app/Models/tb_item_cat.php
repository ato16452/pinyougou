<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_item_cat extends Model
{
    protected $table = 'tb_item_cat';
    // 不验证 时间字段
    public $timestamps = false;
}
