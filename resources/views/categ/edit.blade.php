@extends('layouts.dash')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('categs/'.$categ->id) }}" method="post">
                <input type="hidden" name="_method" value="put">
                {{  csrf_field() }}
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $categ->name }}">
                </div>

                <div class="form-group">

                    <input type="submit"  class="form-control btn btn-danger" value="Modifier">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
