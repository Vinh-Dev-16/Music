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

    public function paginate(){

    }

    public function create(){
        
    }

    public function store($data){
        $role = Role::create(['name' => $data['name']]);
        $role->givePermissionTo($data['permission']);
    }

    public function edit($id){  

    }

    public function update($id, $data){

    }

    public function destroy($id){

    }

}