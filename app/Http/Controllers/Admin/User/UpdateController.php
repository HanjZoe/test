<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make(Str::random(10));

        $user->update($data);
        $ll = $data['password'];
        Mail::to($data['email'])->send(new PasswordMail($ll));
        return view('Admin.User.Show', compact('user'));
    }
}
