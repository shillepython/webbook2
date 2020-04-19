<?php

namespace App\Observers;

use App\Models\BookPost;
use Carbon\Carbon;

class BookPostObserver
{

    /**
     * Если дата публикации не установлена и приходит флаг - Опубликовано,
     * Меняем дату публикации на текущую.
     *
     * @param  BookPost  $bookPost
     */
    protected function setPublishedAt(BookPost $bookPost)
    {
        $needSetPublished = empty($bookPost->published_at) && $bookPost->is_published;
        if ($needSetPublished){
            $bookPost->published_at = Carbon::now();
        }
    }


    /**
     * Если поле slug не заполнено то образуем его из поля Title.
     *
     * @param  BookPost  $bookPost
     */
    protected function setSlug(BookPost $bookPost)
    {
        if (empty($bookPost->slug)){
            $bookPost->slug = \Str::slug($bookPost->title);
        }
    }


    /**
     * Установка значение полю content_html относитьльно content_raw
     *
     * @param  BookPost  $bookPost
     */
    protected function setHtml(BookPost $bookPost)
    {
        if ($bookPost->isDirty('content_raw')){
            // TODO: Тут должен быть код преобразования кода content_raw
            $bookPost->content_html = $bookPost->content_raw;
        }
    }

    /**
     * Если не указан user_id устанавливаем по-умолчанию
     *
     * @param  BookPost  $bookPost
     */
    protected function setUser(BookPost $bookPost)
    {
        $bookPost->user_id = auth()->id() ?? BookPost::UNKNOWN_USER;
    }


    /**
     * Отработка ПЕРЕД создание записи.
     *
     * @param  BookPost  $bookPost
     */
    public function creating(BookPost $bookPost)
    {
        $this->setPublishedAt($bookPost);
        $this->setSlug($bookPost);
        $this->setHtml($bookPost);
        $this->setUser($bookPost);
    }

    /**
     * Handle the book post "created" event.
     *
     * @param  BookPost  $bookPost
     * @return void
     */
    public function created(BookPost $bookPost)
    {
        //
    }


    /**
     * Отработка ПЕРЕД создание записи.
     *
     * @param  BookPost  $bookPost
     */
    public function updating(BookPost $bookPost)
    {
        $this->setPublishedAt($bookPost);
        $this->setSlug($bookPost);
    }

    /**
     * Handle the book post "updated" event.
     *
     * @param  BookPost  $bookPost
     * @return void
     */
    public function updated(BookPost $bookPost)
    {
        //
    }


    /**
     * Handle the book post "deleted" event.
     *
     * @param  BookPost  $bookPost
     * @return void
     */
    public function deleting(BookPost $bookPost)
    {
        //return false;
    }

    /**
     * Handle the book post "deleted" event.
     *
     * @param  BookPost  $bookPost
     * @return void
     */
    public function deleted(BookPost $bookPost)
    {
        //
    }

    /**
     * Handle the book post "restored" event.
     *
     * @param  BookPost  $bookPost
     * @return void
     */
    public function restored(BookPost $bookPost)
    {
        //
    }

    /**
     * Handle the book post "force deleted" event.
     *
     * @param  BookPost  $bookPost
     * @return void
     */
    public function forceDeleted(BookPost $bookPost)
    {
        //
    }
}
