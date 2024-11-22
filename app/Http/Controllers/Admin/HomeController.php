<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\progenyperformance;
use App\Models\Topside;

class HomeController extends Controller
{
    public function progenyPerformance()
    {
       $progenyperformance=progenyperformance::first();
       return view('admin.progeny-performance.index')
       ->with('progenyperformance',$progenyperformance);
    }

    public function progenyPerformanceStore(Request $request)
    {
            $count=progenyperformance::count();
            if($count>0)
            {
                $validatedData = $request->validate([
                    'heading' => 'required|string|max:255',
                    'paragraph' => 'required|string',
                
               ]);
                $string = str_shuffle("abcdefghijklmnopqrstwxyz");
                if( $request->image){
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
    
                $destinationPath = 'progenyperformance/'.$currYr;
                $image->move($destinationPath,$fileName);
                $result = progenyperformance::where('id',1)->update([
                    'image' =>  $destinationPath.'/'.$fileName,
                ]);
                }

                $result = progenyperformance::where('id',1)->update([
                    'heading' => $request->heading,
                    'paragraph' => $request->paragraph,
                ]);

                return redirect('admin/performance-progeny');
            }
            else
            {
            $validatedData = $request->validate([
                    'heading' => 'required|string|max:255',
                    'paragraph' => 'required|string',
                    'image' => 'required|image|mimes:jpeg,png,jpg', // max size 2MB
            ]);
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $image = $request->image;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

            $destinationPath = 'progenyperformance/'.$currYr;
            $image->move($destinationPath,$fileName);
    
            // Save to the database
            $progenyperformance = new progenyperformance();
            $progenyperformance->heading= $request->heading;
            $progenyperformance->paragraph= $request->paragraph;
            $progenyperformance->image = $destinationPath.'/'.$fileName;
            $progenyperformance->save();

            return redirect('admin/performance-progeny');
            }
        
    }
    public function topside()
    {
       $topside=topside::first();
       return view('admin.topside.index')
       ->with('topside',$topside);
    }

    public function topSideStore(Request $request)
    {
            $count=Topside::count();
            if($count>0)
            {
                $string = str_shuffle("abcdefghijklmnopqrstwxyz");
                if( $request->image){
                    $image = $request->image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
        
                    $destinationPath = 'topside/'.$currYr;
                    $image->move($destinationPath,$fileName);
                    $result = Topside::where('id',1)->update([
                        'image' =>  $destinationPath.'/'.$fileName,
                    ]);
                }
                $result = Topside::where('id',1)->update([
                    'heading' => $request->heading,
                    'paragraph' => $request->paragraph,
                ]);
               return redirect('admin/topside');
            }
            else
            {
            $validatedData = $request->validate([
                    'heading' => 'required|string|max:255',
                    'paragraph' => 'required|string',
                    'image' => 'required|image|mimes:jpeg,png,jpg', // max size 2MB
            ]);
            
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $image = $request->image;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

            $destinationPath = 'topside/'.$currYr;
            $image->move($destinationPath,$fileName);
    
            // Save to the database
            $progenyperformance = new Topside();
            $progenyperformance->heading= $request->heading;
            $progenyperformance->paragraph= $request->paragraph;
            $progenyperformance->image = $destinationPath.'/'.$fileName;
            $progenyperformance->save();
            return redirect('admin/topside');
            }
        }
}
