<div>
  @if ($posts->count())
  
@foreach ( $posts as $post)
      <div class="grid md:grid -cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <div>
                        <a href="{{ route('posts.show', ['post' => $post, 'user' =>$post->user]) }}">
                            <img src="{{ asset('Uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                        </a>
                    </div>
            </div>

            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}

            </div>


@endforeach

@else
     <p>No hay posts, sigue a alguien para visualizar sus posts. </p>
@endif
</div>