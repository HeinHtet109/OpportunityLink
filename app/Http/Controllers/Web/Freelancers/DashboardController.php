<?php

namespace App\Http\Controllers\Web\Freelancers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('web.freelancers.dashboard.index');
    }
}
