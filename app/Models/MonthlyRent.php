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
        'bill_electrity',
        'status',
    ];

    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;

    public const STATUS_LIST = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
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