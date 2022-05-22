@extends('layouts.main')

@section('css-plugins')
    <link rel="stylesheet" href="/resources/assets/plugins/datatables.net-bs4/dataTables.bootstrap4.css">
@endsection

@section('page')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <h5 class="card-header">Input Product
                </h5>
                <div class="card-body">
                    <form action="/product/save" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option value="1">Hijab</option>
                                    <option value="2">One Set</option>
                                    <option value="3">Dress</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="attribute">Attribute</label>
                                <input type="text" name="attribute" id="attribute" class="form-control">
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="detail">Detail</label>
                                <input type="text" name="detail" id="detail" class="form-control">
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="color">Color</label>
                                <input type="text" name="color" id="color" class="form-control">
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="tag">Tag/Label</label>
                                <input type="text" name="tag" id="tag" class="form-control">
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="image">Image</label>
                                <input type="file" name="image_temp" id="image" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="image_thumb">Image Thumbnail</label>
                                <input type="file" name="image_thumb_temp" id="image_thumb" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="image_previews">Image Preview</label>
                                <input type="file" name="image_previews[]" id="image_previews" class="form-control"
                                    multiple />
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="online_shop_1">Link Shopee</label>
                                <input type="text" name="online_shop_1" id="online_shop_1" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="online_shop_2">Link Tokopedia</label>
                                <input type="text" name="online_shop_2" id="online_shop_2" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary float-end" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
