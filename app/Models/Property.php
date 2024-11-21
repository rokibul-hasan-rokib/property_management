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
        'place', 'image','image2','image3','image4', 'rent', 'house_details', 'floor', 'apartment', 'bed', 'washroom', 'belcony', 'kitchen'
    ];

    public const STATUS_BOOKED = 1;

    public const STATUS_AVAILABLE = 0;

    public const STATUS_LIST = [
        self::STATUS_BOOKED => 'Booked',
        self::STATUS_AVAILABLE => 'Available',
    ];




    final public function prepare_data(Request $request)
    {
        // Function to handle image upload
        $uploadImage = function ($imageKey) use ($request) {
            if ($request->hasFile($imageKey)) {
                $file = $request->file($imageKey);
                $filename = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('photos'); // Public directory 'public/photos'
                $file->move($destinationPath, $filename); // Move file to the desired location
                return 'photos/' . $filename; // Relative path to store in DB
            }
            return null;
        };

        // Upload each image
        $imagePath = $uploadImage('image');
        $imagePath2 = $uploadImage('image2');
        $imagePath3 = $uploadImage('image3');
        $imagePath4 = $uploadImage('image4');

        return [
            "place" => $request->input('place'),
            "image" => $imagePath,
            "image2" => $imagePath2,
            "image3" => $imagePath3,
            "image4" => $imagePath4,
            "rent" => $request->input('rent'),
            "house_details" => $request->input('house_details'),
            "location" => $request->input('location'),
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
