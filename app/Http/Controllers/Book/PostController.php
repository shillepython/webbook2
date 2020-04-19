<?php

namespace App\Http\Controllers\Book;


use App\Http\Requests\BookPostFilterRequest;
use App\Models\BookPost;
use App\Models\User;
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
     * @param BookPostFilterRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(BookPostFilterRequest $request)
    {
        $bookQuery = BookPost::query();
        $this->bookPostRepository->filter($bookQuery,$request);

        $paginator = $bookQuery->paginate(10)->withPath("?" . $request->getQueryString());
        $categoryList = $this->bookCategoryRepository->getForComboBox();

        return view('book.posts.index', compact( 'categoryList', 'paginator'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
