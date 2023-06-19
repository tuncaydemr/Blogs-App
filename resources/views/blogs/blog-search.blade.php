<ul>
    @foreach ($items as $item)
        <li>{{ $item->name }} - {{ $item->price }}</li>
    @endforeach
</ul>
