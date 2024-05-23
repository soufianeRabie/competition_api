<?php

namespace App\Models;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prenom',
        'nom',
        'nationality',
        'email',
        'password',
        'role_id'
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getEntrepriseAttribute()
    {
        return $this->entreprise()->first();
    }
    public function entreprise()
    {
        return $this->hasOne(Entreprise::class , 'user_id');

    }
    public function profile ()
    {
        return $this->hasOne(Profil::class);
    }


    protected $appends = ['role_name' , 'profile' , 'intervenant' ,'entreprise' ];

    public function getRoleNameAttribute()
    {
        return $this->role ? $this->role->name : null;
    }

    public function getIntervenantAttribute()
    {
        return $this->intervenant()->first();
    }
    public function intervenant()
    {
        return $this->hasOne(Intervenant::class , 'users_id');

    }

    public function getProfileAttribute()
    {
        return $this->profile()->first();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function region()
    {
        return $this->hasOne(Region::class , 'users_id');
    }

}
