<?php

namespace App\Http\Controllers\Book\Admin;

use App\Http\Requests\BookPostCreateReques;
use App\Http\Requests\BookPostRestoreRequest;
use App\Http\Requests\BookPostUpdateRequest;
use App\Models\BookPost;
use App\Repositories\BookCategoryRepository;
use App\Repositories\BookPostRepository;
use Carbon\Carbon;
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
        //$paginator = BookPost::paginate(15);
        return view('book.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $item = new BookPost();
        $categoryList = $this->bookCategoryRepository->getForComboBox();

        return view('book.admin.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookPostCreateReques $request)
    {
        $data = $request->input();
        $item = (new BookPost())->create($data);

        if ($item){
            return redirect()
                ->route('book.admin.posts.edit', $item->id)
                ->with(['success' => 'Saved successfully']);
        }else{
            return back()
                ->withErrors(['msg' => 'Save error'])
                ->withInput();
        }
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
     * @param  BookPostUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BookPostUpdateRequest $request, $id)
    {
        $item = $this->bookPostRepository->getEdit($id);
        if(empty($item)){
            return back()
                ->withErrors(['msg' => "Record with id: [{$id}] not found"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result){
            return redirect()
                ->route('book.admin.posts.edit', $item->id)
                ->with(['success' => 'Saved successfully']);
        }else{
            return back()
                ->withErrors(['msg' => 'Save error'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = BookPost::destroy($id);

        if ($result){
            return redirect()
                ->route('book.admin.posts.index')
                ->with(['success' =>
                    "Book ID: $id deleted",
                    'restore'    => $id]
                    );
        }else{
            return back()->withErrors(['msg' => 'Delete error']);
        }
    }
    public function restore($id)
    {
        $restore = $this->bookPostRepository->getTrashed($id)->restore();

        if ($restore) {
            return redirect()
                ->route('book.admin.posts.edit', $id)
                ->with(['success' => "Book with ID: $id restored"]);
        }else{
            return back()->withErrors(['msg' => 'Recovery error']);
        }
    }
}
