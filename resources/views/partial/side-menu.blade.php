<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard')?'active':'' }}" href="{{ route('dashboard') }}">
                    <i class="fa fa-tachometer"></i>&nbsp;
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('add-student')?'active':'' }}" href="{{ route('add-student') }}">
                    <i class="fa fa-user-o"></i>&nbsp;
                    Add Student
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('student*')?'active':'' }}" aria-current="page" href="{{ route('student-list') }}">
                    <i class="fa fa-list-ul"></i>&nbsp;
                    Student List
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('add-course')?'active':'' }}" href="{{ route('add-course') }}">
                    <i class="fa fa-file-text-o"></i>&nbsp;
                    Create courses
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('course*')?'active':'' }}" aria-current="page" href="{{ route('course-list') }}">
                    <i class="fa fa-th-list"></i>&nbsp;
                    Course List
                </a>
            </li>

            <li class="nav-item">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link" onclick="event.preventDefault();
                                                this.closest('form').submit();" href="{{ route('logout') }}">
                        <i class="fa fa-sign-out"></i>&nbsp;
                        Logout
                    </a>
                </form>
            </li>

        </ul>
    </div>
</nav>