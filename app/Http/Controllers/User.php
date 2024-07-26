<?php

namespace App\Http\Controllers;
use App\Models\User as UserModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;
class User extends Controller
{

    public function store(Request $request)
    {
       try{
        $user = new UserModel();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        if($request->input('role') == 'user'){
            $user->admin = false;
        }
        else{
            $user->admin = true;
        }
        $user->save();
       }
       catch(\Exception $e){
           return("Error: ".$e->getMessage());
       }
       return redirect('/users/all');
    }
    public function create(){
        return view('user.create');
    }
    public function getAll()
    {
        try{
            $users = UserModel::all();
            if (count($users) == 0) {
                $nonUsers = new UserModel;
                $nonUsers->name = 'Nenhum Usuário Encontrado';
                $nonUsers->id = 0;
                $data = [$nonUsers];
                return view('user.Alluser')->with('users', $data);
            }
        }
        catch(\Exception $e){
            return("Error: ".$e->getMessage());
        }
        return view('user.allUser')->with('users', $users);
    }
    public function getUser($id){
        try{
            $user = UserModel::find($id);
            if ($user == null) {
                return 'Usuário não encontrado';
            }
        }
        catch(\Exception $e){
            return("Error: ".$e->getMessage());
        }
        return view('user.user')->with('users', $user);
    }
    public function destroy($id)
    {
        try{
            $user = UserModel::find($id);
            $user->delete();
        }
        catch(\Exception $e){
            return("Error: ".$e->getMessage());
        }
        return redirect('/users/all');
    }
    public function login(){
        return view('user.login');
    }
    public function auth(Request $request){
        try{
            $user = UserModel::where('email', $request->input('email'))->first();
            if ($user == null) {
                dd($user);
                return redirect('/users/login');
            }
            else{
                if (FacadesHash::check($request->input('password'), $user->password)){
                    if ($user->admin == true){
                        $users = UserModel::all();
                        //return redirect('/users/all');
                        return view('user.allUser')->with('users', $users);
                    }
                    else if($user->admin == false){
                        return view('user.user')->with('users', $user);
                }
                else{
                    return 'senha incorreta';
                }
            }
        }}
        catch(\Exception $e){
            return("Error: ".$e->getMessage());
        }
    }
}
