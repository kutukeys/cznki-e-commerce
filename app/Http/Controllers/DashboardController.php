<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investments;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        $investments = Investments::all();

        return view('admin.dashboard', compact('investments'));   
    }

    public function initiate() {
        
        $initiate = Investments::create([
            'fkuser' => 1,

        ]);
        return back()->with('success', 'Investment Initiated');
    }

    /////////ADD CAPITAL
    public function addcapital(Request $req){
        $currentcapitalx = Investments::where('fkuser', 1)->get();
           
        $currentcapital = $currentcapitalx[0]->capital;

        $updatecapital = Investments::where('fkuser', 1)->update([
            'capital' =>$currentcapital + $req->input('capital'),
        ]);

        return back()->with('success', 'Capital Updated Successfully');
    }
}
