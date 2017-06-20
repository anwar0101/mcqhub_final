@extends('layouts.app')

@section('title', 'Edit User ' . $category->name)

@section('content')

    <div class="row">
        <div class="col-md-5">
            <h3>Edit {{ $category->name }}</h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('categories.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::model($category, ['method' => 'PUT', 'route' => ['categories.update',  $category->id ] ]) !!}
                            @include('category._form')
                            <!-- Submit Form Button -->
                            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
