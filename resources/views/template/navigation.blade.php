<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="{{ route('home') }}">RESOURCES FOR FORMATIVE ASSESSMENT IN RWANDA</a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                      class="icon-cog"></i> Account <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="javascript:;">Settings</a></li>
                        <li><a href="javascript:;">Help</a></li>
                      </ul>
                    </li>-->

                    @php
                        $auth_id = \Auth::id();
                    @endphp
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="icon-user"></i> {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:;">Profile</a></li>
                            <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
                <!-- <form class="navbar-search pull-right">
                   <input type="text" class="search-query" placeholder="Search">
                 </form>-->
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /container -->
    </div>
    <!-- /navbar-inner -->
</div>
<!-- /navbar -->
@php
$active_route = \Request::route()->getName();
@endphp
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li @if ($active_route=='home') class="active" @endif ><a href="{{ route('home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>

                <li class="dropdown @if ($active_route=='reports.index' || $active_route=='reports.classroomsearch') active @endif "><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-bar-chart"></i><span>Reports</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('reports.index') }}">Student Level Performane</a></li>
                        <li><a href="{{route('reports.classroomsearch')}}">Classroom Level Performane</a></li>
                       <!-- <li><a href="#">School Level Performane</a></li>
                        <li><a href="#">Sector Level Performance</a></li>
                        <li><a href="#">District Level Performane</a></li>
                        <li><a href="#">Province Level Performane</a></li>-->

                    </ul>
                </li>
                <li @if ($active_route=='resources.index') class="active" @endif ><a href="{{ route('resources.index') }}"><i class="icon-search"></i><span>Resources</span> </a> </li>
                <li class="dropdown  @if ($active_route=='actionplans.create' || $active_route=='actionplans.index') active @endif"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-certificate"></i><span>Performance</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('actionplans.create') }}">Student Observation</a></li>
                        <li><a href="{{ route('actionplans.index') }}">Action Plans</a></li>

                    </ul>
                </li>
                <li class="dropdown @if ($active_route=='schools.index' || $active_route=='teachers.index' || $active_route=='students.index' || $active_route=='guardians.index') active @endif"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-building"></i><span>Institutions</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('schools.index') }}">Schools</a></li>
                        <li><a href="{{ route('teachers.index') }}">Teachers</a></li>
                        <li><a href="{{ route('students.index') }}">Students</a></li>

                    </ul>
                </li>

                <li class="dropdown  @if ($active_route=='documentcategories.index' || $active_route=='documents.index') active @endif"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-file"></i><span>Documents</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('documentcategories.index') }}">Document Categories</a></li>
                        <li><a href="{{ route('documents.index') }}">Documents</a></li>

                    </ul>
                </li>

               <li @if ($active_route=='questiondatabanks.index') class="active" @endif><a href="{{ route('questiondatabanks.index') }}"><i class="icon-question"></i><span>Question Bank</span> </a> </li>

                <li class="dropdown @if ($active_route=='semesters.index' || $active_route=='grades.index' || $active_route=='studyfields.index'|| $active_route=='subjects.index'|| $active_route=='units.index' || $active_route=='skills.index') active @endif"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Academics</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('semesters.index') }}">Trimesters</a></li>
                        <li><a href="{{ route('grades.index') }}">Grades</a></li>
                        <li><a href="{{ route('studyfields.index') }}">Subjects</a></li>
                        <li><a href="{{ route('subjects.index') }}">Grade Subjects</a></li>
                        <li><a href="{{ route('units.index') }}">Units</a></li>
                        <!--<li><a href="{{ route('standards.index') }}">Standards</a></li>-->
                        <li><a href="{{ route('skills.index') }}">Skills</a></li>
                    </ul>
                </li>

                <li class="dropdown @if ($active_route=='faqs.index' || $active_route=='contents.index'|| $active_route=='videos.index') active @endif"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-pencil"></i><span>Content</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('faqs.index') }}">FAQs</a></li>
                        <li><a href="{{ route('contents.index') }}">Articles</a></li>
                        <li><a href="{{ route('videos.index') }}">Videos</a></li>

                    </ul>
                </li>

                <li class="dropdown @if ($active_route=='provinces.index' || $active_route=='districts.index'|| $active_route=='sectors.index') active @endif"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-map-marker"></i><span>Locations</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('provinces.index') }}">Provinces</a></li>
                        <li><a href="{{ route('districts.index') }}">Districts</a></li>
                        <li><a href="{{ route('sectors.index') }}">Sectors</a></li>

                    </ul>
                </li>

                <li class="dropdown @if ($active_route=='roles.index' || $active_route=='users.index') active @endif"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-key"></i><span>Security</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('roles.index') }}">Roles Management</a></li>
                        <li><a href="{{ route('users.index') }}">Users</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->