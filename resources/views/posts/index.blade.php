<h1 style="color:red">Daftar Tulisan</h1>

@can('posts.create')

    <a href="/posts/create" style="color:red">
        + Buat Tulisan
    </a>

@endcan

@foreach ($posts as $post)

    <h2>{{ $post->title }}</h2>

    <p>{{ $post->description }}</p>

@endforeach
