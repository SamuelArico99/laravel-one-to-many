@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                Crea Post
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
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" class="form-control" required maxlength="128" id="title" placeholder="Inserisci titolo..">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Contenuto</label>
                        <textarea class="form-control" id="content" required maxlength="4096" name="content" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <select name="category_id" id="category_id">
                            <option value="">Nessuna categoria</option>
                            @foreach ($categories as $category)
                             <option value="{{ $category->id }}" {{ old("category_id") == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" name="img" id="img" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-success">
                        Aggiungi
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection