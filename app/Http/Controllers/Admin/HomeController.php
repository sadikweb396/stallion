<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\progenyperformance;
use App\Models\topside;

class HomeController extends Controller
{
    public function mareSection()
    {
       $progenyperformance=progenyperformance::first();
       return view('admin.home.mare-section')
       ->with('progenyperformance',$progenyperformance);
    }

    public function mareSectionStore(Request $request)
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
                toast('mare section udpate  successfully!','success');
                return redirect('admin/home/mare-section');

                
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

            toast('mare section create  successfully!','success');
            return redirect('admin/home/mare-section');

            }
        
    }
    public function stallionSection()
    {
       $topside=topside::first();
       return view('admin.home.stallion-section')
       ->with('topside',$topside);
    }

    public function stallionSectionStore(Request $request)
    {
         try { 
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
                    $result = topside::where('id',1)->update([
                        'image' =>  $destinationPath.'/'.$fileName,
                    ]);
                }
                $result = topside::where('id',1)->update([
                    'heading' => $request->heading,
                    'paragraph' => $request->paragraph,
                ]);
                toast('stallion section udpate  successfully!','success');
                return redirect('admin/home/stallion-section');
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
            $progenyperformance = new topside();
            $progenyperformance->heading= $request->heading;
            $progenyperformance->paragraph= $request->paragraph;
            $progenyperformance->image = $destinationPath.'/'.$fileName;
            $progenyperformance->save();
            toast('stallion section created  successfully!','success');
            return redirect('admin/home/stallion-section');
            }
        }
        catch (\Exception $e){
            Alert::error('Error', 'Error stallion  setion : ' . $e->getMessage());
            return back();

        }
    }
}
