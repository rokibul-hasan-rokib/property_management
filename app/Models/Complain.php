<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'flat',
        'apartment',
        'descriptions',
    ];

    final public function prepare_data(Request $request){
        return [
              "name" => $request->input('name'),
              "number" => $request->input("number"),
              "flat" => $request->input('flat'),
              "apartment" => $request->input('apartment'),
              "descriptions" => $request->input('descriptions'),
        ];
    }


}
