@extends('layouts.website.app')

@section('title')
{{$design_idea->name}}
@endsection

@push('css')
<link href="{{asset('siteAssets/css/magiczoomplus.css')}}" rel="stylesheet" type="text/css" media="screen" />

@endpush

@push('scripts')
<script src="{{asset('siteAssets/js/magiczoomplus.js')}}" type="text/javascript"></script>

<script type="text/javascript">
    var mzOptions = {};
    mzOptions = {
        onZoomReady: function () {
            console.log('onReady', arguments[0]);
        },
        onUpdate: function () {
            console.log('onUpdated', arguments[0], arguments[1], arguments[2]);
        },
        onZoomIn: function () {
            console.log('onZoomIn', arguments[0]);
        },
        onZoomOut: function () {
            console.log('onZoomOut', arguments[0]);
        },
        onExpandOpen: function () {
            console.log('onExpandOpen', arguments[0]);
        },
        onExpandClose: function () {
            console.log('onExpandClosed', arguments[0]);
        },
        "transitionEffect": false,
        "zoomOn": "click",
        "zoomMode": "off",
        "cssClass": "no-expand-thumbnails"
    };
    var mzMobileOptions = {};

    function isDefaultOption(o) {
        return magicJS.$A(magicJS.$(o).byTag('option')).filter(function (opt) {
            return opt.selected && opt.defaultSelected;
        }).length > 0;
    }

    function toOptionValue(v) {
        if (/^(true|false)$/.test(v)) {
            return 'true' === v;
        }
        if (/^[0-9]{1,}$/i.test(v)) {
            return parseInt(v, 10);
        }
        return v;
    }

    function makeOptions(optType) {
        var value = null,
            isDefault = true,
            newParams = Array(),
            newParamsS = '',
            options = {};
        magicJS.$(magicJS.$A(magicJS.$(optType).getElementsByTagName("INPUT"))
                .concat(magicJS.$A(magicJS.$(optType).getElementsByTagName('SELECT'))))
            .forEach(function (param) {
                value = ('checkbox' == param.type) ? param.checked.toString() : param.value;

                isDefault = ('checkbox' == param.type) ? value == param.defaultChecked.toString() :
                    ('SELECT' == param.tagName) ? isDefaultOption(param) : value == param.defaultValue;

                if (null !== value && !isDefault) {
                    options[param.name] = toOptionValue(value);
                }
            });
        return options;
    }

    function updateScriptCode() {
        var code = '&lt;script&gt;\nvar mzOptions = ';
        code += JSON.stringify(mzOptions, null, 2).replace(/\"(\w+)\":/g, "$1:") + ';';
        code += '\n&lt;/script&gt;';

        magicJS.$('app-code-sample-script').changeContent(code);
    }

    function updateInlineCode() {
        var code = '&lt;a class="MagicZoom" data-options="';
        code += JSON.stringify(mzOptions).replace(/\"(\w+)\":(?:\"([^"]+)\"|([^,}]+))(,)?/g, "$1: $2$3; ").replace(
            /\{([^{}]*)\}/, "$1").replace(/\s*$/, '');
        code += '"&gt;';

        magicJS.$('app-code-sample-inline').changeContent(code);
    }

    function applySettings() {
        MagicZoom.stop('Zoom-1');
        mzOptions = makeOptions('params');
        mzMobileOptions = makeOptions('mobile-params');
        MagicZoom.start('Zoom-1');
        updateScriptCode();
        updateInlineCode();
        try {
            prettyPrint();
        } catch (e) {}
    }

    function copyToClipboard(src) {
        var
            copyNode,
            range, success;

        if (!isCopySupported()) {
            disableCopy();
            return;
        }
        copyNode = document.getElementById('code-to-copy');
        copyNode.innerHTML = document.getElementById(src).innerHTML;

        range = document.createRange();
        range.selectNode(copyNode);
        window.getSelection().addRange(range);

        try {
            success = document.execCommand('copy');
        } catch (err) {
            success = false;
        }
        window.getSelection().removeAllRanges();
        if (!success) {
            disableCopy();
        } else {
            new magicJS.Message('Settings code copied to clipboard.', 3000,
                document.querySelector('.app-code-holder'), 'copy-msg');
        }
    }

    function disableCopy() {
        magicJS.$A(document.querySelectorAll('.cfg-btn-copy')).forEach(function (node) {
            node.disabled = true;
        });
        new magicJS.Message('Sorry, cannot copy settings code to clipboard. Please select and copy code manually.',
            3000,
            document.querySelector('.app-code-holder'), 'copy-msg copy-msg-failed');
    }

    function isCopySupported() {
        if (!window.getSelection || !document.createRange || !document.queryCommandSupported) {
            return false;
        }
        return document.queryCommandSupported('copy');
    }
