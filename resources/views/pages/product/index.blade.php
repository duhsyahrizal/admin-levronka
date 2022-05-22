@extends('layouts.main')

@section('css-plugins')
    <link rel="stylesheet" href="/resources/assets/plugins/datatables.net-bs4/dataTables.bootstrap4.css">
@endsection

@section('page')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <h5 class="card-header">Product <a class="btn btn-primary float-end" href="/product/create"><i
                            class="menu-icon tf-icons bx bx-plus mx-0"></i> Create</a>
                </h5>
                <div class="card-body">
                    <div class="table-responsive w-100">
                        <table class="datatable table w-100" id="datatable">
                            <thead class="bg-primary">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Attribute</th>
                                    <th>Detail</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Primary Image</th>
                                    <th>Thumbnail</th>
                                    <th>Image Detail</th>
                                    <th>Link Shopee</th>
                                    <th>Link Tokopedia</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-plugins')
    <script src="/resources/assets/plugins/datatables.net/jquery.dataTables.js"></script>
    <script src="/resources/assets/plugins/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script>
        $(() => {
            $('#datatable').DataTable({
                "ajax": '/product/datatable',
                "processing": true,
                "pageLength": 10,
            });

        })
    </script>
@endsection
