<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_user extends Model
{
    protected $table = 'tb_user';
    public $timestamps = false;    //不验证 时间字段
}
