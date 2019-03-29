<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_goods extends Model
{
    protected $table = 'tb_goods';
    // 不验证 时间字段
    public $timestamps = false;
}
