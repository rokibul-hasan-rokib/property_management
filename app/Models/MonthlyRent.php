<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\Paginator;


class MonthlyRent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bill_name',
        'bill_month',
        'bill_house',
        'bill_gas',
        'bill_water',
        'bill_serviceCharge',
        'bill_electrity',
        'status',
    ];

    public const STATUS_NOTPAID = 0;
    public const STATUS_PAID = 1;

    public const STATUS_LIST = [
        self::STATUS_PAID => 'Paid',
        self::STATUS_NOTPAID => 'Pending',
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

    final public function storeBill(Request $request): Builder|Model
    {
        return self::query()->create($this->prepare_data($request));
    }

    final public function updateCustomer(Request $request, Builder|Model $bill)
    {
        return $bill->update($this->prepare_data($request));
    }

    final function prepare_data(Request $request){
        return[
            "bill_name" => $request->input('bill_name'),
            "bill_month" => $request->input('bill_month'),
            "bill_house" => $request->input('bill_house'),
            "bill_gas" => $request->input('bill_gas'),
            "bill_water" => $request->input('bill_water'),
            "bill_serviceCharge" => $request->input('bill_serviceCharge'),
            "bill_electrity" => $request->input('bill_electricity'),
            "status" => $request->input('status'),
        ];
    }

    public function getAllUsers()
    {
        // Query to fetch all users with selected fields (id and name)
        return User::select('id', 'name')->orderBy('name', 'asc')->get();
    }

    public function getUserBillingHistory()
    {
        $user = Auth::user();
        return self::where('user_id', $user->id)->orderBy('bill_month', 'desc')->get();
    }

    public function deleteBill(MonthlyRent $bill)
    {
        return $bill->forceDelete();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}