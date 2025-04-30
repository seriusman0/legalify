<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'content', 
        'slug', 
        'image', 
        'category',
        'user_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('.storage/' . $this->image) : null;
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('created_at')->orderBy('created_at', 'desc');
    }
}
