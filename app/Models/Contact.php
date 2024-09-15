<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];

    public function prepare_data(Request $request)
    {
        return [
            "name" =>$request->input('name'),
            "email" => $request->input ('email'),
            "subject" => $request->input('subject'),
            "message" => $request->input('message'),
        ];
    }
    public function storeContact(Request $request): Builder|Model
    {
        return self::query()->create($this->prepare_data($request));
    }
    public function updateContact(Request $request, Builder|Model $contact)
    {
        return $contact->update($this->prepare_data($request));
    }

    public function deleteContact(Contact $contact)
    {
        return $contact->forceDelete();
    }
}
