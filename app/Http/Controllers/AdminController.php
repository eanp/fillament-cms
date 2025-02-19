<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $totalUsers = $users->count();
        $writers = $users->where('role', 'writer')->count();
        $drafters = $users->where('role', 'drafter')->count();

        return view('dashboard.admin', compact('users', 'totalUsers', 'writers', 'drafters'));
    }
}
