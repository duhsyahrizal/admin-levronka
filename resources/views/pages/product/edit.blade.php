@extends('layouts.main')

@section('page')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <h5 class="card-header">Edit Category
                </h5>
                <div class="card-body">
                    <form action="/product/update/{{ $product->id }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="title">Title</label>
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $product->title }}" required>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $product->category->id == $item->id ? 'selected' : null }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="attribute">Attribute</label>
                                <input type="text" name="attribute" id="attribute" class="form-control"
                                    value="{{ $product->attribute }}">
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="detail">Detail</label>
                                <input type="text" name="detail" id="detail" class="form-control"
                                    value="{{ $product->detail }}">
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="color">Color</label>
                                <input type="text" name="color" id="color" class="form-control"
                                    value="{{ $product->color }}">
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control"
                                    value="{{ $product->price }}" required>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="tag">Tag/Label</label>
                                <input type="text" name="tag" id="tag" class="form-control"
                                    value="{{ $product->tag }}">
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="image">Image</label>
                                <input type="file" name="image_temp" id="image" class="form-control">
                                <div id="image" class="form-text text-success" {{ $product->image ? null : 'd-none' }}
                                    required>
                                    Terupload</div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="image_thumb">Image Thumbnail</label>
                                <input type="file" name="image_thumb_temp" id="image_thumb" class="form-control">
                                <div id="image_thumb" class="form-text text-success"
                                    {{ $product->image_thumb ? null : 'd-none' }} required>Terupload</div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="image_previews">Image Preview</label>
                                <input type="file" name="image_previews[]" id="image_previews" class="form-control"
                                    multiple />
                                <div id="image_previews" class="form-text text-success"
                                    {{ $product->image_detail_1 || $product->image_detail_2 || $product->image_detail_3 ? null : 'd-none' }}>
                                    Terupload</div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="online_shop_1">Link Shopee</label>
                                <input type="text" name="online_shop_1" id="online_shop_1" class="form-control"
                                    value="{{ $product->online_shop_1 }}" required>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="online_shop_2">Link Tokopedia</label>
                                <input type="text" name="online_shop_2" id="online_shop_2" class="form-control"
                                    value="{{ $product->online_shop_2 }}" required>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3"
                                    required>{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary float-end" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
