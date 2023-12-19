@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>la liste de mes clients</h1>

            <table class="table">
                <head>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Date</th>
                    <th>Actions</th>

                </tr>
                </head>
                <body>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->created_at }}</td>

                         <td>

                            <form action="{{ url('users/'.$user->id) }}" method="post">
                             {{ csrf_field() }}
                             {{ method_field('DELETE') }}
                             <button type="submit" class="btn btn-danger">Supprimer</button>
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
