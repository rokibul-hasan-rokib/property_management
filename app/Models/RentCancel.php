<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class RentCancel extends Model
{
    use HasFactory;

    protected $guarded = [];

    final public  function prepare_data(Request $request){
        return [
              "cancel_month"=> $request->input('cancel_month'),
              'reason' => $request->input('reason'),
        ];
    }
    
}