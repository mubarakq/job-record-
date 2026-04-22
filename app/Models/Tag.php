<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'name',
    ];

    protected static function booted()
    {
        static::creating(function ($tag) {
            if (empty($tag->id)) {
                $tag->id = (string) Str::ulid();
            }
        });
    }
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'taggables', 'tag_id', 'job_id');
    }
}
