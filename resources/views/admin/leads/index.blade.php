@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Author</th>
                    <th scope="col">Content</th>
                    <th scope="col">Published at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td>{{ $lead->author }}</td>
                        <td>{{ $lead->content }}</td>
                        <td>{{ $lead->created_at }}</td>
                        <td>                          
                            <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>                              
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection