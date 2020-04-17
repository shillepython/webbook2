<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookPost extends Model
{
    use SoftDeletes;

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
