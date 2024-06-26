<!-- resources/views/products/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['title'] }} - Detail Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .product-image {
            max-width: 100%;
            height: auto;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
        }
        .product-image:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        }
        .product-price {
            font-size: 2.5rem;
            font-weight: bold;
            color: green;
        }
        .product-description {
            line-height: 1.8;
        }
        .back-link {
            font-size: 1.2rem;
            color: #007BFF;
        }
        .back-link:hover {
            text-decoration: none;
            color: #0056b3;
        }
        .gallery-item {
            margin-bottom: 20px;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .gallery-item img:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Detail Produk</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    @foreach ($data['images'] as $index => $image)
                        <div class="col-md-6 gallery-item">
                            <img src="{{ $image }}" class="product-image" alt="Product Image {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="gradient-bg p-4">
                    <h1 class="mb-4">{{ $data['title'] }}</h1>
                    <p class="product-price">Price: ${{ $data['price'] }}</p>
                    <p class="product-description">{{ $data['description'] }}</p>
                    <div>
                        @foreach ($data['tags'] as $tag)
                            <span class="btn btn-sm alert-info"> <b>{{ $tag }}</b> </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
            <div class="gradient-bg p-4">
            <h5 class="mt-5"> Reviews</h5>
                    @foreach ($data['reviews'] as $review)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review['reviewerName'] }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $review['reviewerEmail'] }}</h6>
                                <p class="card-text">
                                    @for ($i = 0; $i < $review['rating']; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                    @for ($i = $review['rating']; $i < 5; $i++)
                                        <i class="bi bi-star"></i>
                                    @endfor
                                </p>
                                <p class="card-text">{{ $review['comment'] }}</p>
                                <p class="card-text"><small class="text-muted">Posted on {{ date('F j, Y', strtotime($review['date'])) }}</small></p>
                            </div>
                        </div>
                    @endforeach
            </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icons JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
