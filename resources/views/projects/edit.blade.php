@extends('template.base')

@section('title', 'Modifica progetto')

@section('content')
    <form action="{{route('projects.update', ['project' => $project])}}" method="post">
        @method('PUT')
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Titolo" name="title" value="{{ $project->title }}">
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content">{{ $project->content }}</textarea>
            <label for="floatingTextarea">Contenuto</label>
          </div>
          <button class="btn btn-success">Invia</button>
    </form>
    
@endsection