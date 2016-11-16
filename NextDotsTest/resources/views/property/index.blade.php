@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <h1 class="page-header">
                        Properties
                        <a href="{{ Route('properties.create') }}" class="btn btn-success">Add</a>
                    </h1>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>N</th>
                                    <th>Title</th>
                                    <th>address</th>
                                    <th>Town</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td scope="row">{{ $item->title }}</td>
                                    <td scope="row">{{ $item->address }}</td>
                                    <td scope="row">{{ $item->town }}</td>
                                    <td scope="row">{{ $item->country }}</td>
                                    <td>{{ $item->state->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-success" href="{{ Route('properties.edit',
                                            $item->id) }}">Edit</a>
                                            <a class="btn btn-danger" href="{{ Route('properties.destroy',
                                            $item->id) }}">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
@endsection
