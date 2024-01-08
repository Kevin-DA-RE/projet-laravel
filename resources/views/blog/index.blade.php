@extends('base')
@section('title', 'Acceuil du blog')
   @section('content')
         <h1>Mon Blog</h1>

         @foreach ($posts as $post)
             <article>
                  <h2> {{$post->title }}</h2>
                  <p class="small">
                        @if ($post->category)
                              Catégorie : <strong>{{ $post->category->name }}</strong>@if (!$post->tags->isEmpty()),@endif
                        @endif
                        @if (!$post->tags->isEmpty())
                              Tags : 
                              @foreach ($post->tags as $tag)
                              <span class="badge bg-info">{{ $tag->name }}</span>
                                    
                              @endforeach
                        @endif
                  </p>
                  @if ($post->image)
                  <img src="{{ $post->imageUrl() }}" alt="">
                        
                  @endif
                  <p>{{ $post->content }}</p>
                  <p>
                        <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' =>$post->id]) }}" class="btn btn-primary"> Lire la suite</a>
                  </p>
             </article>
         @endforeach
         {{ $posts->links()}}
      @endsection