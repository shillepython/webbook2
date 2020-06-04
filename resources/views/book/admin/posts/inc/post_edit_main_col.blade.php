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
                        Published
                    @else
                        Draft
                    @endif
                </div>
                <div class="card-body">
                    <div class="card-title"></div>
                    <ul class="nav nav-tabs pb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Main data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Extra data</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" value="{{ $item->title }}"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required
                                       value="{{ old('title', $item->title) }}"
                                       placeholder="Title the book">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="js-range-slider" id="range_two" value="{{ $item->price }}" />
                            </div>
                            <div class="form-group">
                                <label for="content_raw">Book contents</label>
                                <textarea name="content_raw"
                                          id="content_raw"
                                          class="form-control"
                                          rows="5"
                                          placeholder="Contents the book">{{ old('content_raw', $item->content_raw) }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="adddata" role="tabpanel">
                            <div class="form-group">
                                <label for="category_id">Parent</label>
                                <select name="category_id" value="{{ $item->category_id }}"
                                        id="category_id"
                                        class="form-control"
                                        placeholder="Select category"
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
                                <label for="slug">Identifier</label>
                                <input name="slug" value="{{ $item->slug }}"
                                       id="slug"
                                       type="text"
                                       class="form-control"
                                       placeholder="Identifier the book">
                            </div>
                            <div class="form-group">
                                <label for="excerpt">Excerpt</label>
                                <textarea name="excerpt" value="{{ $item->excerpt }}"
                                       id="excerpt"
                                       type="text"
                                       class="form-control"
                                       rows="3"
                                       placeholder="Excerpt the book">{{ old('excerpt', $item->excerpt) }}</textarea>
                            </div>
                            <div class="form-check">
                                <input type="hidden" name="is_published" value="0">
                                <input type="checkbox" name="is_published" class="form-check-input" value="1" id="is_published"
                                       @if($item->is_published)
                                       checked="checked"
                                    @endif>
                                <label class="form-check-label" for="is_published">Posted by</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
