<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name',
        'username',
        'email',
        'password',
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
    ];

    public function posts()
    {

        return $this->hasMany(Post::class);
    }

    public function likes()
    {

        return $this->hasMany(Like::class);
    }

    //almacenar usuarios que nos siguen 
    public function followers()
    {
        // pertenece a muchos esta relacion belongsToMany 
        //nos salimos de la converncion de laravel y tenemos que especificar para encontrar la referencia le decimos el metodo que es followers y agregamos la tabla foranea qu hace de pibote user_id, follower_id
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    //Almacenar los que seguimos 

    public function followings()
    {

        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }


    //Comprobar si un usuario ya sigue a otro 
    public function siguiendo(User $user)
    {

        return $this->followers->contains($user->id);
    }

    //Almacenar los que seguimos 


}
