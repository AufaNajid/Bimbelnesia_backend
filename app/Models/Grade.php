<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'branch_id',
        'grade_tag_id',
        'title'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'branch_id');
    }

    public function gradeTag()
    {
        return $this->belongsTo(GradeTag::class, 'grade_tag_id', 'grade_tag_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'grade_id', 'grade_id');
    }
}

