<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthlyRent extends Model
{
    use HasFactory;

    protected $guarded = [];

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

    protected function prepare_data(Request $request){
        return[
            "user_id" => Auth::id(),
            "bill_name" => $request->input('bill_name'),
            "bill_month" => $request->input('bill_month'),
            "bill_house" => $request->input('bill_house'),
            "bill_electrity" => $request->input('bill_electricity'),
            "status" => $request->input('status'),
        ];
    }

    public function deleteBill(MonthlyRent $bill)
    {
        return $bill->forceDelete();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRentsWithUsers()
    {
        return self::with('user')->get();
    }
}