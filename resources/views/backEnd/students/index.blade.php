@extends('layouts.app')
@section('title')
Student
@stop

@section('content')

    <h1>Students <a href="{{ url('students/create') }}" class="btn btn-primary pull-right btn-sm">Add New Student</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblstudents">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Professor_Id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($students as $item)
                <tr>
                   <td>{{ $item->id }}</td>
                    <td><a href="{{ url('students', $item->id) }}">{{ $item->name }}</a></td>
                    <td>{{ $item->lastname }}</td>
                    <td>{{ $item->professors_id }}</td>
                    <td>
                        <a href="{{ url('students/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['students', $item->id],
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
        $('#tblstudents').DataTable({
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