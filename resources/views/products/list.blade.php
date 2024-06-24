@extends('layout.base')

@section('content')
<h1>Liste produits</h1>
<a href="{{ route('product.create') }}" class="btn-primary">Créer un produit</a>
<div class="row mt-5">

    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endif


    @foreach ($products as $product )
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12"> 
    <div class="card" style="width: 18rem;">
     <img src="{{ URL::asset($product->file == '' ? 'db/OIP.jfif' : URL::asset('db/products/' . $product->file)) }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->price }} FCFA</p>
            </div>
            <ul class="list-group list-group-flush">

                <li class="list-group-item">{{ App\Models\Category::find($product->category_id)->name }}</li>
            </ul>
            <div class="card-body">
                <a href="{{ route('product.edit', $product->id) }}" class="card-link text-danger">Modifier</a>
                <a href="{{ route('product.destroy', $product->id) }}" class="card-link" onclick="return confirm('etes vous sur de supprimerlon')">Supprimer</a>
            </div>
        </div>
     
    </div>
   
    @endforeach


</div>
@endsection