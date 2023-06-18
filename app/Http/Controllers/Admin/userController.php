<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\admin\RoleService;
use App\Service\admin\UserService;
use Illuminate\Http\Request;
use Exception;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use App\Service\admin\PermissionService;
class userController extends Controller
{
    
    public $userService;
    public $roleService;
    public $permissionService;

    public function __construct(UserService $userService, RoleService $roleService, PermissionService $permissionService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    public function dashBoard(){
        return view('admin.dashboard');
    }

    public function index(){
        Session::put('user-url', request()->fullUrl());
        $users = $this->userService->paginate(6);
        return view('admin.user.index',compact('users'));
    }

    public function create(){
        $user = $this->userService->create();
        return view('admin.user.create',compact('user,role,permissions'));
    }

}
