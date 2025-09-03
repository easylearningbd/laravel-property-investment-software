<header class="header">
<div class="logo-container">
    <a href="../4.3.0" class="logo">
        <img src="{{ asset('backend/img/logo.png') }}" width="75" height="35" alt="Porto Admin" />
    </a>

    <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
        <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
    </div>

</div>

<!-- start: search & user box -->
<div class="header-right">

    <form action="pages-search-results.html" class="search nav-form">
        <div class="input-group">
            <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
            <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
        </div>
    </form>

    <span class="separator"></span>

    <ul class="notifications">
         
        <li>
            <a href="#" class="dropdown-toggle notification-icon" data-bs-toggle="dropdown">
                <i class="bx bx-bell"></i>
                <span class="badge">3</span>
            </a>

            <div class="dropdown-menu notification-menu">
                <div class="notification-title">
                    <span class="float-end badge badge-default">3</span>
                    Alerts
                </div>

                <div class="content">
                    <ul>
                        <li>
                            <a href="#" class="clearfix">
                                <div class="image">
                                    <i class="fas fa-thumbs-down bg-danger text-light"></i>
                                </div>
                                <span class="title">Server is Down!</span>
                                <span class="message">Just now</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="clearfix">
                                <div class="image">
                                    <i class="bx bx-lock bg-warning text-light"></i>
                                </div>
                                <span class="title">User Locked</span>
                                <span class="message">15 minutes ago</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="clearfix">
                                <div class="image">
                                    <i class="fas fa-signal bg-success text-light"></i>
                                </div>
                                <span class="title">Connection Restaured</span>
                                <span class="message">10/10/2023</span>
                            </a>
                        </li>
                    </ul>

                    <hr />

                    <div class="text-end">
                        <a href="#" class="view-more">View All</a>
                    </div>
                </div>
            </div>
        </li>
    </ul>

    <span class="separator"></span>

    @php 
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id); 
    @endphp

    <div id="userbox" class="userbox">
        <a href="#" data-bs-toggle="dropdown">
            <figure class="profile-picture">
                <img src="{{ (!empty($profileData->photo)) ? url('upload/profile_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
            </figure>
            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                <span class="name">{{ $profileData->name }}</span>
                <span class="role">{{ $profileData->email }}</span>
            </div>

            <i class="fa custom-caret"></i>
        </a>

        <div class="dropdown-menu">
            <ul class="list-unstyled mb-2">
                <li class="divider"></li>
                <li>
                    <a role="menuitem" tabindex="-1" href="{{ route('admin.profile') }}"><i class="bx bx-user-circle"></i> My Profile</a>
                </li>
                <li>
                    <a role="menuitem" tabindex="-1" href="{{ route('admin.change.password') }}"><i class="bx bx-lock"></i> Change Password</a>
                </li>
                <li>
                    <a role="menuitem" tabindex="-1" href="{{ route('admin.logout') }}"><i class="bx bx-power-off"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end: search & user box -->
</header>