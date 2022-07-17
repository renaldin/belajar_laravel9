<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="{{ request()->is('/') ? 'active':'' }}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
    @if (Auth()->user()->level == 1)
        <li class="{{ request()->is('guruAdmin') ? 'active':'' }}"><a href="/guruAdmin"><i class="fa fa-dashboard"></i> <span>Guru</span></a></li>
        <li class="{{ request()->is('siswaAdmin') ? 'active':'' }}"><a href="/siswaAdmin"><i class="fa fa-dashboard"></i> <span>Siswa</span></a></li>
        <li class="{{ request()->is('user') ? 'active':'' }}"><a href="/user"><i class="fa fa-dashboard"></i> <span>User</span></a></li>
    @elseif (Auth()->user()->level == 2)
        <li class="{{ request()->is('siswa') ? 'active':'' }}"><a href="/siswa"><i class="fa fa-dashboard"></i> <span>Siswa</span></a></li>
    @elseif (Auth()->user()->level == 3)
        <li class="{{ request()->is('guru') ? 'active':'' }}"><a href="/guru"><i class="fa fa-dashboard"></i> <span>Guru</span></a></li>
    @endif
</ul>