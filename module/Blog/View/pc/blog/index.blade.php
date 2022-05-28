@extends($_viewFrame)

@section('pageTitle'){{modstart_config('siteName')}} | {{modstart_config('siteSlogan')}}@endsection
@section('pageKeywords'){{modstart_config('siteKeywords')}}@endsection
@section('pageDescription'){{modstart_config('siteDescription')}}@endsection

{!! \ModStart\ModStart::js('asset/common/scrollAnimate.js') !!}

@section('bodyContent')

    <div class="ub-container">
        <div class="row">
            <div class="col-md-8">

                <div class="tw-bg-white margin-top tw-p-1 tw-rounded">
                    {!! \Module\Banner\Render\BannerRender::position('home') !!}
                </div>

                <div class="tw-p-6 tw-rounded tw-bg-white margin-top">
                    @include('module::Blog.View.pc.blog.inc.blogItems')
                    <div>
                        <div class="ub-page">
                            {!! $pageHtml !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                @include('module::Blog.View.pc.blog.inc.info')

                @include('module::Blog.View.pc.blog.inc.categories')

                @include('module::Blog.View.pc.blog.inc.tags')

                @include('module::Blog.View.pc.blog.inc.partners')

            </div>
        </div>
    </div>

@endsection
