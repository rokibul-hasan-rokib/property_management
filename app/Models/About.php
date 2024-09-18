<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'quality',
        'rate',
        'security',
    ];

    final public function prepare_data(Request $request)
    {
        $imagePath = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time(). '_' . $file->getClientOriginalName();
            $destinationPath = public_path('photos'); // Public directory 'public/images'
            $file->move($destinationPath, $filename); // Move file to the desired location
            $imagePath = 'photos/' . $filename; // Relative path to store in DB
        }

        return  [
          'image' => $imagePath,
          'quality' => $request->input('quality'),
          'rate' => $request->input('rate'),
          'security' => $request->input('security'),
        ];
    }

    final public function storeAbout(Request $request): Builder|Model
    {
      return self::query()->create($this->prepare_data($request));
    }
    public function updateAbout(Request $request, Builder|Model $about)
    {
        return $about->update($this->prepare_data($request));
    }
    public function deleteAbout(About $about)
    {
        return $about->forceDelete();
    }




    
}
