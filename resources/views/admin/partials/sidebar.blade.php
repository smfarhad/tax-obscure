<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{URL::asset('assets/admin/img/avatar5.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="{{URL::to('/admin')}}">
                    <i class="fa fa-dashboard"></i> <span> Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-legal"></i> <span> {{config('site_nav.discrepancy.name')}} </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a  href="{{URL::to(config('site_nav.discrepancy.list_url'))}}"><i class="fa fa-circle-o"></i> {{config('site_nav.report.list')}}</a></li>
                    <li><a href="{{URL::to(config('site_nav.discrepancy.add_url'))}}"><i class="fa fa-circle-o"></i> {{config('site_nav.report.add')}}</a></li>
                </ul>
            </li>    
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-legal"></i> <span> {{config('site_nav.report.name')}} </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a  href="{{URL::to(config('site_nav.report.list_url'))}}"><i class="fa fa-circle-o"></i> {{config('site_nav.report.list')}}</a></li>
                    <li><a href="{{URL::to(config('site_nav.report.add_url'))}}"><i class="fa fa-circle-o"></i> {{config('site_nav.report.add')}}</a></li>
                </ul>
            </li>             
            @if(Auth::user()->user_type == 1)
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-institution"></i> <span> {{config('site_nav.office.name')}} </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a  href="{{URL::to(config('site_nav.office.list_url'))}}"><i class="fa fa-circle-o"></i> {{config('site_nav.office.list')}}</a></li>
                    <li><a href="{{URL::to(config('site_nav.office.add_url'))}}"><i class="fa fa-circle-o"></i> {{config('site_nav.office.add')}}</a></li>
                </ul>
            </li>  

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-users"></i> <span> {{config('site_nav.users.name')}} </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a  href="{{URL::to(config('site_nav.users.list_url'))}}"><i class="fa fa-circle-o"></i> {{config('site_nav.users.list')}}</a></li>
                    <li><a href="{{URL::to(config('site_nav.users.add_url'))}}"><i class="fa fa-circle-o"></i> {{config('site_nav.users.add')}}</a></li>
                </ul>
            </li> 
            @endif;

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>