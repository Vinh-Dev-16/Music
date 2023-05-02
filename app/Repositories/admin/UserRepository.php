<?php

namespace App\Repositories\admin;
use App\Repositories\RepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UserRepository implements RepositoryInterface{

    /*
    //  @return void 
    */
    public function getAll(){
        return User::all();        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOne($id)
    {
        
    }

    public function paginate()
    {   
        return User::paginate(6);
    }

    public function create(){
       
    }

    public function store($data){
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        event(new Registered($user));
        Auth::login($user);
    }

    public function edit($id)
    {
        
    }

    public function update($id, $data)
    {
        
    }
    
    public function destroy($id){

    } 
}

