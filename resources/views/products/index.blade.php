@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table Product</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <a href="#" id="addDataButton" class="btn btn-primary">Add New Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="productTable" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th class="text-right">Action</th>
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
    <!-- Add New Data Modal -->
    <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Add New Data Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add Data Form -->
                    <form id="addDataForm" action="{{ route('products.store') }}" method="POST">
                        <div class="form-group">
                            <label for="nama_product">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_product" name="nama_product">
                        </div>
                        <div class="form-group">
                            <label for="id_category">Kategori</label>
                            <select class="form-control select2" id="id_category" name="id_category">
                                <option value="">Pilih Jenis Kategori</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="qty_product" name="qty_product">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga_product" name="harga_product">
                        </div>
                        <input type="hidden" name="_method" value="POST">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" form="addDataForm" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- View Data Modal -->
    <div class="modal fade" id="viewDataModal" tabindex="-1" role="dialog" aria-labelledby="viewDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDataModalLabel">View Data Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="viewDataContent">
                    {{-- Data akan tertampil disini --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Data Modal -->
    <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel">Edit Data Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Edit Data Form -->
                    <form id="editDataForm" action="#" method="POST" data-product-id="">
                        <div class="form-group">
                            <label for="nama_product">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_product" name="nama_product" required>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Kategori</label>
                            <select class="form-control select2" id="id_category" name="id_category" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="qty_product" name="qty_product" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga_product" name="harga_product" required>
                        </div>
                        {{-- <input type="hidden" name="_method" value="PUT"> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="updateBtn">Update</button>
                </div>
            </div>
        </div>
    </div>
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
                        "searchable": true,
                        "render": function(data, type, row) {
                            return "Rp. " + data;
                        }
                    },
                    {
                        "data": null,
                        "orderable": false,
                        "searchable": false,
                        "render": function(data, type, row) {
                            var editButton =
                                '<button class="btn btn-sm btn-warning btn-edit" data-id="' + row
                                .id + '">Edit</button>';
                            var viewButton =
                                '<button class="btn btn-sm btn-info btn-view" data-id="' + row.id +
                                '" data-toggle="modal" data-target="#viewDataModal">View</button>';
                            var deleteButton =
                                '<button class="btn btn-sm btn-danger btn-delete" data-id="' + row
                                .id + '">Delete</button>';

                            var buttonGroup = '<div class="d-flex justify-content-end">' +
                                editButton + '<div class="mr-2"></div>' + viewButton +
                                '<div class="mr-2"></div>' +
                                deleteButton + '</div>';

                            return buttonGroup;
                        }

                    }
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {


            // resetIdCategory();

            $('#addDataForm').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var url = "{{ route('products.store') }}";

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(data) {
                        $('#addDataModal').modal('hide');
                        $('#productTable').DataTable().ajax.reload();
                    },
                });
            });

            $(document).on('click', '#addDataButton', function(e) {
                function resetIdCategory() {
                $.ajax({
                    url: "{{ route('categories.get') }}",
                    method: 'GET',
                    success: function(data) {
                        $('#id_category').html('<option value="">Pilih Jenis Kategori</option>');
                        $.each(data, function(key, value) {
                            $('#id_category.form-control').append('<option value="' + value.id +
                                '">' + value.nama_category + '</option>');
                        });
                    }
                });
            }
                $('#addDataForm')[0].reset();
                resetIdCategory();
                $('#addDataModal').modal('show');
            });
        });
    </script>
    <script>
        $(document).on('click', '.btn-view', function() {
            var productId = $(this).data('id');
            $.ajax({
                url: "{{ route('products.show', ':id') }}".replace(':id', productId),
                method: 'GET',
                success: function(response) {
                    var productData = response.data;
                    var html = '<div>' +
                        '<h5>Nama Produk: ' + productData.nama_product + '</h5>' +
                        '<h5>Kategori: ' + productData.nama_category + '</h5>' +
                        '<h5>Jumlah: ' + productData.qty_product + '</h5>' +
                        '<h5>Harga: Rp. ' + productData.harga_product + '</h5>' +
                        '</div>';

                    $('#viewDataContent').html(html);
                    $('#viewDataModal').modal('show');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-delete', function() {
                var productId = $(this).data('id');
                $('#deleteButton').data('product-id', productId);
                $('#deleteModal').modal('show');
            });

            $('#deleteButton').click(function() {
                var productId = $(this).data('product-id');
                $.ajax({
                    url: "/products/" + productId,
                    method: 'DELETE',
                    success: function(response) {

                        $('#deleteModal').modal('hide');

                        $('#productTable').DataTable().ajax.reload();
                    },
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // function resetIdCategory() {
            //     $.ajax({
            //         url: "{{ route('categories.get') }}",
            //         method: 'GET',
            //         success: function(data) {
            //             $('#id_category.form-control').empty();
            //             $.each(data, function(key, value) {
            //                 $('#id_category.form-control').append('<option value="' + value.id +
            //                     '">' + value.nama_category + '</option>');
            //             });
            //         }
            //     });
            // }

            $(document).on('click', '.btn-edit', function() {
                var productId = $(this).data('id');
                var editUrl = "{{ route('products.edit', ':id') }}".replace(':id', productId);
                $('#editDataForm').data('product-id', productId);

                // resetIdCategory();

                $.ajax({
                    url: editUrl,
                    method: 'GET',
                    success: function(response) {
                        $('#editDataForm').attr('action',
                            "{{ route('products.update', ':id') }}".replace(':id',
                                productId));
                        $.each(response.categories, function(index, category) {
                            var option = $('<option>', {
                                value: category.id,
                                text: category.nama_category
                            });
                            console.log(option);
                            if (category.id == response.data.id_category) {
                                option.attr('selected', 'selected');
                            }

                            $('#id_category.form-control').append(option);
                        });

                        $('#nama_product.form-control').val(response.data.nama_product);
                        $('#qty_product.form-control').val(response.data.qty_product);
                        $('#harga_product.form-control').val(response.data.harga_product);

                        $('#editDataModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();

            var productId = $(this).data('product-id');
            var url = "{{ route('products.update', ':id') }}".replace(':id', productId);
            var formData = $(this).serialize();
            console.log(formData);

            $.ajax({
                url: url,
                type: 'POST', // Change this to POST
                data: formData + "&_method=PUT", // Add the _method field
                success: function(response) {
                    console.log(response);
                    $('#editDataModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#updateBtn').click(function(e) {
            e.preventDefault();
            $('#editDataForm').submit();
            $('#productTable').DataTable().ajax.reload();
        });
    </script>
@endpush
