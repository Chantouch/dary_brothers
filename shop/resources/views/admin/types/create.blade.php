@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-table"></i> Create Category</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(array('route' => 'admin.types.store','method'=>'POST' , 'class' => 'needs-validation')) !!}
                    @include('admin.types.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
      (function () {
        'use strict';
        window.addEventListener('load', function () {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
      /*!
     * IE10 viewport hack for Surface/desktop Windows 8 bug
     * Copyright 2014-2017 The Bootstrap Authors
     * Copyright 2014-2017 Twitter, Inc.
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     */

      // See the Getting Started docs for more information:
      // https://getbootstrap.com/getting-started/#support-ie10-width

      (function () {
        'use strict'
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
          var msViewportStyle = document.createElement('style')
          msViewportStyle.appendChild(
            document.createTextNode(
              '@-ms-viewport{width:auto!important}'
            )
          )
          document.head.appendChild(msViewportStyle)
        }

      }())
    </script>
@endsection
