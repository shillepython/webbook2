@php
    /* @var \App\Models\BookPost $post */
    /* @var \Illuminate\Support\Collection $categoryList*/
@endphp
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Found: {{ $bookQuery->count() }} books</h3>
                    </div>
                            <div class="form-group">
                                <label for="price_before">Price</label>
                                <input type="text" class="js-range-slider" id="range" value="" />

                                <input type="text" class="form-control mt-3 mb-1" id="price_one" name="price_before" value="{{ request()->price_before ?? '0'}}" />
                                <input type="text" class="form-control" id="price_two" name="price_after" value="{{ request()->price_after ?? '2000'}}" />
                            </div>

                            <div class="form-group">
                                <label for="title">Name book</label>
                                <input name="title" value="{{ request()->title }}"
                                       id="title"
                                       type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Category - Genre</label>
                                <select name="parent_id" value="{{ request()->parent_id }}"
                                        id="parent_id"
                                        class="form-control"
                                        placeholder="Select category">
                                    <option value="" selected>All</option>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if($categoryOption->id == request()->parent_id) selected @endif>

                                            {{ $categoryOption->id_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="published_at">By date</label>
                                <select name="published_at" value="newest" @if("newest" == request()->published_at) selected @endif
                                        id="published_at"
                                        class="form-control"
                                        placeholder="Select date">
                                    <option value="newest" @if("newest" == request()->published_at) selected @endif>From the newest</option>
                                    <option value="oldest" @if("oldest" == request()->published_at) selected @endif>From the oldest</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price_order">By price</label>
                                <select name="price_order" value="{{ request()->price_order }}"
                                        id="price_order"
                                        class="form-control"
                                        placeholder="Select price order">
                                    <option value="">All</option>
                                    <option value="expensive" @if("expensive" == request()->price_order) selected @endif>First the most expensive</option>
                                    <option value="сheapest" @if("сheapest" == request()->price_order) selected @endif>Cheapest first</option>
                                </select>
                            </div>

                    <button type="submit" class="btn btn-primary">Find</button>
                    <a href="{{ route('Book.book.index') }}" class="btn btn-primary">Reset</a>
                </div>
            </div>
        </div>
    </div>
</div>
