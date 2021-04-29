<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu page-header-fixed page-sidebar-menu-closed page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <br>
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                      <a href="javascript:;" class="remove">
                         <i class="icon-close"></i>
                      </a>
                      <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search...">
                                  <span class="input-group-btn">
                                         <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                 </span>
                    </div>
              </form>                
           </li><br>
            <li class="heading">
                <h3 class="uppercase">Menú Principal</h3>
            </li>

            @foreach($menuAll as $menu)
                @if($posicion == $menu['url'])
                <li class="nav-item active open">
                @else
                <li class="nav-item">
                @endif

                @if($menu['open'] == 1)
                <a href="javascript:;" class="nav-link nav-toggle">
                @else
                <a href="{{ url($menu['url']) }}" class="nav-link nav-toggle">
                @endif
                    <i class="{{ $menu['icono'] }}"></i>
                    <span class="title">{{ $menu['descripcion'] }}</span>

                    @if($menu['open'] == 1)
                    <span class="arrow"></span>
                    @endif
                </a>

                <!-- SUBMENU -->
                @if($menu['open'] == 1)
                <ul class="sub-menu">
                    @foreach($menu['submenu'] as $submenu)
                        @if($posicion == $submenu->url)
                        <li class="nav-item active open">
                        @else
                        <li class="nav-item">
                        @endif
                            <a href="{{ url($submenu->url) }}" class="nav-link ">
                                <span class="title">{{ $submenu->descripcion }}</span>

                                @if($posicion == $submenu->url)
                                <span class="selected"></span>                                
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
                @endif
                <!-- SUBMENU -->

            </li>
            @endforeach
        </ul>
    </div>
</div>