<?php

namespace App\Http\Controllers\Admin;

use App\Libraries\Bcrypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\AdminModel;

define("MISSING_PARAM", 110);

define("SUCCESS", 200);

define("ERROR", 100);

class AdminController extends Controller
{
    protected $bcrypt;
    protected $model;
    //
    public function __construct() {

        $this->model = new AdminModel;

        $this->bcrypt = new Bcrypt;

    }
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function view(Request $request) {

        $table = $request->segment(3, "");

        if ($table != "") {

            $pp = 2;

            $lstData = $this->model->getDataIntable($table, $pp);

            return view('admin.'.$table.'.view')->with(compact('table','lstData'));

        } else {

            return response()->view('errors.404', [], 404);

        }
    }

    public function login() {
        return view('admin.login');
    }

    public function doLogin(Request $request) {
        if ($request->isMethod('post')) {
            $username = $request->input('username');
            $password = $request->input('password');

            if(!empty($username) || !empty($password)) {
                $sysaccount = new SysAccount();
                $user_system = $sysaccount->getUserSystemAdmin($username, $password);
                if(count($user_system) > 0) {
                    if($this->bcrypt->check_password($password,$user_system[0]->password)) {
                        return redirect()->route('systemadmin.dashboard');
                    }
                }
            } else {
                return "Error!";
            }
        }
    }

    public function addAccount() {
        return view('admin.account.add');
    }

    public function doAddAccount(Request $request) {
        if ($request->isMethod('post')) {

            $sysaccount = new SysAccount();
            $sysaccount->name = $request->input('name');
            $sysaccount->username = $request->input('username');
            $sysaccount->password = $request->input('password');
            $sysaccount->email = $request->input('email');
            $res = $sysaccount->save();

            dd($res);
        }
    }

    public function create(Request $request) {

        $table = $request->segment(3, "");

        return view('admin.'.$table.'.add')->with('table', $table);

    }

    public function doCreate(Request $request) {

        if(empty($request->input('name'))) {
            
            return response()->json(['code' => MISSING_PARAM, 'message' => 'Thiếu thông tin dữ liệu!']);

        }

        $dataUpload = $request->all();

        $table = $request->segment(3, "");

        if ($table != "") {

            if(@$dataUpload['slug']) {

                if(!empty($dataUpload['slug'])) {

                    $total = 0;

                    $count = sizeof($this->model->getTagInNuyRountes($dataUpload['slug'],"","",""));

                    $total +=$count;

					$ext= $dataUpload['slug'];

                    while($count>0){

						$ext  = $dataUpload['slug'].($count>0?"-".($total+1):"");

						$count = sizeof($this->model->getTagInNuyRountes($ext,"","",""));

						$total +=1;

					}

					$dataUpload['slug']=$ext;

                }
                else {

                    dd('Xử lý khi slug trống!');

                }

            }

            $lastId = $this->model->insertData($dataUpload, $table);

            if($lastId > 0) {

                if(@$dataUpload['slug']){

                    $data= array();

                    $data['controller'] = $table.'.view';

                    $data['link']= $ext;

                    $data['note']=@$dataUpload['name']?$dataUpload['name']:"";

                    $data['table']=$table;

                    $data['is_static']= 0;

                    $data['tag_id']=$lastId;

                    $data['created_at'] = date("Y-m-d H:i:s ",time());

					$data['updated_at'] = date("Y-m-d H:i:s ",time());

                    $this->model->insertData($data,'routes');

                }

                return response()->json(['code' => SUCCESS, 'message' => 'Thêm mới thành công!']);

            }

        } else {

            return response()->view('errors.404', [], 404);

        }

    }

    // Hàm định dạng tên model
    private function formatModelName($table) {

        $parts = explode('_', $table);

        $formattedName = array_map('ucfirst', $parts);

        $formattedName = implode('', $formattedName);

        return $formattedName.'Model';

    }
}
