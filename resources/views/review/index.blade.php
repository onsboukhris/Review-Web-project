@extends('layouts.dash')
@section('content')
<h1>la liste des avis</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">rate</th>
            <th scope="col">content</th>
            <th scope="col">user</th>
            <th scope="col">produit</th>
            <th scope="col">action</th>

        </tr>
    </thead>
    <tbody>
         @foreach ($reviews as $review)
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $review->rate }}</td>
            <td>{{ $review->content }}</td>
            <td>{{ $review->user->name}}</td>
            <td>{{ $review->product->name }}</td>
            <td>

                <form action="{{ url('reviews/'.$review->id) }}" method="post">
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
