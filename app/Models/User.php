<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'current_address',
        'employment_status',
        'monthly_income',
        'nid',
        'emergency_contact',
        'preferred_move_in_date',
        'has_pets',
        'rental_budget',
        'password',
    ];

    // Make sure to hide the password when serializing the model

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const DEFAULT_PASSWORD = "admin123";

    final public function prepare_data (Request $request)
    {
        return [
               "name" => $request->input('name'),
               "email" => $request->input('email'),
               "password" => bcrypt($request->input('password')),
        ];
    }


}
