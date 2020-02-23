@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.tags')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')
                    </a></li>
                <li><a href="{{ route('dashboard.tags.index') }}"> @lang('site.tags')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')
                    <ul class="nav nav-tabs">
                        @foreach (config('translatable.locales') as $index=>$locale)
                            <li class="nav-item">
                                <a href="#" data-target="#{{ $locale }}" data-toggle="tab"  class="nav-link small text-uppercase {{ $index == 0 ? 'active' : '' }}">@lang($locale)
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <form action="{{ route('dashboard.tags.update', $tag->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="tab-content">
                            @foreach (config('translatable.locales') as $index=>$locale)
                                <div class="tab-pane {{ $index == 0 ? 'active' : '' }} py-2" id="{{ $locale }}">
                                    <div class="form-group">
                                        <label>@lang('site.' . $locale . '.name')</label>
                                        <input type="text" name="{{ $locale }}[name]" class="form-control"
                                               value="{{ $tag->translate($locale)->name }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')
                            </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
