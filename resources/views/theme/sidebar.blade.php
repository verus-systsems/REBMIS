<div class="navbar-default sidebar" role="navigation">

    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu">

            <li class="sidebar-search">

                <div class="input-group custom-search-form">

                    <input type="text" class="form-control" placeholder="Search...">

                    <span class="input-group-btn">

                    <button class="btn btn-default" type="button">

                        <i class="fa fa-search"></i>

                    </button>

                </span>

                </div>

                <!-- /input-group -->

            </li>

            <li>

                <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>

            </li>

            <li>

                <a href="#"><i class="fa fa-question-circle-o fa-fw"></i> Attempt Quiz</a>

            </li>

            <li>

                <a href="#"><i class="fa fa-certificate fa-fw"></i> Results</a>

            </li>

            <li>

                <a href="#"><i class="fa fa-map-marker fa-fw"></i> Administrative Locations<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                        <a href="{{ route('provinces.index') }}">Provinces</a>

                    </li>
                    <li>

                        <a href="{{ route('districts.index') }}">Districts</a>

                    </li>

                    <li>

                        <a href="{{ route('sectors.index') }}">Sectors</a>

                    </li>

                </ul>


            </li>

            <li>

                <a href="{{ route('schools.index') }}"><i class="fa fa-institution fa-fw"></i> Schools</a>

            </li>



            <li>

                <a href="#"><i class="fa fa-graduation-cap fa-fw"></i> Academics<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                        <a href="{{ route('semesters.index') }}">Semesters</a>

                    </li>

                    <li>

                        <a href="{{ route('grades.index') }}">Grades</a>

                    </li>
                    <li>

                        <a href="{{ route('subjects.index') }}">Subjects</a>

                    </li>
                    <li>

                        <a href="{{ route('units.index') }}">Units</a>

                    </li>

                    <li>

                        <a href="{{ route('topics.index') }}">Topics/Content</a>

                    </li>

                </ul>


            </li>

            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Questions<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('questiondatabanks.index') }}">Question Databank</a>
                            </li>

                            <li>
                                <a href="#">Quizz Configuration<span class="fa arrow"></span></a>

                                <ul class="nav nav-third-level">
                                    <li><a href="{{ route('questions.index') }}">Questions</a></li>

                                    <li><a href="{{ route('quizzes.index') }}">Quizzes</a></li>

                                </ul>
                            </li>



                </ul>
            </li>




            <li>

                <a href="#"><i class="fa fa-key fa-fw"></i> Security<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                        <a href="{{ route('roles.index') }}">Roles Management</a>

                    </li>
                    <li>

                        <a href="{{ route('users.index') }}">Users Management</a>

                    </li>

                </ul>


            </li>


            <!-- /.nav-second-level -->



        </ul>

    </div>

    <!-- /.sidebar-collapse -->

</div>

<!-- /.navbar-static-side -->