<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <div class="hamburger">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Branding Image -->
            @include('spark::nav.brand')
        </div>

        <div class="collapse navbar-collapse" id="spark-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @includeIf('react-spark::nav.user-left')
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @includeIf('react-spark::nav.user-right')

                <!-- Notifications -->
                <li>

                    <notifications-modal />

                </li>

                <li class="dropdown">
                    <!-- User Photo / Name -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                        <react-spark-profile-image></react-spark-profile-image>

                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <!-- Impersonation -->
                        @if (session('spark:impersonator'))
                            <li class="dropdown-header">Impersonation</li>

                            <!-- Stop Impersonating -->
                            <li>
                                <a href="/spark/kiosk/users/stop-impersonating">
                                    <i class="fa fa-fw fa-btn fa-user-secret"></i>Back To My Account
                                </a>
                            </li>

                            <li class="divider"></li>
                        @endif

                        <!-- Developer -->
                        @if (Spark::developer(Auth::user()->email))
                            @include('spark::nav.developer')
                        @endif

                        <!-- Subscription Reminders -->
                        @include('spark::nav.subscriptions')

                        <!-- Settings -->
                        <li class="dropdown-header">Settings</li>

                        <!-- Your Settings -->
                        <li>
                            <a href="/settings">
                                <i class="fa fa-fw fa-btn fa-cog"></i>Your Settings
                            </a>
                        </li>

                        @if (Spark::usesTeams())

                        <li class="divider"></li>

                        <!-- Teams -->
                        <li class="dropdown-header">Teams</li>

                        <!-- Create Team -->
                        <li>
                            <a href="/settings#/teams">
                                <i class="fa fa-fw fa-btn fa-plus"></i>Create Team
                            </a>
                        </li>

                        <!-- Switch Current Team -->
                        @foreach (Auth::user()->teams as $team)
                        <li>
                            <a href="/teams/{{ $team->id }}/switch">
                                @if (Auth::user()->currentTeam->id == $team->id)
                                <span>
                                    <i class="fa fa-fw fa-btn fa-check text-success"></i>{{ $team->name }}
                                </span>
                                @else
                                <span>
                                    <img src="{{ $team->photo_url }}" class="spark-team-photo-xs"><i class="fa fa-btn"></i>{{ $team->name }}
                                </span>
                                @endif
                            </a>
                        </li>
                        @endforeach
                        @endif

                        <li class="divider"></li>

                        <!-- Support -->
                        <li class="dropdown-header">Support</li>

                        <li>
                            <a href="/settings/emailSupport">
                                <i class="fa fa-fw fa-btn fa-paper-plane"></i>Email Us
                            </a>
                        </li>

                        <li class="divider"></li>

                        <!-- Logout -->
                        <li>
                            <a href="/logout">
                                <i class="fa fa-fw fa-btn fa-sign-out"></i>Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
