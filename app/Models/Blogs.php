<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blogs extends Model
{
    use HasFactory, Sluggable;


    protected $guarded = ['id'];
    protected $with = ['user', 'category'];

    public function scopeFilters($query, array $filter)
    {
        $query->when(isset($filter['search']), function ($query) use ($filter) {
            return $query->where(function ($query) use ($filter) {
                $search = $filter['search'];
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filter['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', 'like', '%' . $category . '%');
            });
        });

        $query->when($filter['user'] ?? false, function ($query, $user) {
            return $query->whereHas('user', function ($query) use ($user) {
                $query->where('name', 'like', '%' . $user . '%');
            });
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
