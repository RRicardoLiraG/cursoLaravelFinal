<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if (Auth::user()->photo == '')
                    <img src="{{ url('storage/users/anonymous.png') }}" class="img-circle">
                @else
                    <img src="{{ url('storage/users/' . Auth::user()->photo) }}" class="img-circle">
                @endif
            </div>
            <div class="pull-left info" style="white-space: normal; word-break: break-word; text-align: center;">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>

        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
                <a href="{{ url('content') }}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class=" ">
                <a href="{{ url('/content/users') }}">
                    <i class="fa fa-users"></i><span>Usuarios</span>
                </a>
            </li>
            <li class=" ">
                <a href="{{ url('/content/branches') }}">
                    <i class="fa fa-building"></i> <span>Sucursales</span>
                </a>
            </li>
            <li class="  ">
                <a href="{{ url('/content/products') }}">
                    <i class="fa fa-cubes"></i> <span>Productos</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
