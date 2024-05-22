@extends('template.base')

@section('title', 'Progetto')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$project->title}}</h5>
            <p class="card-text">{{$project->content}}</p>
            <p class="card-text">Autore: {{$project->author}}</p>                        
        </div>
    </div>
@endsection