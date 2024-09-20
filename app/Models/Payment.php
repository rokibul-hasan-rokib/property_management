<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'amount',
        'month',
        'flat',
        'apartment',
        'descriptions',
    ];

    final public function prepare_data(Request $request){
        return [
              "name" => $request->input('name'),
              "number" => $request->input("number"),
              "amount" => $request->input('amount'),
              "month" => $request->input('month'),
              "flat" => $request->input('apartment'),
              "apartment" => $request->input('apartment'),
              "descriptions" => $request->inputl('descriptions'),

        ];
    }

    final public function storePayment(Request $request): Builder|Model
    {
        return self::query()->create($this->prepare_data($request));

    }

    public function updatePayment(Request $request, Builder|Model $payment)
    {
        return $payment->update($this->prepare_data(($request)));
    }

    public function deletePayment(Payment $payment)
    {
        return $payment->forceDelete();
    }

    

}
