<?php

namespace App\Http\Controllers\Vue\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('Vue.Admin.Main.Index');
    }

}
