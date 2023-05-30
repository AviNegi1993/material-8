<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        return view('pages.users.index');
    }

    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }
}
