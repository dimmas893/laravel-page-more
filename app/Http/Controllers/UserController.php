<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loadMore(Request $request)
    {
        $users = User::paginate(10);
        $data = '';
        if ($request->ajax()) {
            foreach ($users as $user) {
                $data .= '<li>' . 'Name:' . ' <strong>' . $user->name . '</strong><br> Email: ' . $user->email . '</li>';
            }
            return $data;
        }

        return view('welcome', compact('users'));
    }
}
