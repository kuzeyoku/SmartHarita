<?php

namespace App\Models;

use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'slug',
        'status',
        'category_id',
        'user_id',
        "order"
    ];

    protected $locale;

    protected $with = ["category", "translate", "user", "comments"];

    public function __construct()
    {
        parent::__construct();
        $this->locale = session()->get("locale");
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(StatusEnum::Active->value);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy("order", "asc")->orderBy("id", "desc");
    }

    public function scopeViewOrder($query)
    {
        return $query->orderBy("view_count", "desc");
    }

    public function translate()
    {
        return $this->hasMany(BlogTranslate::class, 'post_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class, "post_id", "id")->orderBy("id", "DESC")->whereStatus(StatusEnum::Active->value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPreviousAttribute()
    {
        return $this->where("id", ">", $this->id)->orderBy("id", "ASC")->first();
    }

    public function getNextAttribute()
    {
        return $this->where("id", "<", $this->id)->orderBy("id", "ASC")->first();
    }

    public function getTitleAttribute()
    {
        return $this->translate->where("lang", $this->locale)->pluck('title')->first();
    }

    public function getTitlesAttribute()
    {
        return $this->translate->pluck('title', "lang")->all();
    }

    public function getDescriptionAttribute()
    {
        return $this->translate->where("lang", $this->locale)->pluck('description')->first();
    }

    public function getDescriptionsAttribute()
    {
        return $this->translate->pluck('description', "lang")->all();
    }

    public function getTagsAttribute()
    {
        return $this->translate->pluck('tags', "lang")->all();
    }

    public function getTagsToArrayAttribute()
    {
        return explode(",", $this->translate->pluck('tags', "lang")->first());
    }

    public function getShortDescriptionAttribute()
    {
        return Str::limit(strip_tags($this->description), 90);
    }

    public function getUrlAttribute()
    {
        return route(ModuleEnum::Blog->route() . ".show", [$this->id, $this->slug]);
    }

    public function getCategoryUrlAttribute()
    {
        return route(ModuleEnum::Blog->route() . ".category", [$this->category->id, $this->category->slug]);
    }

    public function getStatusViewAttribute()
    {
        return StatusEnum::fromValue($this->status)->badge();
    }

    public function getModuleAttribute()
    {
        return ModuleEnum::Blog->singleTitle();
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = auth()->id();
            $model->slug = Str::slug(request()->title[app()->getFallbackLocale()]);
        });
    }
}
