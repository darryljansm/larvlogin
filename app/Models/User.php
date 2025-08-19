<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'contact_no',
        'email',
        'username',
        'password',
        'created_by',
        'deleted_by',
        'deleted_at'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Laravel 10+ auto-hashes
        ];
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

}
