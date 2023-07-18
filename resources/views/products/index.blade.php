@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="productTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap4.min.css">
@endpush

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script src="/assets/js/page/modules-datatables.js"></script>

    <script>
        $(document).ready(function() {
            $('#productTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('products.index') }}",
                "columns": [{
                        "data": "DT_RowIndex",
                        "searchable": false
                    },
                    {
                        "data": "nama_product",
                        "searchable": true
                    },
                    {
                        "data": "nama_category",
                        "searchable": true
                    },
                    {
                        "data": "qty_product",
                        "searchable": true
                    },
                    {
                        "data": "harga_product",
                        "searchable": true
                    }
                ]
            });
        });
    </script>
@endpush
