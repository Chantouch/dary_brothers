@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-table"></i> {!! __('forms.users.create') !!}</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(array('route' => 'admin.users.store','method'=>'POST' , 'class' => 'needs-validation', 'files' => true)) !!}
                    @include('admin.users.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
