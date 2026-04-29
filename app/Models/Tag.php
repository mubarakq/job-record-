<?php

namespace App\Models;

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
    public static function tagSorter(string $tagString): array
    {

        return collect(explode(',', $tagString))
            ->map(fn ($tag) => strtolower(trim($tag)))
            ->filter()
            ->unique()
            ->map(function ($tag) {
                return Tag::firstOrCreate(['name' => $tag])->id;
            })
            ->values()
            ->toArray();
    }

    // public static function tagSorter(string $tagString): array
    // {
    //     $tagNames = array_filter(
    //         array_unique(
    //             array_map('trim', explode(',', $tagString))
    //         )
    //     );

    //     $tagIDs = [];

    //     foreach ($tagNames as $name) {
    //         $tag = Tag::firstOrCreate(['name' => $name]);
    //         $tagIDs[] = $tag->id;
    //     }

    //     return $tagIDs;
    // }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'taggables', 'tag_id', 'job_id');
    }
}
