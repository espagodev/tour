<header class="main-nav">
    <div class="sidebar-user text-center"><img class="img-90 rounded-circle" src="../assets/images/dashboard/1.png" alt="">
        <a href="#">
          <h6 class="mt-3 f-14 f-w-600">{{ session()->get('user.nombre') }}</h6></a>
        <p class="mb-0 font-roboto">{{ session()->get('user.email') }}</p>
        {{-- <ul>
          <li><span><span class="counter">19.8</span>k</span>
            <p>Follow</p>
          </li>
          <li><span>2 year</span>
            <p>Experince</p>
          </li>
          <li><span><span class="counter">95.2</span>k</span>
            <p>Follower </p>
          </li>
        </ul> --}}
      </div>
    <nav>
        <div class="main-navbar">
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                      </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{ route('dashboard') }}"><i data-feather="home"></i><span>Dashboard</span></a>

                    </li>
                    <li class="sidebar-main-title">
                        <div>
                          <h6>Administrador</h6>
                        </div>
                      </li>
                    
                        <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaAgentes') }}"><i data-feather="users"></i><span>Agentes</span></a></li>

                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getDocumentos') }}"><i data-feather="book"></i><span>Documentos Contables</span></a></li>
                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getImpuestos') }}"><i data-feather="sliders"></i><span>Impuestos</span></a></li>

                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaProveedor') }}"><i data-feather="briefcase"></i><span>Proveedores</span></a></li>

                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaServicios') }}"><i data-feather="box"></i><span>Servicios</span></a></li>
                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaPagos') }}"><i data-feather="box"></i><span>Medios de Pago</span></a></li>

                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaUsuarios') }}"><i data-feather="users"></i><span>Usuarios</span></a></li>
                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaUsuarios') }}"><i data-feather="users"></i><span>Información Importante</span></a></li>


                      <li class="sidebar-main-title">
                        <div>
                          <h6>Contabilidad</h6>
                        </div>
                      </li>
                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaContabilidad') }}"><i data-feather="dollar-sign"></i><span>Contabilidad</span></a></li>
                      <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="list"></i><span>Reportes</span></a>
                        <ul class="nav-submenu menu-content">
                          <li><a href="{{ route('reporte.ventas') }}">Ventas</a></li>
                          <li><a href="{{ route('reporte.movimientos') }}">Movimientos</a></li>
                          <li><a href="{{ route('reporte.ingresos') }}">Ingresos</a></li>
                          <li><a href="{{ route('reporte.gastos') }}">Gastos</a></li>

                          {{-- <li><a href="layout-dark.html">Dark</a></li> --}}

                        </ul>
                      </li>
                      <li class="sidebar-main-title">
                        <div>
                          <h6>Agente             </h6>
                        </div>
                      </li>
                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaAjustes') }}"><i data-feather="crop"></i><span>Ajustes</span></a></li>

                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaAgenda') }}"><i data-feather="book"></i><span>Agenda</span></a></li>



                      <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaPlazos') }}"><i data-feather="bar-chart-2"></i><span>Compra a Plazos</span></a></li>

                  
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaFacturas') }}"><i data-feather="bookmark"></i><span>Facturas</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaReciboCaja') }}"><i data-feather="bookmark"></i><span>Recibo de Caja</span></a></li>


                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaItinerarios') }}"><i data-feather="calendar"></i><span>Itinerarios</span></a></li>
                    
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaGastos') }}"><i data-feather="package"></i><span>Gastos</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('getListaIngresos') }}"><i data-feather="credit-card"></i><span>Ingresos</span></a></li>


                    <li class="sidebar-main-title">
                        <div>
                          <h6>Configuración</h6>
                        </div>
                      </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{ route('setting') }}" ><i data-feather="settings"></i><span>Configuracion</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>