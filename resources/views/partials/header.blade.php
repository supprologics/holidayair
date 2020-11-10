<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">

        <div class="nk-block-head-content">
            <h2 class="nk-block-title page-title">{{$header}}</h2>
            <div class="nk-block-des text-soft">
                @isset($detail_line)
                <p>{{$detail_line}}</p>
                @endisset
            </div>
        </div>
        
        @if (isset($button))
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                        <em class="icon ni ni-more-v"></em>
                    </a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt">
                                <button type="button" id="{{isset($button_id)?$button_id:''}}" class="create-modal btn btn-primary">
                                    <em class="icon ni {{$icon}}"></em>
                                    <span>{{$button}}</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif

    </div><!-- .nk-block-head -->
</div><!-- .nk-block-head -->