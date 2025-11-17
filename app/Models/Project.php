<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'url',
        'tech_stack',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'tech_stack' => 'array',
    ];

    /**
     * Boot the model and fill missing attributes with dummy data when creating.
     */
    protected static function booted()
    {
        static::creating(function (Project $project) {
            if (empty($project->title)) {
                $project->title = 'Untitled Project';
            }

            if (empty($project->slug)) {
                $project->slug = static::uniqueSlug($project->title);
            }

            if (is_string($project->tech_stack)) {
                $decoded = json_decode($project->tech_stack, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $project->tech_stack = array_values(array_filter(array_map('strval', $decoded)));
                }
            }
        });

        static::updating(function (Project $project) {
            if ($project->isDirty('slug')) {
                $project->slug = static::uniqueSlug($project->slug, $project->getKey());
            }

            if ($project->isDirty('title') && empty($project->slug)) {
                $project->slug = static::uniqueSlug($project->title, $project->getKey());
            }

            if (is_string($project->tech_stack)) {
                $decoded = json_decode($project->tech_stack, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $project->tech_stack = array_values(array_filter(array_map('strval', $decoded)));
                }
            }
        });
    }

    /**
     * Generate a unique slug based on the provided source string.
     */
    public static function uniqueSlug(?string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source ?? '') ?: Str::random(8);
        $candidate = $base;
        $suffix = 2;

        while (
            static::where('slug', $candidate)
                ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
                ->exists()
        ) {
            $candidate = $base.'-'.$suffix;
            $suffix++;
        }

        return $candidate;
    }

    /**
     * The owner/author of the project (user).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Comments for the project.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
