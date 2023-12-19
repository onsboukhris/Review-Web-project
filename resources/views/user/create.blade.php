@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('users') }}" method="post">
                {{  csrf_field() }}
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">

                    <input type="submit"  class="form-control btn btn-primary" value="Enregistrer">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
