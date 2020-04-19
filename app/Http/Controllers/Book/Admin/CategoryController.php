<?php

namespace App\Http\Controllers\Book\Admin;

use App\Http\Requests\BookCategoryCreateRequest;
use App\Http\Requests\BookCategoryUpdateRequest;
use App\Models\BookCategory;
use App\Repositories\BookCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @var BookCategoryRepository
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    protected $bookCategoryRepository;
    public function __construct()
    {
        parent::__construct();

        $this->bookCategoryRepository = app(BookCategoryRepository::class);
    }

    public function index()
    {
        $paginator = BookCategory::paginate(15);
        //$paginator = $this->bookCategoryRepository->getAllWithPaginate(25);
        return view('book.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $item = new BookCategory();
        $categoryList = $this->bookCategoryRepository->getForComboBox();

        return view('book.admin.categories.create', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookCategoryCreateRequest $request)
    {
        $data = $request->input();

        $item = (new BookCategory())->create($data);

        if ($item){
            return redirect()
                ->route('book.admin.categories.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param BookCategoryRepository $categoryRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
//        $item = BookCategory::findOrFail($id);
//        $categoryList = BookCategory::all();

        $item = $this->bookCategoryRepository->getEdit($id);
        if (empty($item)){
            abort(404);
        }

        $categoryList = $this->bookCategoryRepository->getForComboBox();

        return view('book.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookCategoryUpdateRequest $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BookCategoryUpdateRequest $request, $id)
    {
        $item = $this->bookCategoryRepository->getEdit($id);
        if(empty($item)){
            return back()
                ->withErrors(['msg' => "Запись с id: [{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        if (empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }

        $result = $item->update($data);

        if ($result){
            return redirect()
                ->route('book.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
