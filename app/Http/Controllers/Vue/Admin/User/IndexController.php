<?php

namespace App\Http\Controllers\Vue\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
      return view('Vue.Admin.User.Index');
    }
    public function index(){
        $users = User::all();
        $roles = User::getRoles();
//        return compact('users')->toJson();
    return compact('users','roles');

    }
}
