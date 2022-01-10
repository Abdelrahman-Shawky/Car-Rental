<div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.html">
                            <div class="logo-img">
                               <!-- <img src="{{asset('template/src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite">  -->
                            </div>
                            <span class="text">Car Rental</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel">Navigation</div>
                                <div class="nav-item active">
                                    <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Cars</span></a>
                                    <div class="submenu-content">
                                        <a href="{{url('admin/cars')}}" class="menu-item"><i class="ik ik-list"></i><span>Show Cars</span></a>
                                        <a href="/admin/cars/add" class="menu-item"><i class="ik ik-edit"></i><span>Add Car</span></a>
                                    </div>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Reservations</span></a>
                                    <div class="submenu-content">
                                        <a href="{{url('admin/reservations')}}" class="menu-item"><i class="ik ik-list"></i><span>Show Reservations</span></a>
                                    </div>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Search </span></a>
                                    <div class="submenu-content">
                                        <a href="/admin/search/cars" class="menu-item"><i class="ik ik-list"></i><span>Cars</span></a>
                                        <a href="/admin/search/customers" class="menu-item"><i class="ik ik-list"></i><span>Customers</span></a>
                                        <a href="/admin/search/reservations" class="menu-item"><i class="ik ik-list"></i><span>Reseravtions</span></a>
                                        <a href="/admin/search/availability" class="menu-item"><i class="ik ik-list"></i><span>Availability</span></a>
                                    </div>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Filtered Search</span></a>
                                    <div class="submenu-content">
                                        <a href="/admin/filteredSearch/cars" class="menu-item"><i class="ik ik-list"></i><span>Cars</span></a>
                                    </div>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Reports</span></a>
                                    <div class="submenu-content">
                                        <a href="/admin/reports/periodicReservations" class="menu-item"><i class="ik ik-list"></i><span>Periodic Reservations</span></a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>