@if ($popup)
    <div id="modal" data-type="{{ $popup->type }}" style="display: none">
        @if ($popup->type == 'image')
            <a href="{{ $popup->url }}"><img class="w-100 img-fluid" src="{{ $popup->image_url }}"></a>
        @elseif($popup->type == 'text')
            {!! $popup->description !!}
        @endif
    </div>

    <script type="text/javascript">
        $(document).ready(function($) {
            if ($.cookie("popup_view") === undefined) {
                var type = "{{ $popup->type }}"
                var commonSettings = {
                    title: '{{ $popup->title }}',
                    background: '{{ $popup->settings->color }}',
                    headerColor: '{{ $popup->settings->color }}',
                    closeOnEscape: {{ $popup->settings->closeOnEscape }} ? true : false,
                    closeButton: {{ $popup->settings->closeButton }} ? true : false,
                    fullscreen: {{ $popup->settings->fullScreenButton }} ? true : false,
                    overlay: true,
                    overlayClose: {{ $popup->settings->overlayClose }} ? true : false,
                    timeout: parseInt({{ $popup->settings->time }}) * 1000,
                    timeoutProgressbar: (parseInt({{ $popup->settings->time }}) > 0) ? true : false,
                    pauseOnHover: {{ $popup->settings->pauseOnHover }} ? true : false,
                    autoOpen: true,
                    width: parseInt({{ $popup->settings->width }}),
                    borderBottom: false,
                }
                if (type == "video") {
                    var modalSettings = {
                        ...commonSettings,
                        iframe: true,
                        iframeUrl: '{{ $popup->video }}'
                    }
                } else {
                    var modalSettings = commonSettings
                }
                $("#modal").iziModal(modalSettings);
            }
        });

        $(document).on('closed', '#modal', function(e) {
            $.cookie("popup_view", "excepted", {
                expires: 1,
                path: '/'
            });
        });
    </script>
@endif
