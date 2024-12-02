<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans=plan::all();
        return view('admin.plan.index')
        ->with('plans',$plans);
    }
    public function create()
    {
        return view('admin.plan.create');
    }

    public function store(Request $request)
    {
        $plan = new plan();
        $plan->plan_name=$request->plan_name;
        $plan->plan_price=$request->plan_price;
        $plan->plan_duration=$request->plan_duration;
        $plan->plan_for=$request->plan_for;
        $plan->plan_details=$request->plan_details;
        $plan->save(); 
        toast('Plan created  successfully!','success');
        return redirect('admin/plan');
    }

    public function edit($id)
    {   
        $plansfor=['owner','member','stallion','mare'];
        $plan=plan::where('id',$id)->first();
        return view('admin.plan.edit')
        ->with('plan',$plan)
        ->with('plansfor',$plansfor);
    }

    public function update(Request $request ,$id)
    {
        $plan=plan::find($id);
        $plan->plan_name=$request->plan_name;
        $plan->plan_price=$request->plan_price;
        $plan->plan_duration=$request->plan_duration;
        $plan->plan_for=$request->plan_for;
        $plan->plan_details=$request->plan_details;
        $plan->save(); 
        toast('Plan Updated  successfully!','success');
        return redirect('admin/plan');
    }

    public function delete($id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            toast('Plan Delete  successfully!','success');
            return redirect()->route('admin.plans.index');
        }
        $plan->delete();
        toast('Plan Delete  successfully!','success');
        return redirect()->route('admin.plans.index');
    }
    
}
