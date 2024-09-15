<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'designation',
        'description',
    ];

    public function prepare_data(Request $request)
    {
        $imagePath = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time(). '_' . $file->getClientOriginalName();
            $file->storeAs('public/image', $filename);
            $imagePath = 'images/' .$filename;
        }
        return [
              "name" => $request->input('name'),
              "image" => $imagePath,
              "designation" => $request->input("designation"),
              "description" => $request->input('description'),
        ];
    }

    final public function storeAgent(Request $request): Builder|Model
    {
        return self::query()->create($this->prepare_data($request));
    }

    public function updateAgent(Request $request, Builder|Model $agent)
    {
        return $agent->update($this->prepare_data($request));
    }

    public function deleteAgent (Agent $agent)
    {
         return $agent->forceDelete();
    }



}
