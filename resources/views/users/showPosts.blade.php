<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div id="app" class="wrapper">
        <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">ITI Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('posts') }}">All Posts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            {{-- <a class="btn btn-primary mb-5 text-decoration-none" href="{{ route('createPost') }}">Create Post</a> --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        {{-- <th scope="col">Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts->post as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <th>{{ $post->user->name }}</th>
                            <th>{{ $post->title }}</th>
                            <th>{{ $post->description }}</th>
                            {{-- <th>
                                <a href="{{ route('showPosts', $user->id) }}" class="text-decoration-none">
                                    <button class="btn btn-primary">View</button>
                                </a>
                                <form action="{{ route('editPost', $post->id) }}" class="d-inline-block">
                                    <button class="btn btn-secondary">Edit</button>
                                </form>
                                <form action="{{ route('deletePost', $post->id) }}" method="post"
                                    class="d-inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </th> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>

</html>
