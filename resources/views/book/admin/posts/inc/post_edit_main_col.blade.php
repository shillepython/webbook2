@php
    /* @var \App\Models\BookCategory $item */
    /* @var \Illuminate\Support\Collection $categoryList*/
@endphp
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if($item->is_published)
                        Опубликовано
                    @else
                        Черновик
                    @endif
                </div>
                <div class="card-body">
                    <div class="card-title"></div>
                    <ul class="nav nav-tabs pb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Доп. данные</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input name="title" value="{{ $item->title }}"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required
                                       value="{{ old('title', $item->title) }}">
                            </div>
                            <div class="form-group">
                                <label for="content_raw">Cодержание книги</label>
                                <textarea name="content_raw"
                                          id="content_raw"
                                          class="form-control"
                                          rows="5">{{ old('content_raw', $item->content_raw) }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="adddata" role="tabpanel">
                            <div class="form-group">
                                <label for="category_id">Родитель</label>
                                <select name="category_id" value="{{ $item->category_id }}"
                                        id="category_id"
                                        class="form-control"
                                        placeholder="Выберете категорию"
                                        required>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if($categoryOption->id == $item->category_id) selected @elseif($categoryOption->id == $item->id) disabled @endif>
                                            {{-- $categoryOption->id --}} {{-- $categoryOption->id_title --}}
                                            {{ $categoryOption->id_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="slug">Идентификатор</label>
                                <input name="slug" value="{{ $item->slug }}"
                                       id="slug"
                                       type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="excerpt">Выдержка</label>
                                <textarea name="excerpt" value="{{ $item->excerpt }}"
                                       id="excerpt"
                                       type="text"
                                       class="form-control"
                                       rows="3">{{ old('excerpt', $item->excerpt) }}</textarea>
                            </div>
                            <div class="form-check">
                                <input type="hidden" name="is_published" value="0">
                                <input type="checkbox" name="is_published" class="form-check-input" value="1" id="is_published"
                                       @if($item->is_published)
                                       checked="checked"
                                    @endif>
                                <label class="form-check-label" for="is_published">Опубликовано</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
