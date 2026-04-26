<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use PHPUnit\Util\PHP\Job;
#[Fillable(['company_name', 'company_logo', 'company_website'])] //another way to define fillable properties using attributes instead of the $fillable property
class Employer extends Model
{
        /** @use HasFactory<EmployerFactory> */
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    
    // protected $fillable = [
    //     'company_name',
    //     'company_logo',
    //     'company_website',
    // ];

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
