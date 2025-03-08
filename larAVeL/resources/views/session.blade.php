<div style="background: rgb(79, 78, 78); height: 100%; width: 100%; padding: 0;">
    <h1 style="font-size: 1.4rem; font-weight: 600; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; color: white">Session</h1>
    <ul>
        @if(is_array($foo))
        <ul>
            @foreach ($foo as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
        @else
            <p>{{ $foo }}</p>
        @endif
    </ul>
</div>