</script>
@endpush


@section('content')

<!-- Design Detail -->
<div class="container bgwhite m-t-50 ">
    <div class="flex-w flex-sb">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="app-figure row photo_details" id="zoom-fig">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="row">
                        <a id="Zoom-1" class="MagicZoom"
                            href="{!! $design_idea->image_path.'/'.$design_idea->first_image->image !!}">
                            <img src="{!! $design_idea->image_path.'/'.$design_idea->first_image->image !!}" alt="" />
                        </a>
                    </div>
                    <div class="row">
                        <!--                ------------------------------------------>
                        <aside class="content_allbuttons_product_detail">
                            <button type="button" class="btn btn-blakk buttons_share_pro" data-toggle="modal"
                                data-target=".bd-share-modal"><i class="fa fa-share-square-o" aria-hidden="true"></i>
                                @Lang('site.share')</button>
                            <button type="button" class="btn btn-blakk buttons_share_pro " data-toggle="modal"
                                data-target=".bd-save-modal" title="@lang('site.save_to_my_ideas')"><i
                                    class="fa fa-heart-o"></i>
                                @Lang('site.save')</button>

                            <button type="button" class="btn  btn-blakk buttons_share_pro" data-toggle="modal"
                                data-target=".bd-question-modal">
                                <i class="fa fa-quora" aria-hidden="true"></i> @Lang('site.ask_me')
                            </button>
                            <button type="button" class="btn btn-blakk buttons_share_pro" data-toggle="modal"
                                data-target=".bd-email-modal">
                                <!-- <i class="fa fa-whatsapp" aria-hidden="true"></i> -->
                                <img class=" img_whatsapp_icon whatsapp_icon" style=" width: 16px !important;
                                transform: scale(1.5) !important;" src="{{asset('siteAssets/images/whatsapp.png')}}">
                                @Lang('site.whatsapp')</button>

                        </aside>
                        <!--                ------------------------------------------>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="selectors ">
                        <div class="row">
                            @foreach ($idea_images as $image)
                            <div class="col-md-3 col-sm-3 col-6 col-lg-6 image_block">
                                <a data-zoom-id="Zoom-1" href="{{$image->image_path}}">
                                    <img src="{{$image->image_path}}" />
                                </a>
                            </div>
                            @endforeach

                        </div>

                        <div class="row">
                            <button type="button" class="btn btn-blakk see_more" data-toggle="modal">
                                @Lang('site.see_more_photos')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-b-60">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <h4 class="m-b-20">
                            {{$design_idea->name}}
                        </h4>
                        <p class="s-text8">
                            {{$design_idea->description}}

                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(".image_block").slice(0, 2).show(); //showing 3 div

    $(".see_more").on("click", function () {
        $(".image_block:hidden").slice(0, 2).show(); //showing 3 hidden div on click

        if ($(".image_block:hidden").length == 0) {
            $(".see_more").fadeOut(); //this will hide
            //button when length is 0
        }
    })
</script>
@endpush

@endsection