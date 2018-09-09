@extends('layouts.app')
@section('content')
    @include('vendor.modal.delete')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <header class="card-header">
                    <div class="">
                        <i class="fa fa-align-justify"></i>
                        <strong>{!! __('contact.title') !!}</strong>
                    </div>
                </header>
                <div class="card-body">
                    <table class="table table-responsive-xl table-bordered table-hover"
                           data-toggle="dataTable"
                           data-form="deleteForm"
                    >
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">
                                @sortablelink('id', '#')
                            </th>
                            <th scope="col">
                                @sortablelink('name', trans('contact.attributes.name'))
                            </th>
                            <th scope="col">
                                @sortablelink('phone', trans('contact.attributes.phone'))
                            </th>
                            <th scope="col">
                                @sortablelink('subject', trans('contact.attributes.subject'))
                            </th>
                            <th scope="col">
                                @sortablelink('email', trans('contact.attributes.email'))
                            </th>
                            <th scope="col">
                                @sortablelink('message', trans('contact.attributes.message'))
                            </th>
                            <th scope="col" class="text-center">{!! __('fields.attributes.actions.action') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $index => $contact)
                            <tr>
                                <th scope="row" class="text-center">{!! $loop->iteration !!}</th>
                                <td>{!! $contact->name !!}</td>
                                <td>{!! $contact->phone !!}</td>
                                <td>{!! $contact->subject !!}</td>
                                <td>{!! $contact->email !!}</td>
                                <td>{!! str_limit($contact->message, 50) !!}</td>
                                <td class="text-center">
                                    <div class='btn-group'>
                                        {!! Form::open(['route' => ['admin.contacts.destroy', $contact->id], 'method' => 'delete', 'class' => 'confirm']) !!}
                                        {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm confirm']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-8">
                            {!! $contacts->appends(Request::except('page'))->render() !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::select('limit', [
                                '?limit=5' => 5,
                                '?limit=20' => 20,
                                '?limit=50' => 50,
                                '?limit=100' => 100,
                                '?limit=500' => 500,
                            ], '?limit='.$limit, ['class' => 'form-control', 'id' => 'paginate']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
