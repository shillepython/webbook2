@php
    /* @var \App\Models\BookPost $post */
    /* @var \Illuminate\Support\Collection $categoryList*/
@endphp
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title"></div>
{{--                            <div class="form-group">--}}
{{--                                <label for="name">Автор</label>--}}
{{--                                <input name="name" value="{{ request()->name }}"--}}
{{--                                       id="name"--}}
{{--                                       type="text"--}}
{{--                                       class="form-control"--}}
{{--                                       minlength="3"--}}
{{--                                       required>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="price_before">Цена от</label>
                                <input value="{{ request()->price_before }}"
                                       id="price_before"
                                       type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="price_after">Цена до</label>
                                <input value="{{ request()->price_after }}"
                                       id="price_after"
                                       type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input name="title" value="{{ request()->title }}"
                                       id="title"
                                       type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Категория/Жанр</label>
                                <select name="parent_id" value="{{ request()->parent_id }}"
                                        id="parent_id"
                                        class="form-control"
                                        placeholder="Выберете категорию">
                                    <option value="" selected>Любой</option>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                        @if($categoryOption->id == request()->parent_id) selected @endif>

                                        {{ $categoryOption->id_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                    <button type="submit" class="btn btn-primary">Найти</button>
                    <a href="{{ route('Book.book.index') }}" class="btn btn-primary">Сброс</a>
                </div>
            </div>
        </div>
    </div>
</div>
