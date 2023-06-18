<?php

namespace App\Service\admin;
use App\Service\ServiceInterface;
use App\Repositories\admin\RoleRepository;

class RoleService implements ServiceInterface{
    public $roleRepository;

    public function __construct(RoleRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }
    /*
    //  @return void 
    */
    public function getAll(){
        return $this->roleRepository->getAll();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOne($id)
    {
        return $this->roleRepository->getOne($id);
    }

    public function paginate($num)
    {   
        return $this->roleRepository->paginate($num);
    }

    public function create(){

    }

    public function store($data){
      return $this->roleRepository->store($data);
    }

    public function edit($id)
    {
        
    }

    public function update($id, $data)
    {
        $this->roleRepository->update($id, $data);
    }
    
    public function destroy($id){
        $this->roleRepository->destroy($id);
    }   
}