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
        static::creating(function ($project) {
            $faker = \Faker\Factory::create();

            if (empty($project->title)) {
                $project->title = $faker->sentence(3);
            }

            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title . '-' . $faker->unique()->word);
            }

            if (empty($project->description)) {
                $project->description = $faker->paragraph();
            }

            if (empty($project->url)) {
                $project->url = $faker->url();
            }

            if (empty($project->image)) {
                // use a placeholder path; you can change to a public image you have
                $project->image = 'img/default.jpg';
            }

            if (empty($project->tech_stack)) {
                $project->tech_stack = [$faker->word, $faker->word, 'laravel'];
            }
        });
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
