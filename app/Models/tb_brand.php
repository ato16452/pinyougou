<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_brand extends Model
{
    protected $table = 'tb_brand';
    // 不验证 时间字段
    public $timestamps = false;
}
