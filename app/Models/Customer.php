<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'designation',
        'description',
    ];
    public function getAllCustomers(){
        return $this->all();
    }

    public function prepare_data(Request $request)
    {
        $imagePath = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time(). '_' . $file->getClientOriginalName();
            $destinationPath = public_path('photos');
            $file->move($destinationPath, $filename); 
            $imagePath = 'photos/' . $filename;
        }
        return [
              "name" => $request->input('name'),
              "image" => $imagePath,
              "designation" => $request->input("designation"),
              "description" => $request->input('description'),
        ];
    }


    final public function storeCustomer(Request $request): Builder|Model
    {
        return self::query()->create($this->prepare_data($request));
    }

    final public function updateCustomer(Request $request, Builder|Model $customer)
    {
        return $customer->update($this->prepare_data($request));
    }

    public function deleteCustomer(Customer $customer)
    {
        return $customer->forceDelete();
    }

}