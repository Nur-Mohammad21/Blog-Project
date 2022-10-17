<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>
        <li>
            <a href="{{ route('member.dashboard') }}" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-title">Apps</li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-store"></i>
                <span>Profile</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('member.profile') }}">Update Profile</a></li>
                <li><a href="{{ route('member.password.check') }}">Update Profile Password</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('member.post.index') }}" class="waves-effect">
                <i class="fa fa-pencil-ruler"></i>
                <span>Post Module</span>
            </a>
        </li>
        <li>
            <a href="{{ route('member.comment.index') }}" class="waves-effect">
                <i class="fa fa-comment"></i>
                <span>Comments</span>
            </a>
        </li>
    </ul>
</div>
