<ul>
    @foreach ($blogs as $blog)
        <li>{{ $blog->name }}</li>
    @endforeach
</ul>
