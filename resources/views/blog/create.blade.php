@extends('base')
@section('title', 'Créer un article')
@section('content')
<form action="" method="post">
  @csrf
    <div class="form-group">
      <label for="articleName">Nom de l'article</label>
      <div>
        <input type="text" name="title" class="form-control" id="articleName" value="{{ old('title')}}" aria-describedby="emailHelp" placeholder="Saisissez le nom de l'article">
          @error("title")
            {{ $message }}
          @enderror
      </div>
      <div>
         <textarea name="content"  cols="30" rows="10">contenu de demo</textarea>
          @error("content")
            {{ $message }}
          @enderror
      </div>
     
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
  </form>
@endsection