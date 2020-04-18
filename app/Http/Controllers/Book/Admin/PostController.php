<?php

namespace App\Http\Controllers\Book\Admin;

use App\Repositories\BookCategoryRepository;
use App\Repositories\BookPostRepository;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * @var $bookPostRepository
     */
    private $bookPostRepository;

    /**
     * @var $bookCategoryRepository
     */
    private $bookCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->bookPostRepository = app(BookPostRepository::class);
        $this->bookCategoryRepository = app(BookCategoryRepository::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paginator = $this->bookPostRepository->getAllWithPaginate();
        return view('book.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = $this->bookPostRepository->getEdit($id);
        if (empty($item)){
            abort(404);
        }
        $categoryList = $this->bookCategoryRepository->getForComboBox();

        return view('book.admin.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(__METHOD__,$request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__, $id);
    }
}
