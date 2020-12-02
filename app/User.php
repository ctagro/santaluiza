<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use App\Models\Balance;
use App\Models\Historic;
use App\Models\Despesa;
use App\Models\Despesa_conta;
use App\Models\Origem;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    public function historics()
    {
        return $this->hasMany(Historic::class);
    }

    public function getSender($sender)
    {
        return $this->Where('name', 'LIKE', "%$sender%")
                        ->orWhere('email', $sender)
                        ->get()
                        ->first();
    }

    public function despesa()
    {
        return $this->hasMany(Despesa::class);
    }

    public function getLastDespesa($sender)
    {
        return $this->Where('name', 'LIKE', "%$sender%")
                        ->orWhere('email', $sender)
                        ->get()
                        ->first();
    }

    public function despesa_conta()
    {
        return $this->hasMany(Despesa_conta::class);
    }

    public function origem()
    {
        return $this->hasMany(Origem::class);
    }
}
