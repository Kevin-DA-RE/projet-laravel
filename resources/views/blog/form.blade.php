
<form action="" method="post" class="vstack gap-2" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control" id="image">
            @error("image")
              {{ $message }}
            @enderror
        </div>
        <div class="form-group">
          <label for="title">Nom de l'article</label>
          <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $post->title)}}" aria-describedby="emailHelp" placeholder="Saisissez le nom de l'article">
            @error("title")
              {{ $message }}
            @enderror
        </div>
        <div class="form-group">
          <label for="slug">Slug de l'article</label>
          <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug', $post->slug)}}" aria-describedby="emailHelp" placeholder="Saisissez le nom de l'article">
            @error("title")
              {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
           <textarea id="content" name="content" class="form-control" cols="30" rows="10">{{ old('content', $post->content)}}</textarea>
            @error("content")
              {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Category</label>
           <select id="category" name="category_id" class="form-control">
            <option value="">Selectionner une categorie</option>
                @foreach ($categories as $category)
                    <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id}}">{{ $category->name }}</option>
                @endforeach
           </select>
            @error("category_id")
              {{ $message }}
            @enderror
        </div>
        @php
            $tagsIds = $post->tags()->pluck('id');
        @endphp
        <div class="form-group">
            <label for="tag">Tags</label>
            <select id="tag" name="tags[]" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option @selected($tagsIds->contains($tag->id)) value="{{ $tag->id}}">{{ $tag->name }}</option>
                @endforeach
           </select>
            @error("tags")
              {{ $message }}
            @enderror
        </div>
      <button type="submit" class="btn btn-primary">
        @if ($post->id)
            Modifier
        @else
            Créer
        @endif
        </button>
    </form>