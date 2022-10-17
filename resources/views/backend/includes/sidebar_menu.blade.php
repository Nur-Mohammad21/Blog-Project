<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>
        <li>
            <a href="{{ route('dashboard') }}" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-title">Apps</li>
        <!--<li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-store"></i>
                <span>Section Module</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('section.index') }}">Sections</a></li>
            </ul>
        </li>-->
        <li>
            <a href="{{ route('section.index') }}" class="waves-effect">
                <i class="bx bx-store"></i>
                <span>Sections Module</span>
            </a>
        </li>
        <li>
            <a href="{{ route('category.index') }}" class="waves-effect">
                <i class="fa fa-list-alt"></i>
                <span>Categories Module</span>
            </a>
        </li>
        <li>
            <a href="{{ route('post.index') }}" class="waves-effect">
                <i class="fas fa-sticky-note"></i>
                <span>Posts Module</span>
            </a>
        </li>
        <li>
            <a href="{{ route('member.index') }}" class="waves-effect">
                <i class="fas fa-users"></i>
                <span>Members Module</span>
            </a>
        </li>
        <li>
            <a href="{{ route('sliders.index') }}" class="waves-effect">
                <i class="fas fa-sliders-h"></i>
                <span>Sliders Module</span>
            </a>
        </li>
    </ul>
</div>
