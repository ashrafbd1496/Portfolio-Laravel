<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'comment',
        'approval',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function blog()
    {
        return $this->belongsTo('App\Models\Admin\Blog', 'blog_id', 'id');
    }
}
