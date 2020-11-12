<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parameter extends Model
{
    use SoftDeletes;

    // 表名
    protected $table = 'parameters';
    // 黑名单
    protected $guarded = [];
    protected $dates = [
        'deleted_at'
    ];
    /**
     * 应该被转换成原生类型的属性。
     *
     * @var array
     */
    protected $casts = [
        'option_list' => 'array',
        'is_system' => 'boolean'
    ];

    public function getStatusAttribute($status)
    {
        return $this->option_list[$status];
    }

//    public function getOptionList()
//    {
//        return implode(",",$this->option_list);
//    }

}
