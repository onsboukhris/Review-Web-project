@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>la liste de mes categories</h1>
            <div class="pull-right">
                <a href="{{ url('categs/create') }}" class="btn btn-success">new categorie</a>
            </div>
            <table class="table">
                <head>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Actions</th>

                </tr>
                </head>
                <body>
                    @foreach($categs as $categ)
                    <tr>
                        <td>{{ $categ->name }}</td>
                        <td>{{ $categ->created_at }}</td>
                         <td>

                            <form action="{{ url('categs/'.$categ->id) }}" method="post">
                             {{ csrf_field() }}
                             {{ method_field('DELETE') }}

                             <a href="{{ url('categs/'.$categ->id.'/edit')  }}" class="btn btn-primary">editer</a>
                             <button type="submit" class="btn btn-danger">Supprimer</a>
                            </form>



                         </td>
                    </tr>
                    @endforeach
                </body>
            </table>
        </div>
    </div>
</div>
@endsection
