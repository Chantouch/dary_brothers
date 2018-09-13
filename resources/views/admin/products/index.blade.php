@extends('layouts.app')
@section('content')
    @include('vendor.modal.delete')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <header class="card-header">
                    <div class="">
                        <i class="fa fa-align-justify"></i>
                        <strong>{!! __('forms.products.list') !!}</strong>
                        <div class="card-actions">
                            <a href="{!! route('admin.products.create') !!}">
                                <small class="text-muted">{!! __('fields.attributes.types.new') !!}</small>
                            </a>
                        </div>
                    </div>
                </header>
                <div class="card-body">
                    @include('admin.products._form_search')
                    <table class="table table-responsive-xl table-bordered table-hover" data-toggle="dataTable"
                           data-form="deleteForm">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">
                                @sortablelink('id', '#')
                            </th>
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col">
                                @sortablelink('name', trans('forms.products.labels.name'))
                            </th>
                            <th scope="col">
                                @sortablelink('description', trans('forms.products.labels.description'))
                            </th>
                            <th scope="col">
                                @sortablelink('qty', trans('forms.products.labels.qty'))
                            </th>
                            <th scope="col">
                                @sortablelink('status', trans('forms.products.labels.status'))
                            </th>
                            <th scope="col" class="text-center">{!! __('fields.attributes.actions.action') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $index => $product)
                            <tr>
                                <th scope="row" class="text-center">{!! $loop->iteration !!}</th>
                                <td class="text-center">
                                    @if($product->hasMedia('product-images'))
                                        {{ Html::image($product->getMedia('product-images')->first()->getUrl(), $product->getMedia('product-images')->first()->name, ['class' => 'img-thumbnail', 'width' => '40px']) }}
                                    @else
                                        <img src="{{ asset('images/item-02.jpg') }}" alt="{{ $product->name }}"
                                             class="img-thumbnail" width="40px">
                                    @endif
                                </td>
                                <td>{!! $product->name !!}</td>
                                <td>{!! str_limit($product->description,50) !!}</td>
                                <td>{!! $product->qty !!}</td>
                                <td>{!! status($product->status) !!}</td>
                                <td class="text-center">
                                    <div class='btn-group'>
                                        <a href="{!! route('admin.products.edit', $product->getRouteKey()) !!}"
                                           class='btn btn-primary btn-sm'
                                        >
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {!! Form::open(['route' => ['admin.products.destroy', $product->getRouteKey()], 'method' => 'delete', 'class' => 'confirm']) !!}
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
                            {!! $products->appends(Request::except('page'))->render() !!}
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

@section('scripts')
    <script>
        $(document).ready(function () {
            $('button.confirm').on('click', function (e) {
                e.preventDefault();
                let self = $(this);
                swal({
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this imaginary file!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        self.parents('.confirm').submit();
                        return
                    }
                    swal('Your imaginary file is safe!');
                });
            });
        });
    </script>
@endsection
