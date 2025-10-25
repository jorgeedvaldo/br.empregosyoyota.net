<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'company',
        'location',
        'content',
        'apply',
        'image',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($job) {
            $job->slug = $job->generateSlug($job->title, $job->id);
            $job->save();
        });
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_jobs');
    }

    private function generateSlug($title, $id)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $slug = $slug . '-' . $id;
        }
        return $slug;
    }
}
