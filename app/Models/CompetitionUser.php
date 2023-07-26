<?php

namespace App\Models;

use App\Models\Competition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetitionUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'part',
        'mark',
    ];

    // public function user()
    // {
    //     return $this->BelongsTo(User::class , 'user_id' , 'id');
    // }

    // public function competition()
    // {
    //     return $this->BelongsTo(Competition::class , 'competition_id' , 'id');
    // }
}
