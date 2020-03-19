<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('uploads/user_images/pic2.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Blog CMS</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ route('dashboard.welcome') }}"><i
                        class="fa fa-home"></i><span>@lang('site.dashboard')</span></a>
            </li>
            <li><a href="{{ route('dashboard.categories.index') }}"><i
                        class="fa fa-th-list"></i><span>@lang('site.categories')</span></a>
            </li>
            <li><a href="{{ route('dashboard.tags.index') }}"><i
                        class="fa fa-th-list"></i><span>@lang('site.tags')</span></a>
            </li>
            <li><a href="{{ route('dashboard.products.index') }}"><i
                        class="fa fa-building"></i><span>@lang('site.products')</span></a>
            </li>
            <li><a href="{{ route('dashboard.users.index') }}"><i
                        class="fa fa-user"></i><span>@lang('site.users')</span></a>
            </li>
        </ul>
    </section>
</aside>

