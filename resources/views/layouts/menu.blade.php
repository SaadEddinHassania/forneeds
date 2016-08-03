<li class="{!! Request::is('home*') ? 'active' : '' !!}">
    <a href="{!! url('/home') !!}" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">Home</span>
    </a>
</li><li class="{!! Request::is('users*') ? 'active' : '' !!}">
    <a class="nav-link nav-toggle" href="{!! route('users.index') !!}">
    <i class="fa fa-edit"></i>
    <span  class="title">Users</span></a>
</li>

