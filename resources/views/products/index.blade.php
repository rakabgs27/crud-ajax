<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Daftar Produk</h1>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#productTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('products.index') }}", // Update the URL here
                "columns": [{
                        "data": "DT_RowIndex"
                    },
                    {
                        "data": "nama_product"
                    },
                    {
                        "data": "nama_category"
                    },
                    {
                        "data": "qty_product"
                    },
                    {
                        "data": "harga_product"
                    }
                ]
            });
        });
    </script>
</body>

</html>
