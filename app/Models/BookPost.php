<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @package App\Models
 *
 * @property \App\Models\BookCategory $category
 * @property \App\Models\User         $user
 * @property string                   $title
 * @property string                   $slug
 * @property string                   $content_html
 * @property string                   $content_raw
 * @property string                   $published_at
 * @property boolean                  $is_published
 */

class BookPost extends Model
{
    use SoftDeletes;
    const UNKNOWN_USER = 1;

    protected $fillable
        = [
            'title',
            'slug',
            'category_id',
            'excerpt',
            'content_raw',
            'is_published',
            'published_at',
        ];

    /**
     * Категория книга.
     * @return BelongsTo
     */
    public function category()
    {
        // Книга принадлежит категории.
        return $this->belongsTo(BookCategory::class);
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        // Книга пренадлежит пользователю.
        return $this->belongsTo(User::class);
    }
}
