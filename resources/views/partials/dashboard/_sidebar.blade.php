<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{asset('img/users')}}/{{Auth::user()->avatar}}"
                         alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{Auth()->user()->name}}</p>
                    <p class="designation">
                        @foreach(Auth()->user()->roles as $role)
                            {{$role->name}}
                            @break
                        @endforeach
                    </p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('user.messaging.index')}}">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">Messages</span>
            </a>
        </li>
        @can('is-admin')

            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Basic Content</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.category.index')}}"> Categories </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.pages.index')}}"> Pages </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.articles.index')}}"> Articles </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.news.index')}}"> News </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.posts.index')}}"> Posts </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.media.index')}}"> Media </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">Users & Roles</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.users.index')}}"> Users </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.roles.index')}}"> Roles </a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan
    </ul>
</nav>
