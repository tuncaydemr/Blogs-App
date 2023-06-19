<ul>
    @foreach ($blogs as $blog)
        <li>{{ $blog->likes }}</li>
    @endforeach
</ul>
