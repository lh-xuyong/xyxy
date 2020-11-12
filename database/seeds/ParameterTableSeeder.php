<?php

use Illuminate\Database\Seeder;

class ParameterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('parameters')->insert([
            'name' => 'status',
            'status' => 1,
            'is_system' => true,
            'description' => '普通状态',
            'option_list' => '{1:"激活",2:"规划",3:"注销"}'
        ]);
        DB::table('parameters')->insert([
            'name' => 'role_type',
            'status' => 1,
            'is_system' => true,
            'description' => '角色类型',
            'option_list' => '{1:"超级管理员",2:"管理员",3:"用户"}'
        ]);
    }
}
