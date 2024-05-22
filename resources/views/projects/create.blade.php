@extends('template.base')

@section('title', 'Crea progetto')

@section('content')
    <form action="{{route('projects.store')}}" method="post">
        @method('POST')
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Titolo" name="title">
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content"></textarea>
            <label for="floatingTextarea">Contenuto</label>
          </div>
          <button class="btn btn-success">Invia</button>
    </form>
    
@endsection