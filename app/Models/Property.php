<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Property extends Model
{
    use HasFactory;
    protected $table = 'properties'; // Specify the table name if different from default

    protected $fillable = [
        'place', 'image', 'rent', 'house_details', 'floor', 'apartment', 'bed', 'washroom', 'belcony', 'kitchen'
    ];

    final public function prepare_data(Request $request){

        $imagePath = null;
        if($request->hasFile('image')){
             $file = $request->file('image');
             $filename = time() . '_' . $file->getClientOriginalName();
             $destinationPath = public_path('photos'); // Public directory 'public/images'
             $file->move($destinationPath, $filename); // Move file to the desired location
             $imagePath = 'photos/' . $filename; // Relative path to store in DB
            }
        if($request->hasFile('image2')){
             $file = $request->file('image');
             $filename = time() . '_' . $file->getClientOriginalName();
             $destinationPath = public_path('photos'); // Public directory 'public/images'
             $file->move($destinationPath, $filename); // Move file to the desired location
             $imagePath = 'photos/' . $filename; // Relative path to store in DB
            }
        if($request->hasFile('image3')){
             $file = $request->file('image');
             $filename = time() . '_' . $file->getClientOriginalName();
             $destinationPath = public_path('photos'); // Public directory 'public/images'
             $file->move($destinationPath, $filename); // Move file to the desired location
             $imagePath = 'photos/' . $filename; // Relative path to store in DB
            }
        if($request->hasFile('image4')){
             $file = $request->file('image');
             $filename = time() . '_' . $file->getClientOriginalName();
             $destinationPath = public_path('photos'); // Public directory 'public/images'
             $file->move($destinationPath, $filename); // Move file to the desired location
             $imagePath = 'photos/' . $filename; // Relative path to store in DB
            }
           return [
                "place" => $request->input('place'),
                "image" =>$imagePath,
                "image2" =>$imagePath,
                "image3" =>$imagePath,
                "image4" =>$imagePath,
                "rent" => $request->input('rent'),
                "house_details" => $request->input('house_details'),
                "floor" => $request->input('floor'),
                'apartment' => $request->input('apartment'),
                "bed" => $request->input('bed'),
                "washroom" => $request->input('washroom'),
                "belcony" => $request->input("belcony"),
                "kitchen" => $request->input("kitchen"),
           ];
    }

    final public function storeProperty(Request $request): Builder|Model
    {
        return self::query()->create($this->prepare_data($request));

    }

    public function updateProperty(Request $request, Builder|Model $property)
    {
        return $property->update($this->prepare_data($request));
    }

    public function deleteProperty(Property $property)
    {
        return $property->forceDelete();
    }





}