<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GNovel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light border-bottom border-bottom-light" data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GNovel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Novels</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($novels as $item)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ Asset('assets/images/default-img.jpg') }}">
                                <div class="card-body">
                                    <p class="card-text">Name : {{ $item->name ?? '-' }}</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">Start : {{ $item->start ?? '-' }}</p>
                                        <p class="card-text">Now : {{ $item->now ?? '-' }}</p>
                                        <p class="card-text">End : {{ $item->end ?? '-' }}</p>
                                        <p class="card-text">Count : {{ $item->chapters_count ?? '0' }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('novel.show', $item->id) }}"
                                                class="btn btn-sm btn-outline-secondary">View
                                            </a>
                                        </div>
                                        <small
                                            class="text-body-secondary">{{ $item->updated_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
