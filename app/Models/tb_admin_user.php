<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_admin_user extends Model
{
    protected $table = 'tb_admin_user';
    // 不验证 时间字段
    public $timestamps = false;
}
