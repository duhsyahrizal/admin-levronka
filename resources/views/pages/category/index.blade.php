@extends('layouts.main')

@section('css-plugins')
    <link rel="stylesheet" href="/resources/assets/plugins/datatables.net-bs4/dataTables.bootstrap4.css">
@endsection

@section('page')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <h5 class="card-header">Category</h5>
                <div class="card-body">
                    <div class="table-responsive w-100">
                        <table class="datatable table w-100" id="datatable">
                            <thead class="bg-primary">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Name</th>
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
                "ajax": '/category/datatable',
                "processing": true,
                "pageLength": 10,
            });
        })
    </script>
@endsection
