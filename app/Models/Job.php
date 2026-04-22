<?php

namespace App\Models;

use App\Models\Employer;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    // disable auto-incrementing and set key type to string for ULID
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'employer_id',
        'title',
        'salary',
    ];

    // if tag string is comma separated, split it and trim whitespace, then attach each tag to the job
    public function tagSorter(String $tagString)
    {
        $tagname = array_map('trim', explode(',', $tagString));
        $tagID = [];

        foreach ($tagname as $tag) {    
             $tag = Tag::firstOrCreate(['name' => $tag]);
             $tagID[] = $tag->id;
        }

        $this->tags()->attach($tagID);
    }

    // generate a ULID for the job when it is created
    protected static function booted()
    {
        static::creating(function ($job) {
            if (empty($job->id)) {
                $job->id = (string) Str::ulid();
            }
        });
    }

    // define the relationship between job and employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    // define the relationship between job and tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'taggables', 'job_id', 'tag_id');
    }
}
