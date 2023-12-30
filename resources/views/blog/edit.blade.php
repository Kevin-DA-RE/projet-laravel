@extends('base')
@section('title', 'Modifier un article')
@section('content')
<form action="" method="post">
  @csrf
    <div class="form-group">
      
      <div>
        <label for="articleName">Nom de l'article</label>
        <input type="text" name="title" class="form-control" id="articleName" value="{{ old('title', $post->title)}}" aria-describedby="emailHelp" placeholder="Saisissez le nom de l'article">
          @error("title")
            {{ $message }}
          @enderror
      </div>
      <div>
        <label for="slugArticle">Slug de l'article</label>
        <input type="text" name="slug" class="form-control" id="slugArticle" value="{{ old('slug', $post->slug)}}" aria-describedby="emailHelp" placeholder="Saisissez le nom de l'article">
          @error("title")
            {{ $message }}
          @enderror
      </div>
      <div>
         <textarea name="content"  cols="30" rows="10">{{ old('content', $post->content)}}</textarea>
          @error("content")
            {{ $message }}
          @enderror
      </div>
     
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
  </form>
@endsection