<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Competition extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'name',
        'end_date',
        'start_date',
        'deleted_at'
    ];

    
    public function users(){
        return $this->belongsToMany(User::class, 'competition_user', 'competition_id', 'user_id');
    }
}
