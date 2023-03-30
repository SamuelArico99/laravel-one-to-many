@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
                Tutti i Post
            </h1>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">
                Aggiungi Post
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>                
                          @if ($post->category)
                            <a href="{{ route('admin.categories.show', $post->category->id) }}">{{ $post->category->name }}</a> 
                          @else
                             Nessuna Categoria
                          @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info">
                                Dettagli
                            </a>
                            <a href="{{ route('admin.posts.edit', $post->id) }} " class="btn btn-warning">
                                Modifica
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Sei sicuro di voler eliminare questo post')" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection