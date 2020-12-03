<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin;

class AdminController extends Controller
{
    public function index() {

        $admin_list = Admin::all();
//        dd($admin_list);
        return view('admin/admin/index', [
            'admin_list' => $admin_list,
        ]);
    }

    public function add() {
        if(request()->isMethod('post')){
            echo 123;
            return redirect('admin/index');
//            dump(request()->post());
        }else{
            return view('admin/admin/add');
        }
    }
}
