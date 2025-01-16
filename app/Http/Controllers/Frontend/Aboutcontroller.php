<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ourteam;
use App\Models\aboutusbanner;
use App\Models\whatwedo;
use App\Models\brainthinker;
class Aboutcontroller extends Controller
{
    public function about()
    {
        $ourteams=ourteam::all();
        $whatwedo=whatwedo::first();
        $banner=aboutusbanner::first();
        $brainthinkers=brainthinker::get();
        return view('frontend.about')
        ->with('ourteams',$ourteams)
        ->with('whatwedo',$whatwedo)
        ->with('brainthinkers',$brainthinkers)
        ->with('banner',$banner);
    }
}
