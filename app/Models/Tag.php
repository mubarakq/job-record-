<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;
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

     // if tag string is comma separated, split it and trim whitespace, then attach each tag to the job
    public static function tagSorter(String $tagString)
    {
        $tagname = array_map('trim', explode(',', $tagString));
        $tagID = [];

        foreach ($tagname as $tag) {    
             $tag = Tag::firstOrCreate(['name' => $tag]);
             $tagID[] = $tag->id;
        }

        return $tagID;
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'taggables', 'tag_id', 'job_id');
    }
}
