<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stocks;
use App\Models\Investments;

class StocksController extends Controller
{
    public function stock() {

        $stocks = stocks::all();
        return view('admin.stock.stocks', compact('stocks'));
    }

    public function addstock(Request $req){
        $stockquantity = $req->input('quantity');
        $stockprice = $req->input('stockprice');
        $salesprice = $req->input('salesprice');

        /////STOCK AMOUNT

        $stockamount= $stockquantity * $stockprice;

        $profits = ($salesprice * $stockquantity) - $stockamount;

        $createstock = Stocks::create([
            'itemstocked'=>$req->input('stockitem'),
            'stockquantity'=> $stockquantity,
            'stockamount'=> $stockamount,
            'stockprice'=> $stockprice,
            'salesprice'=> $salesprice,
            'profits'=> $profits ,
            'fkuser'=>1

        ]);

        if ($createstock !== null) {
            $currentcapitalx = Investments::where('fkuser', 1)->get();
           
            $currentcapital = $currentcapitalx[0]->capital;
            $currentworkingcapital = $currentcapitalx[0]->workingcapital;

            $newcapital = $currentcapital - $stockamount;

            $updatecapital = Investments::where('fkuser', 1)->update([
                'capital'=>$newcapital,
                'workingcapital'=>$currentworkingcapital + $stockamount,
            ]);
        }
        
        
        return back()->with('success', 'Stock Added');

    }

}
