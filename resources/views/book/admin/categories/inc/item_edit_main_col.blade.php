@php
    /* @var \App\Models\BookCategory $item */
    /* @var \Illuminate\Support\Collection $categoryList*/
@endphp
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title"></div>
                        <ul class="nav nav-tabs pb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Main data</a>
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
                                           placeholder="Title the category">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Identifier</label>
                                    <input name="slug" value="{{ $item->slug }}"
                                           id="slug"
                                           type="text"
                                           class="form-control"
                                           placeholder="Identifier the category">
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Parent</label>
                                    <select name="parent_id" value="{{ $item->parent_id }}"
                                           id="parent_id"
                                           class="form-control"
                                           placeholder="Select category"
                                            >
                                        @foreach($categoryList as $categoryOption)
                                            <option value="{{ $categoryOption->id }}"
                                                @if($categoryOption->id == $item->parent_id) selected @elseif($categoryOption->id == $item->id) disabled @endif>
                                                {{-- $categoryOption->id --}} {{-- $categoryOption->id_title --}}
                                                {{ $categoryOption->id_title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description"
                                           id="description"
                                           class="form-control"
                                           rows="3"
                                           placeholder="Description the category">{{ old('description', $item->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
