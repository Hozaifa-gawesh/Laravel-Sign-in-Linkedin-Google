<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Companies;
use App\Models\Memberships;
use App\Models\MembersSubscribers;
use App\Models\User;

class HomeController extends Controller
{


    public function index()
    {
        $usersCount = User::count();
        $adminCount = Admin::count();
        return view('dashboard.index', compact('usersCount', 'adminCount'));
    }
}
