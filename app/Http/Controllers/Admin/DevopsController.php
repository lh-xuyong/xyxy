<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Model\Devops;



class DevopsController extends Controller{

    public function index(){
        return view('admin/devops/index');
    }

    /**
     * 导入
     */
    public function import() {
        if(request()->isMethod('post')) {
            $file = request()->file('ticket_excel');
            if (!$file) {
                echo'未上传任何文件';
            }
            if (!$file->isValid()) {
                echo '文件上传失败';
            } else {
                $ext = $file->getClientOriginalExtension();
                if (!in_array($ext, ['xls', 'xlsx'])) {
                    echo '文件格式错误';
                }
                $newName = 'template/ticket_import_excel'.date('YmdHis').'.'.$ext;
                $realPath = $file->getRealPath();
                $res = Storage::disk('local')->put($newName, file_get_contents($realPath));
                if (!$res) {
                    echo '文件保存失败';
                } else {
                    $res = $this->actImport($newName);
                    if ($res) {
                        echo  '导入成功';
                    }
                }
            }
        }else{
            return view('admin/devops/import');
        }

    }

    // 导入请求工单
    public function actImport($newName)
    {
        Excel::load(storage_path().'/app/'.$newName, function($reader) use (&$inbound){
            $data = $reader->all()->toArray();
            foreach ($data as $k=>$v){
                $devops = new Devops();
                $v['created_at'] = date("Y-m-d H:i:s");
                $v['updated_at'] = date("Y-m-d H:i:s");
                $devops->insert($v);
            }
        });
    }

    /**
     * 导出
     */
    public function export(){

    }

}