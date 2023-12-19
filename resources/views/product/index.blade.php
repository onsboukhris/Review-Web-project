@extends('layouts.dash')
@section('content')
<h1>la liste des produits</h1>
<div class="pull-right">
    <a href="{{ url('products/create')}}" class="btn btn-success">new produit</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">product name</th>
            <th scope="col">adresse</th>
            <th scope="col">pays</th>
            <th scope="col">ville</th>
            <th scope="col">entreprise</th>
            <th scope="col">image</th>

            <th scope="col">category name</th>
            <th scope="col">actions</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($products as $product)
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->adresse }}</td>
            <td>{{ $product->pays }}</td>
            <td>{{ $product->ville }}</td>
            <td>{{ $product->entreprise }}</td>
            <td>{{ $product->image}}</td>
            <td>{{ $product->category->name}}</td>
            <td>

                <form action="{{ url('products/'.$product->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ url('products/'.$product->id.'/edit') }}" class="btn btn-primary">Editer</a>
                    <button   type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
         </tr>
        @endforeach
     <tbody>

    </table>
@endsection
