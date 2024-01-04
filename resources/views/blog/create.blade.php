@extends('base')
@section('title', 'Créer un article')
@section('content')
<form action="" method="post">
  @csrf
    <div class="form-group">
      <label for="articleName">Nom de l'article</label>
      <div>
        <input type="text" name="title" class="form-control" id="articleName" value="{{ old('title', 'Mon titre')}}" aria-describedby="emailHelp" placeholder="Saisissez le nom de l'article">
          @error("title")
            {{ $message }}
          @enderror
      </div>
      <div>
         <textarea name="content"  cols="30" rows="10">{{ old('content', 'Contenu de demonstration')}}</textarea>
          @error("content")
            {{ $message }}
          @enderror
      </div>
     
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
  </form>
@endsection