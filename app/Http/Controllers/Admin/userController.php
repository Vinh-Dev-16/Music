<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\admin\UserService;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
class userController extends Controller
{
    public $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;   
    }

    public function register(){
        return view('register');
    }


    public function doRegister(Request $request){

        if ($request->isMethod('POST')) {
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ];
            $messages = [
                'required' => 'Không được để trống trường này',
                'min' => 'Mật khẩu tối thiểu phải 6 kí tự',
                'email' => 'Phải nhập đúng định dạng email',
                'same:password' => 'Mật khẩu nhập phải trùng khớp',
                'unique:users' => 'Đã bị trùng email',
            ];
            $request->validate($rules, $messages);
        }

        // try{
            $data = $request->all();
            $this->userService->store($data);
            return redirect('/');
        // }catch(Exception $e){
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }

    public function login(){
        return view('login');   
    }

    public function createRole(Request $request){
        
    }

    public function index(){
        $users = $this->userService->paginate();
        return view('admin.user.index',compact('users'));
    }



}
