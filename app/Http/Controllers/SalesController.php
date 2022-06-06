<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stocks;
use App\Models\Investments;
use App\Models\Sales;


class SalesController extends Controller
{ 
    public function sales(){
        $sales = Sales::all();
        return view('admin.sales.sales', compact('sales'));
    }

    public function addsales(Request $req){

        $quantitysold = $req->input('quantitysold');
        $salesprice = $req->input('salesprice');

        $amountsold = $salesprice * $quantitysold;

        $expenditureamount = $req->input('expenditureamount');

        $totalprice = $amountsold -  $expenditureamount;

        $createsale = Sales::create([
            'itemsold'=>$req->input('itemsold'),
            'quantitysold'=>$quantitysold, 
            'amountsold'=>$amountsold,
            'expenditure'=>$req->input('expenditure'),
            'expenditureamount'=>$expenditureamount,
            'totalprice'=>$totalprice,
            'fkuser'=>1
        ]);

        if ($createsale !== null) {
            $current = Investments::where('id', 1)->get();
            $currentsales = $current->sales;
            $currentprofits = $current->profits;
            $currentworkingcapital = $current[0]->workingcapital;

            $totalsales =  $currentsales + $totalprice;
            $totalprofits =  $totalsales - $currentworkingcapital;

            $updateinvestment = Investments::where('id', 1)->update([
                'sales'=>$totalsales,
                'profits'=>$totalprofits
            ]);
        }


        return back()->with('success', 'Item Sold Successfully');
    }
}
