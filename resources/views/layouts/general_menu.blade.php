{{--
<ul class="sidebar-menu">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
        </ul>
    </li>
</ul>
--}}
@if (!(Auth::guest()))
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li {{Statuses::isActiveMenuItem('timesheets') ? 'class=active' : ''}}><a href="{{url('/timesheets')}}"><i class="fa fa-dashboard"></i><span>Timesheets</span></a></li>
        @if(Auth::user()->hasRole(2))
            <li {{Statuses::isActiveMenuItem('projects') ? 'class=active' : ''}}><a href="{{url('/projects')}}"><i class="fa fa-briefcase"></i><span>Projects</span></a></li>
            <li {{Statuses::isActiveMenuItem('admin/showUsers') ? 'class=active' : ''}}><a href="{{url('/admin/showUsers')}}"><i class="fa fa-users"></i><span>Users</span></a></li>
            <li {{Statuses::isActiveMenuItem('admin/showDepartments') ? 'class=active' : ''}}><a href="{{url('/admin/showDepartments')}}"><i class="fa fa-random"></i><span>Departments</span></a></li>
            <li {{Statuses::isActiveMenuItem('admin/showCategories') ? 'class=active' : ''}}><a href="{{url('/admin/showCategories')}}"><i class="fa fa-folder"></i><span>Categories</span></a></li>
        @elseif(Auth::user()->hasRole(3))

        @else
            <li {{Statuses::isActiveMenuItem('projects') ? 'class=active' : ''}}><a href="{{url('/projects')}}"><i class="fa fa-briefcase"></i><span>Projects</span></a></li>
            <li {{Statuses::isActiveMenuItem('admin/showDepartments') ? 'class=active' : ''}}><a href="{{url('/admin/showDepartments')}}"><i class="fa fa-random"></i><span>Departments</span></a></li>
            <li {{Statuses::isActiveMenuItem('admin/showUsers') ? 'class=active' : ''}}><a href="{{url('/admin/showUsers')}}"><i class="fa fa-users"></i><span>Users</span></a></li>
            <li {{Statuses::isActiveMenuItem('admin/showCategories') ? 'class=active' : ''}}><a href="{{url('/admin/showCategories')}}"><i class="fa fa-folder"></i><span>Categories</span></a></li>
            <li {{Statuses::isActiveMenuItem('admin/showClients') ? 'class=active' : ''}}><a href="{{url('/admin/showClients')}}"><i class="fa fa-diamond"></i><span>Clients</span></a></li>
        @endif
        <li><a href="{{url('/reports')}}"><i class="fa fa-pie-chart"></i><span>Reports</span></a></li>

    </ul>
@endif