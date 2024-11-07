<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\OtpNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

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

    public const STATUS_ACTIVE = 1;

    public const STATUS_INACTIVE = 0;

    public const STATUS_LIST = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
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

    final public function getAllUserForUpdate()
    {
        return self::query()
        ->select('id', 'role', 'name', 'status')
        ->orderby('id','desc')
        ->get();
    }

    final public function prepareDataForUpdate(Request $request)
    {
        return [
              'status' => $request->input('status'),
              'role'  => $request->input('role'),
        ];
    }

    public function sendOtpNotification()
    {
        $otp = rand(100000, 999999); // Generate a 6-digit OTP

        Otp::create([
            'user_id' => $this->id,
            'otp' => $otp,
            'is_used' => false,
        ]);

        $this->notify(new OtpNotification($otp));
    }

    final public function updateUser(Request $request, User $user)
    {
        return $user->update($this->prepareDataForUpdate($request));
    }

    final public function get_user_assoc(): Collection
    {
        return self::query()->pluck('name', 'id');
    }
}
