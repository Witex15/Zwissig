<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'published_at', 'archived_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function scopeUnarchived(Builder $query)
    {
        $query->whereNull('archived_at');
    }

    public function scopeArchived(Builder $query)
    {
        $query->whereNotNull('archived_at');
    }

    public function scopeSearchBody(Builder $query, $search)
    {
        $query->where('body', 'LIKE', "%$search%");
    }

    public function archive()
    {
        $this->timestamps = false;
        $this->update(['archived_at' => now()]);
        $this->timestamps = true;
    }

    public function incrementReads(){
        $this->reads++;
        return $this->save();
    }
}
