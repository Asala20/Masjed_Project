<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Aoqaf;
use App\Models\Competition;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'superviser',
        'password',
        'masjed',
        'deleted_at',
        'status',
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

    
    public function competitions(){
        return $this->belongsToMany(Competition::class, 'competition_user', 'user_id', 'competition_id')
        ->withPivot([ 'part' , 'mark' ]);
    }

    public function aoqafs()
    {
        return $this->hasMany(Aoqaf::class , 'user_id' , 'id');
    }

}
