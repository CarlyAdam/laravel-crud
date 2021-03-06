@extends('layouts.app')
@section('title')
Edit Professor
@stop

@section('content')

    <h1>Edit Professor</h1>
    <hr/>

    {!! Form::model($professor, [
        'method' => 'PATCH',
        'url' => ['professors', $professor->id],
        'class' => 'form-horizontal'
    ]) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

   <div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
                {!! Form::label('lastname', 'Lastname: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>         
            

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection