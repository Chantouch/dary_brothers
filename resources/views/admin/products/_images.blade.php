@if (isset($product) && isset($images))
    <div class="row">
        @foreach($images as $image)
            <div class="jFiler-items jFiler-row">
                <ul class="jFiler-items-list jFiler-items-grid">
                    <li class="jFiler-item" data-jfiler-index="1">
                        <div class="jFiler-item-container">
                            <div class="jFiler-item-inner">
                                <div class="jFiler-item-thumb">
                                    <div class="jFiler-item-status"></div>
                                    <div class="jFiler-item-info">
                                        <span class="jFiler-item-title">
                                            <b title="{{ $image->name }}">{{ $image->name }}</b>
                                        </span>
                                        <span class="jFiler-item-others">
                                            {{ $image->human_readable_size }}
                                        </span>
                                    </div>
                                    <div class="jFiler-item-thumb-image">
                                        {{ Html::image($image->getUrl(), $image->name, ['class' => 'card-img-top']) }}
                                    </div>
                                </div>
                                <div class="jFiler-item-assets jFiler-row">
                                    <ul class="list-inline pull-left">
                                        <li>
                                            <span class="jFiler-item-others">
                                                <i class="icon-jfi-file-image jfi-file-ext-jpg"></i>
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <a class="icon-jfi-trash jFiler-item-trash-action"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
@endif
