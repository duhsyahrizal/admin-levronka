@extends('layouts.main')

@section('css-plugins')
    <link rel="stylesheet" href="/resources/assets/plugins/datatables.net-bs4/dataTables.bootstrap4.css">
@endsection

@section('page')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <h5 class="card-header">Input Category
                </h5>
                <div class="card-body">
                    <form action="/category/save" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-12 col-lg-6 col-xxl-6">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary float-end" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
