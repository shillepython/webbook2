<?php

namespace App\Models;
use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @package App\Models
 *
 * @property \App\Models\BookCategory $category
 * @property \App\Models\User         $user
 * @property string                   $title
 * @property string                   $excerpt
 * @property string                   $slug
 * @property string                   $content_html
 * @property string                   $content_raw
 * @property string                   $published_at
 * @property integer                  $price
 * @property boolean                  $is_published
 *
 * @property-read BookPost $parentCategory
 * @property-read string       $parentTitle
 */

class BookPost extends Model
{
    use SoftDeletes;
    const ROOT = 1;
    const UNKNOWN_USER = 1;
    protected $fillable
        = [
            'title',
            'slug',
            'category_id',
            'content_raw',
            'parent_id',
            'is_published',
            'price',
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @return BookCategory
     */
    public function parentCategory()
    {
        return $this->belongsTo(BookCategory::class, 'parent_id', 'id');
    }

    /**
     * @url https://laravel.com/docs/7.x/eloquent-mutators
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???');
        return $title;
    }

    /**
     * @return boolean
     */
    public function isRoot()
    {
        return $this->id === BookPost::ROOT;
    }

}
