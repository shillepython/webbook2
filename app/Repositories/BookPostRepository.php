<?php

namespace App\Repositories;

use App\Models\BookPost;
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
            'price',
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

    public function findBook($slug)
    {
        return $this->startConditions()->find($slug);
    }

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
        if($request->has('price_before') && $request->has('price_before') != 0){
            $bookQuery->where('price', ">=",$request->price_before);
        }
        if($request->has('price_after') && $request->has('price_after') != 0){
            $bookQuery->where('price', "<=" ,$request->price_after);
        }
        if($request->has('parent_id')){
            $bookQuery->where('category_id', 'like', "%$request->parent_id%");
        }
        if($request->has('published_at')){
            if ($request->published_at == "newest"){
                $bookQuery->latest();
            }
            if ($request->published_at == "oldest"){
                $bookQuery->oldest();
            }
        }
        if($request->has('price_order')){
            if ($request->price_order == "expensive"){
                $bookQuery->orderBy('price', 'desc')->get();
            }
            if ($request->price_order == "сheapest"){
                $bookQuery->orderBy('price', 'asc')->get();
            }
        }
    }
}
