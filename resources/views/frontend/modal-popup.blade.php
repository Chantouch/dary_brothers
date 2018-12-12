<div class="modal fade bd-example-modal-lg" id="myPopupModal"
     tabindex="-1" role="dialog"
     aria-labelledby="myPopupModalTitle"
     aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myPopupModalTitle">
                    @if(isset($popUpVideo))
                        {{$popUpVideo->name}}
                    @else
                        Sample title
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="time-closed-modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="popup-start-page">
                    @if(isset($popUpVideo))
                        <iframe src="{{ $popUpVideo->link  }}?autoplay=1"
                                frameborder="0"
                                allow="autoplay; encrypted-media" allowfullscreen
                        ></iframe>
                    @else
                        <iframe src="https://www.youtube.com/embed/3BX-uBxG4jI?autoplay=1"
                                frameborder="0"
                                allow="autoplay; encrypted-media" allowfullscreen
                        ></iframe>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
