@extends('app')





@section('content')
    <h2>User</h2>

    @if ( !$users->count() )
        You have no users
    @else
        <ul>
            @foreach( $users as $user )
                <li>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('users.destroy', $project->slug))) !!}
                    <a href="{{ route('user.show', $user->slug) }}">{{ $user->name }}</a>
                    (
                    {!! link_to_route('user.edit', 'Edit', array($user->slug), array('class' => 'btn btn-info')) !!},
                    {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                    )
                    {!! Form::close() !!}
                </li>
            @endforeach
        </ul>
    @endif

    <p>
        {!! link_to_route('users.create', 'Create User') !!}
    </p>
@endsection

