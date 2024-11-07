<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Booked extends Model
{
    use HasFactory;

    protected $fillable = ['user_name', 'email', 'phone', 'status'];

    public const STATUS_ACCEPT = 1;

    public const STATUS_PENDING = 0;
    public const STATUS_REJECTED = 2;

    public const STATUS_LIST = [
        self::STATUS_ACCEPT => 'Accept',
        self::STATUS_ACCEPT => 'Pending',
        self::STATUS_REJECTED => 'Rejected',
    ];

    final public function getAllBookedLists()
    {
        return self::query()
        ->select('id','user_name','email','phone','status')
        ->orderBy('id','desc')
        ->get();
    }

    final public function updateBooked(Request $request,Booked $booked)
    {
       return $booked->update($this->prepareDataForUpdate($request));
    }

    public function prepareDataForUpdate(Request $request)
    {
        return [
           'status' => $request->input('status')
        ];
    }

    final public function deleteBooked(Booked $booked)
    {
       return $booked->delete();
    }

}
