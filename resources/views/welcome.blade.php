<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }

        .btn-gradient {
    background-image: linear-gradient(to right, #4e73df, #224abe);
    border-color: #224abe;
    color: #ffffff;
}
.btn-shadow {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
    transition: box-shadow 0.3s ease;
}

.btn-shadow:hover {
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15), 0 2px 4px rgba(0, 0, 0, 0.1);
}

    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Product List</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ $product['thumbnail'] }}" class="card-img"
                                style="width: 200px; height: 200px;" alt="Product Image">
                            <p class="card-text">{{ $product['title'] }}</p>
                            @if(empty($product['brand']))
                            @else
                                <p class="card-text"><strong> Brand:
                                        {{ $product['brand'] }}</strong></p>
                            @endif
                            <p class="card-text"><strong>Tags:
                                    {{ $product['tags']['0'] }}</strong>
                            </p>
                            <p class="card-text"><strong>Price:
                                    ${{ $product['price'] }}</strong></p>
                            <a href="{{ route('produk',$product['id']) }}"
                                class="btn btn-primary btn-sm btn-shadow">
                                <span class="btn-icon-left">
        <i class="bi bi-eye"></i>
    </span>
    <span>Detail Produk</span>
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ $currentPage > 1 ? url('?page=' . ($currentPage - 1)) : '#' }}"
                class="btn btn-primary btn-gradient {{ $currentPage == 1 ? 'disabled' : '' }}">Sebelumnya</a>
            <a href="{{ $currentPage < $lastPage ? url('?page=' . ($currentPage + 1)) : '#' }}"
                class="btn btn-primary btn-gradient {{ $currentPage == $lastPage ? 'disabled' : '' }}">Selanjutnya</a>
        </div>

        <p class="mt-3">Halaman {{ $currentPage }} dari {{ $lastPage }}</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
