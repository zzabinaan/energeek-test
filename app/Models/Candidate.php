<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'year'
    ];

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function skillSet(){
        return $this->HasMany(SkillSet::class);
    }


}
