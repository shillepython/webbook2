<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BookCategory
 * @package App\Models
 *
 * @property-read BookCategory $parentCategory
 * @property-read string       $parentTitle
 */

class BookCategory extends Model
{
    use SoftDeletes;
    /*
     * ID Корня
     */
    const ROOT = 1;

    protected $fillable
        = [
          'title',
          'slug',
          'parent_id',
          'description',
        ];

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
        return $this->id === BookCategory::ROOT;
    }

}
