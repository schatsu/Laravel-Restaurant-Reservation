<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
     'parent_id','image','name',
     'description','order','status',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function parent() : BelongsTo
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function menu(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class,'menu_category');
    }

    public function saveQuietly(array $options = [])
    {
        return static::withoutEvents(function() {
            return $this->save();
        });
    }
    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName():string
    {
        return 'slug';
    }
}
