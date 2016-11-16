@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if($errors->has())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(isset($property))
                            Update
                        @else
                            Register
                            @endif
                        Property
                    </div>
                    <div class="panel-body">
                        @if(isset($property))
                            <form class="form-horizontal" role="form" method="POST" action="{{ Route('properties.update',$property->id) }}">
                        @else
                            <form class="form-horizontal" role="form" method="POST" action="{{ Route('properties.store') }}">
                        @endif
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title"
                                           value="<?= isset($property)? $property->title : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" >
                                        <?= isset($property)? $property->description : '' ?>
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Address</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address"
                                           value="<?= isset($property)? $property->address : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Town</label>
                                <div class="col-md-6">
                                    <input id="town" type="text" class="form-control" name="town"
                                           value="<?= isset($property)? $property->town : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Country</label>
                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control" name="country"
                                           value="<?= isset($property)? $property->country : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">State</label>
                                <div class="col-md-6">
                                    <select id="state_id" type="text" class="form-control" name="state_id" >
                                        <option value="">Seleccione</option>
                                        @foreach($states as $state)
                                            <option value="{{$state['id']}}" <?= (isset($property) && $property->state_id==$state['id'])? 'selected' : '' ?> >{{$state['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Facilities</label>
                                <div class="col-md-6">
                                    <ul>
                                    @foreach($facilities as $facility)
                                        <li>{{$facility['name']}} : <input <?= (isset($property) && in_array($facility['id'], $facilities_property))? 'checked' : '' ?> type="checkbox" name="facility[]" value="{{$facility['id']}}"></li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>
                                        @if(isset($property))
                                            Update
                                        @else
                                            Register
                                        @endif
                                    </button>
                                    <a href="{{ Route('properties.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
