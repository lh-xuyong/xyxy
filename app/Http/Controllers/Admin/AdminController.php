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
            $data = request()->post();
            if ($data['pass'] != $data['confirm_pass']) {
                return $this->error('params_error', trans('admin.confirm_pass_error'));
            }

            try {
                $result = $this->userService->addUser($data);
                return $this->success();
            } catch (\Exception $e) {
                $errorData = [
                    'errMsg'      => $e->getMessage(),
                    'errTrace'    => $e->getTraceAsString(),
                    'requestData' => $data,
                ];
                QALog::error(__METHOD__, $errorData, self::LOG_FILE);
                return $this->error('service_error', trans('common.service_error'));
            }
//            return redirect('admin/index');
//            dump(request()->post());
        }else{
            return view('admin/admin/add');
        }
    }


}
