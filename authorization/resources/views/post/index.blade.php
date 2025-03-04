<div>
    @foreach ($posts as $post)
        @can('update',$post)
        <!-- Sadece bizimkiler gelcek POLICY -->
            <a href="{{ route('post.edit', $post->id) }}">{{$post->title}}</a>
        @endcan
        <br>
    @endforeach
</div>
