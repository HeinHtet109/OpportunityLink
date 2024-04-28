<?php

namespace App\Http\Controllers\Web\Employers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('web.employers.dashboard.index');
    }
}
