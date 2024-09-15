<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Owner extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'image',
        'designation',
        'description',
    ];

    final public function prepare_data(Request $request)
    {
        $imagePath = null;
        if($request->hasFile('image')){
             $file = $request->file('image');
             $filename = time() . '_' . $file->getClientOriginalName();
             $file->storeAs('pulic/images',$filename);
             $imagePath = 'images/' . $filename;
            }
        return [
              "name" => $request->input('name'),
              "image" => $imagePath,
              "designation" => $request->input("designation"),
              "description" => $request->input('description'),
        ];
    }

    final public function storeOwner(Request $request): Builder|Model
    {
        return self::query()->create($this->prepare_data($request));
    }

    final public function updateOwner(Request $request, Builder|Model $owner)
    {
        return $owner->update($this->prepare_data($request));
    }

    public function deleteOwner(Owner $owner)
    {
        return $owner->forceDelete();  
    }
}
