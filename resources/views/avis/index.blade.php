
@extends('layouts.master')
@section('content')
<h1>la liste des avis</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nom du client</th>
            <th scope="col">email</th>
            <th scope="col">commentaire</th>
            <th scope="col">nom du produit</th>
            <th scope="col">action</th>

        </tr>
    </thead>
    <tbody>
         @foreach ($avis as $avi)
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $avi->name }}</td>
            <td>{{ $avi->email }}</td>
            <td>{{ $avi->commentaire }}</td>
            <td>{{ $avi->product->name }}</td>
            <td>

                <form action="{{ url('avis/'.$avi->id) }}" method="post">
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}


                 <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>



             </td>
         </tr>
         @endforeach
        </tbody>
</table>
@endsection
