@extends('layouts.app')
@section('title')
Professor
@stop

@section('content')

    <h1>Professors <a href="{{ url('professors/create') }}" class="btn btn-primary pull-right btn-sm">Add New Professor</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblprofessors">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($professors as $item)
                <tr>
                   <td>{{ $item->id }}</td>
                    <td><a href="{{ url('professors', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->lastname }}</td>
                    <td>
                        <a href="{{ url('professors/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['professors', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tblprofessors').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection