@extends('layout.base')

@section('content')
    <form action="{{ route('category.update', $category->id) }}" method="POST" class="mt-5">
        @csrf
        <div class="container-fluid row">
            <div class="col-xl-4"></div>
            <div class="col-xl-4">
                <div class="form-floating">
                    <input type="text" value="{{ $category->name }}" class="form-control" placeholder="Entrer le nom de la catégorie" required name="name">
                    <label for="">Modifier</label>
                
                </div>
                <button class="btn btn-outline-primary mt-3 new-bg">Soumettre</button>
                
            </div>
            <div class="col-xl-4"></div>
        </div>
    </form>
@endsection
