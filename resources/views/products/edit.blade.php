@extends('layout.base')

@section('content')
    <div class="row">
        <div class="col-xl-4"></div>
        <div class="col-xl-4">
            <h1>Créer un produit </h1>
            @if ($message = Session::get('error'))

            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
                
            @endif
            @if ($message = Session::get('success'))

            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
                
            @endif
            <img src="{{ URL::asset($product->file == '' ? 'db/OIP.jfif' : URL::asset('db/products/' . $product->file)) }}" class="card-img-top"
                        alt="{{ $product->name }}" width="100%">

            <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
              

                <select class="form-select" name="category_id" required>
                    <option value="" selected>Choisir une catégorie</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>

                <label for="name">Nom du produit</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Saisir le nom du produit ici">

                <label for="price">Prix du produit</label>
                <input type="number" class="form-control" name="price"  value= "{{ $product->price }}"id="price"  min="100" max="1000000" value="0">

                <label for="description">Description du produit</label>
                <textarea name="description" id="description" placeholder="Saisir la description ici" class="form-control" rows="4" class="form-control">{{ $product->description }}</textarea><br/>

                <label for="file">Iamage de couverture</label>
                <div>
                    <input type="file" name="file" id="file" placeholder="Insérer un fichier" class="form-control">
                </div>
                <br/>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>

        </div>
        <div class="col-xl-4">
    </div>
        
    </div>
@endsection

