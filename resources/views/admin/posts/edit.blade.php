@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                Modifica Post
            </h1>
        </div>
        @if ($errors->any())
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" class="form-control" required maxlength="128" id="title" placeholder="Inserisci titolo.." value="{{ old('title', $post->title) }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Contenuto</label>
                        <textarea class="form-control" id="content" required maxlength="4096" name="content" rows="3">{{ old('title', $post->title) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <select name="category_id" id="category_id">
                            <option value="">Nessuna categoria</option>
                            @foreach ($categories as $category)
                             <option value="{{ $category->id }}" {{ old("category_id", $post->category_id) == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>

                        @if ($post->img)

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="delete_img" id="delete_img">
                            <label class="form-check-label" for="delete_img">
                              Cancella immagine in evidenza
                            </label>
                          </div>

                        <div>
                            <img src="{{ asset('storage/'.$post->img) }}" style="height: 300px;" alt="" class="mb-3">
                        </div>
                    @endif

                        <input class="form-control" type="file" name="img" id="img" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-warning">
                        Aggiorna
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection