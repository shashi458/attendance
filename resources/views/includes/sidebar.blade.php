<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <!-- Dashboard Menu Item -->
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Employee Menu Item with Submenu -->
            <li class="treeview">
                <a href="#">
                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                    <span>Employee</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('employee.add') }}">
                            <i class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
                            Add Employee
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('employee') }}">
                            <i class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
                            View Employee
                        </a>
                    </li>
                </ul>
            <li class="treeview">
                <a href="#">
                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                    <span>Attendance</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('attendance.index') }}">
                            <i class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
                            My Records
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('attendance.create') }}">
                            <i class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
                            Add Attendance
                        </a>
                    </li>
                </ul>
            {{-- <li>
                <a href="{{ route('attendance.index') }}">
                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                    <span>Attendance</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('holidays.index') }}">
                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                    <span>Holiday</span>
                </a>
            </li>
            <li>
                <a href="{{ route('reports.index') }}">
                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                    <span>Reports</span>
                </a>
            </li>
            <li>
                <a href="{{ route('reports.calendar') }}">
                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                    <span>Calender</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
