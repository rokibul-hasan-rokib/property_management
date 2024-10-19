<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'designation',
        'description',
    ];

    final public function getAllAgent(){
        return $this->all();
    }

    public function prepare_data(Request $request)
    {
        $imagePath = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time(). '_' . $file->getClientOriginalName();
            $destinationPath = public_path('photos'); // Public directory 'public/images'
            $file->move($destinationPath, $filename); // Move file to the desired location
            $imagePath = 'photos/' . $filename; // Relative path to store in DB
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
