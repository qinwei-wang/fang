<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{--<div class="user-panel">--}}
            {{--<div class="pull-left image">--}}
                {{--<img src="{{asset('bower_components/admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">--}}
            {{--</div>--}}
            {{--<div class="pull-left info">--}}
                {{--<p>Alexander Pierce</p>--}}
                {{--<!-- Status -->--}}
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form> -->
        <!-- /.search form -->
    <?php
    $host = \Request::server('HTTP_HOST');
    $host = explode('.', $host);
    ?>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            @foreach($menus as $menu)
                <li class="treeview @if($menu['is_open']) active @endif">
                    <a href="#"><i class="{{$menu['icon']}}"></i> <span>{{$menu['title']}}</span> <i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="treeview-menu">
                        @foreach($menu['menus'] as $submenu)
                            <li @if($submenu['is_active']) class="active" @endif>
                                <a @if(isset($submenu['target'])) target="{{$submenu['target']}}" @endif href="{{$submenu['link']}}">
                                    <i class="{{$submenu['icon']}}"></i>
                                    {{ $submenu['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
