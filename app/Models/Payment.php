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

    Public const JANUARY = 1;
    Public const FEBRUARY = 2;
    Public const MARCH = 3;
    Public const APRIL = 4;
    Public const MAY = 5;
    Public const JUNE = 6;
    Public const JULY = 7;
    Public const AUGUST = 8;
    Public const SEPTEMBER = 9;
    Public const OCTOBER = 10;
    Public const NOVEMBER = 11;
    Public const DECEMBER = 12;

    public const MONTH_LIST =
    [
        self::JANUARY => "January",
        self::FEBRUARY => "February",
        self::MARCH => "March",
        self::APRIL => "April",
        self::MAY => "May",
        self::JUNE => "June",
        self::JULY => "July",
        self::AUGUST => "August",
        self::SEPTEMBER => "September",
        self::OCTOBER => "October",
        self::NOVEMBER => "November",
        self::DECEMBER => "December",

    ];


    final public function prepare_data(Request $request){
        return [
              "name" => $request->input('name'),
              "number" => $request->input("number"),
              "amount" => $request->input('amount'),
              "month" => $request->input('month'),
              "flat" => $request->input('flat'),
              "apartment" => $request->input('apartment'),
              "descriptions" => $request->input('descriptions'),

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