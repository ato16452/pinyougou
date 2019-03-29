<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_chart extends Model
{
    protected $table = 'tb_content_category';
    // 不验证 时间字段
    public $timestamps = false;
}
