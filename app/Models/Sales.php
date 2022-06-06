<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Investments;
use App\Models\Sales;

class Sales extends Model
{
    protected $table = "sales";
    protected $fillable = [

        'itemsold',
        'quantitysold',
        'amountsold',
        'expenditure',
        'expenditureamount',
        'totalprice',
        'fkuser'
    ];
}

  