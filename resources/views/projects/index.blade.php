@extends('template.base')

@section('title', 'Progetti')

@section('content')
    
    @session('delete_success')
        <div class="alert alert-success" role="alert">
            Il progetto "{{ session('delete_success')->title }}" è stato eliminato con successo
        </div>
    @endsession

    @session('update_success')
        <div class="alert alert-success" role="alert">
            Il progetto "{{ session('update_success')->title }}" è stato modificato con successo
            <a class="text-decoration-none" href="{{ route('projects.show', ['project' => session('update_success')]) }}">Visualizza</a>
        </div>
    @endsession
    
    @session('create_success')
        <div class="alert alert-success" role="alert">
            Il progetto "{{ session('create_success')->title }}" è stato creato con successo
            <a class="text-decoration-none" href="{{ route('projects.show', ['project' => session('create_success')]) }}">Visualizza</a>
        </div>
    @endsession
    
    <div class="row">
        @foreach ($projects as $project)
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->title}}</h5>
                        <p class="card-text">{{$project->content}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('projects.show', ['project' => $project])}}" class="text-decoration-none">Dettagli</a>
                            @auth
                            @if (Auth::user()->id === $project->user_id)
                            <div class="d-flex gap-1">
                                <a href="{{route('projects.edit', ['project' => $project])}}" class="btn btn-success">Modifica</a>
                                <form action="{{route('projects.destroy', ['project' => $project])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection