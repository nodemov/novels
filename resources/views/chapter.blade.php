<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GNovel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

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
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('novels') }}">Novels</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>

        <div class="col-lg-10 mx-auto my-4">
            <h1>เรื่อง : {{ Arr::get($novel, 'name', '') }}</h1>
            <div class="table-responsive">
                <table class="table table-striped" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Chapter</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Mark Read</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chapters as $item)
                            <tr>
                                <td>{{ Arr::get($item, 'chapter', '') }}</td>
                                <td>{{ Arr::get($item, 'title', '') }}</td>
                                <td>{{ Arr::get($item, 'created_at', '') }}</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input mark-read-checkbox" type="checkbox"
                                            data-chapter-id="{{ $item->id }}" {{ $item->is_read ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Mark as Read
                                        </label>
                                    </div>
                                </td>
                                <td><a href="{{ route('novel.show', Arr::get($novel, 'id', '')) }}?&start={{ Arr::get($item, 'chapter', '') }}"
                                        class="btn btn-sm btn-primary">view</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            {{ $chapters->links() }}
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        new DataTable('#example', {
            "lengthMenu": [30, 50, 100, 200, 400, 500, 800, 1000],
            "pageLength": 30,
        });

        $(document).ready(function() {
            $('.mark-read-checkbox').change(function() {
                var chapterId = $(this).data('chapter-id');

                $.ajax({
                    type: 'POST',
                    url: '/api/chapter/update-read-status', // Replace with your actual route
                    data: {
                        _token: '{{ csrf_token() }}',
                        chapterId: chapterId,
                        isRead: $(this).prop('checked')
                    },
                    success: function(data) {
                        console.log('Status updated successfully');
                    },
                    error: function(error) {
                        console.error('Error updating status:', error);
                    }
                });
            });
        });
    </script>

    <script></script>
</body>

</html>
