<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CancelFlat extends Model
{
    use HasFactory;

    protected $guarded = [];

    final public function store_cancel_flat(Request $request): Builder|Model
    {
        return self::query()->create($this->prepare_data($request));
    }
    public function update_cancel_flat(Request $request, Builder|Model $cancel_flat)
    {
        return $cancel_flat->update($this->prepare_data($request));
    }


    final public function prepare_data(Request $request)
    {
        return [
          "cancel_month" => $request->input('cancel_month'),
          'reason' => $request->input('reason'),
        ];
     }
}