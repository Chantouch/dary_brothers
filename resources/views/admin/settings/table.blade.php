<div class="body table-responsive">
    @if(count($settings))
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>@sortablelink('address', '#', [], ['class' => 'nowrap', 'rel' => 'nofollow'])</th>
                <th>@sortablelink('name', trans('settings.attributes.name'))</th>
                <th>@sortablelink('value', trans('settings.attributes.value'))</th>
                <th>@sortablelink('description', trans('settings.attributes.description'))</th>
                <th>{!! __('settings.attributes.action') !!}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($settings as $index => $setting)
                <tr>
                    <th>{!! $loop->iteration !!}</th>
                    <td>{!! $setting->name !!}</td>
                    <td>
                        <?php
                        $json = json_decode($setting->field, true);
                        ?>
                        @if($json['type'] == 'checkbox')
                            <a href="{{ route('admin.settings.ajax-update', $setting->id) }}"
                               class="ajax-request btn btn-outline-primary"
                               data-table="settings" data-field="value"
                               data-line-id="value{!! $setting->id !!}"
                               data-id="{!! $setting->id !!}" data-value="{!! $setting->value !!}">
                                <i id="value{!! $setting->id !!}"
                                   class="fa {!! $setting->value == 1 ? 'fa-check-square-o' : 'fa-square-o' !!}"
                                   aria-hidden="true"
                                ></i>
                            </a>
                        @elseif($json['type'] == 'image')
                            <img src="{!! asset($setting->value) !!}" alt="{!! $setting->value !!}" width="70">
                        @else
                            {!! $setting->value !!}
                        @endif
                    </td>
                    <td>{!! $setting->description !!}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{!! route('admin.settings.edit', [$setting->id]) !!}"
                               class='btn btn-primary btn-outline waves-effect btn-sm'>
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-8">
                {!! $settings->appends(Request::except('page'))->render() !!}
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
    @else
        <p>There is no data here.</p>
    @endif
</div>
