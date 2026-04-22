<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use PHPUnit\Util\PHP\Job;

class Employer extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'company_name',
        'company_logo',
    ];

    protected static function booted()
    {
        static::creating(function ($employer) {
            if (empty($employer->id)) {
                $employer->id = (string) Str::ulid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
