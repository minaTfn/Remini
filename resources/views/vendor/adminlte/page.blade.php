@extends('adminlte::master')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('usermenu_header')
    <li class="text-center p-3 border border-bottom">

        <a href="{{ route('changePassword.index') }}"><i class="fa fa-fw fa-lock"></i> Change Password</a>
    </li>
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper') ?? '' }}">

            {{-- Content Header --}}


            {{-- Main Content --}}
            <div class="content pl-5 pt-3">
                <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
                    <div class="col-md-8">
                        <div class="content-header mb-2">
                            <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="text-teal font-size-md">@yield('content_header')</span>
                                        @yield('breadcrumbs')
                                    </div>
                                    <div class="d-flex align-items-end">
                                        @yield('actions')
                                    </div>
                                </div>

                            </div>
                        </div>
                        @include('partials.messages')
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
