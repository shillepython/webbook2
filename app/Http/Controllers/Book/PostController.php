<?php

namespace App\Http\Controllers\Book;


use App\Http\Requests\BookPostCreateComment;
use App\Http\Requests\BookPostFilterRequest;
use App\Models\BookComments;
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

        return view('book.posts.index', compact( 'categoryList', 'paginator', 'bookQuery'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookPostCreateComment $request)
    {
        $data = $request->input();
        $item = (new BookComments())->create($data);
        if ($item){
            return back()
                ->with(['success' => 'Send successfully']);
        }else{
            return back()
                ->withErrors(['msg' => 'Send error'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $book = BookPost::all()->where('slug', $slug)->first();
        $id_post = $book->id;
        $comments = BookComments::all()
            ->where('post_id', $id_post);

        if (empty($book)){
            abort(404);
        }
        return view('book.posts.showbook', compact('book','comments'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = BookComments::destroy($id);

        if ($result){
            return redirect()
                ->back()
                ->with(['success' =>
                        "Comment ID: $id deleted"
                    ]
                );
        }else{
            return back()->withErrors(['msg' => 'Delete error']);
        }

    }
}
