<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'date',
        'success',
        'repeaters'
    ];

    
    public function users(){
        return $this->belongsToMany(User::class, 'competition_user', 'competition_id', 'user_id');
    }
}
