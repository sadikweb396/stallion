<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stallion;

class MareController extends Controller
{
    public function index()
    {
        $mares=stallion::where('category','mares')->get();
        return view('admin.mare.index')
        ->with('mares',$mares);
    }
}
