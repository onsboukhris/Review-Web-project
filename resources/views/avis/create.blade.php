@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>


<div class="container">


    <div class="row">
        <div class="col-md-12">
            <h1>Avis</h1>
            <form action="{{ url('avis') }}"  method="post">
                {{ csrf_field() }}
                <h4>leave a review</h4>
                <small>your email address will not be published</small>
                <div class="form-group">
                    <label for="">your rating</label>
                    <input  type="number" max="5" min="1"  class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"  name="email" class="form-control">
                </div>


</div>
                <div class="form-group">
                    <label for="">votre avis</label>
                    <textarea   name="commentaire" class="form-control" rows="5" cols="33"></textarea>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Product name</label>
                        <input type="text"  name="product" class="form-control">
                    </div>

                    <input type="submit"  class="form-control btn btn-primary" value="Enregistrer">
                </div>

            </form>

        </div>
    </div>
</div>
</body>
</html>
@endsection

