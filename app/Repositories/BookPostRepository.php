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
            'excerpt',
            'is_published',
            'published_at',
            'created_at',
            'user_id',
            'category_id'
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(['category:id,title','user:id,name'])
            ->paginate(10);

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

    public function filter($bookQuery,$request){
        if($request->has('title')){
            $bookQuery->where('title', 'like', "%$request->title%");
        }
        if($request->has('parent_id')){
            $bookQuery->where('category_id', 'like', "%$request->parent_id%");
        }
    }
}
