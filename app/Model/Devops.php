<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devops extends Model
{
    use SoftDeletes;

    // 表名
    protected $table = 'devops_excel';
    // 黑名单
//    protected $guarded = [];
//    protected $dates = [
//        'deleted_at'
//    ];

//    protected $casts = [
//        'option_list' => 'array',
//        'is_system' => 'boolean'
//    ];
//
//    public function getStatusAttribute($status)
//    {
//        $parameter = Parameter::where('name', "status")->FirstOrFail();
//        return $parameter->option_list[$status];
//    }

//    public function getOptionList()
//    {
//        return implode(",",$this->option_list);
//    }

}
