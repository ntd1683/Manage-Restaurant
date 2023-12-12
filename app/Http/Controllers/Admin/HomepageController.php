<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomepageController extends Controller
{
    public function __invoke() : View
    {
        return view('admin.index');
    }
}
