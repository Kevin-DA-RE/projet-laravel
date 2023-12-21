@extends('base')
@section('title', 'Créer un article')
@section('content')
<form action="" method="post">
  @csrf
    <div class="form-group">
      <label for="articleName">Nom de l'article</label>
      <input type="text" name="title" class="form-control" id="articleName" aria-describedby="emailHelp" placeholder="Saisissez le nom de l'article">
      <textarea name="content"  cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
  </form>
@endsection