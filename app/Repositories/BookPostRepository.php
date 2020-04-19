<?php

namespace App\Repositories;

use App\Models\BookPost as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

//use Your Model

/**
 * Class BookPostRepository.
 */
class BookPostRepository extends CoreRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected function getModelClass()
    {
        return Model::class;
    }


    /**
     *
     * @return LengthAwarePaginator
     *
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(['category:id,title','user:id,name'])
            ->paginate(25);

        return $result;
    }
    /**
     * @param int $id
     *
     * @return Model
     *
     */

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getTrashed($id)
    {
        return $this->startConditions()->withTrashed()->find($id);
    }
}
