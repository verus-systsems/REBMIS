<div class="navbar-header">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

    </button>

    <img src="{!! asset('theme/images/reb.jpg') !!}" height="45px" alt="" > <strong>FORMATIVE ASSESSMENT MIS</strong>

</div>

<!-- /.navbar-header -->



<ul class="nav navbar-top-links navbar-right">



    <!-- /.dropdown -->

    <li class="dropdown">

        <a class="dropdown-toggle" data-toggle="dropdown" href="#">

            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>

        </a>

        <ul class="dropdown-menu dropdown-user">

            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>

            </li>

            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>

            </li>

            <li class="divider"></li>

            <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> {{ __('Logout') }}</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>

        <!-- /.dropdown-user -->

    </li>

    <!-- /.dropdown -->

</ul>

<!-- /.navbar-top-links -->