<?php

namespace App\Observers;

use App\Models\BookCategory;

class BookCategoryObserver
{


    /**
     *
     * @param  BookCategory  $bookCategory
     * @return void
     */
    public function created(BookCategory $bookCategory)
    {
        //
    }

    /**
     * @param  BookCategory  $bookCategory
     *
     * @return void
     */
    public function creating(BookCategory $bookCategory)
    {
        $this->setSlug($bookCategory);
    }

    /**
     * @param  BookCategory  $bookCategory
     *
     * @return void
     */
    public function setSlug(BookCategory $bookCategory)
    {
        if (empty( $bookCategory->slug)){
            $bookCategory->slug = \Str::slug($bookCategory->title);
        }
    }

    /**
     *
     * @param  BookCategory  $bookCategory
     * @return void
     */
    public function updated(BookCategory $bookCategory)
    {
        //
    }

    /**
     *
     * @param  BookCategory  $bookCategory
     * @return void
     */
    public function updating(BookCategory $bookCategory)
    {
        $this->setSlug($bookCategory);
    }

    /**
     *
     * @param  BookCategory  $bookCategory
     * @return void
     */
    public function deleted(BookCategory $bookCategory)
    {
        //
    }

    /**
     *
     * @param  BookCategory  $bookCategory
     * @return void
     */
    public function restored(BookCategory $bookCategory)
    {
        //
    }

    /**
     *
     * @param  BookCategory  $bookCategory
     * @return void
     */
    public function forceDeleted(BookCategory $bookCategory)
    {
        //
    }
}
