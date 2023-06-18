<?php

namespace App\Repositories\admin;
use App\Repositories\RepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements RepositoryInterface{

    public function getAll(){
        return Role::all();
    }

    public function getOne($id){
        return Role::find($id);
    }

    public function paginate($num){
        return Role::paginate($num);
    }

    public function create(){
        
    }

    public function store($data){
        $role = Role::create(['name' => $data['role']]);
        if(!(empty($data['permission']))){
            $role->givePermissionTo($data['permission']);
        }
    }

    public function edit($id){  

    }

    public function update($id, $data){
        $role = Role::findOrFail($id);
        $role->name = $data['role'];
        $role->save();
        $role->syncPermissions($data['permission']);
    }

    public function destroy($id){
        $role = Role::find($id);
        $permission = $role->permissions;
        $role->revokePermissionTo($permission);
        $role->delete();
    }

}