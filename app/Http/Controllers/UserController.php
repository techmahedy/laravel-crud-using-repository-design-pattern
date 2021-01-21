<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\IUserRepository;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{   
    public $user;
    
    public function __construct(IUserRepository $user)
    {
        $this->user = $user;
    }

    public function showUsers()
    {
        $users = $this->user->getAllUsers();
        $users->load('country');
        return View::make('user.index', compact('users'));
    }
    
    public function createUser()
    {
        return View::make('user.edit');
    }

    public function getUser($id)
    {
        $user = $this->user->getUserById($id);
        return View::make('user.edit', compact('user'));
    }
    
    public function saveUser(Request $request, $id = null)
    {   
        $collection = $request->except(['_token','_method']);

        if( ! is_null( $id ) ) 
        {
            $this->user->createOrUpdate($id, $collection);
        }
        else
        {
            $this->user->createOrUpdate($id = null, $collection);
        }

        return redirect()->route('user.list');
    }

    public function deleteUser($id)
    {
        $this->user->deleteUser($id);

        return redirect()->route('user.list');
    }
}
