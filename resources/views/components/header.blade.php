<!--*******************
        Preloader start
    ********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
        Preloader end
    ********************-->


<!--**********************************
            Nav header start
        ***********************************-->
<div class="nav-header">
    <div class="brand-logo">
        <a href="index.html">
            <b class="logo-abbr"><img src="images/logo.png" alt="" /> </b>
            <span class="logo-compact"><img src="./images/logo-compact.png" alt="" /></span>
            <span class="brand-title">
                <img src="images/logo-text.png" alt="" />
            </span>
        </a>
    </div>
</div>
<!--**********************************
            Nav header end
        ***********************************-->
<!--**********************************
            Header start
        ***********************************-->
<div class="header">
    <div class="header-content clearfix">
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="images/user/1.png" height="40" width="40" alt="" />
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                <li>
                                    <a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<!--**********************************
            Sidebar start
        ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li>
                <a href="dashboard" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="all-doc" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">All DOC</span>
                </a>
            </li>

            {{-- <li class="">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">DOC</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-doc">All DOC</a></li>
                </ul>
            </li> --}}

            <li class="">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Chicken</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-chicken">All Chicken (House Wise)</a></li>
                    <li><a href="daily-chicken">Daily Chicken</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i>
                    <span class="nav-text">Feed</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-feed">All Feed (House)</a></li>
                    <li>
                        <a href="feed-restock">Feed Restock</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Medicine/Vaccine</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="allMedicine.html">All Medicine (House)</a></li>
                    <li>
                        <a href="medicineDistribution.html">All Medicine Distribution</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-graph menu-icon"></i>
                    <span class="nav-text">Sales</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="allSale.html">All Sales (House)</a></li>
                    <li><a href="dailySale.html">Daily Sales Data</a></li>
                </ul>
            </li>
            <li>
                <a href="allExpense.html" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Expenses</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Core HR</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="active-employee">Active Employee</a></li>
                    {{-- <li><a href="addEmployee.html">Add Employee</a></li> --}}
                    <li><a href="all-leave">Leave Request</a></li>
                    <li><a href="payroll.html">Payroll</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Report</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="feedReport.html">Feed Report</a></li>
                    <li>
                        <a href="chickenStockReport.html">Chicken Stock Report</a>
                    </li>
                    <li><a href="salesReport.html">Sales Report</a></li>
                    <li><a href="leaveReport.html">Employee Leave Report</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-menu menu-icon"></i><span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="flock" aria-expanded="false">Flocks</a>
                    </li>
                    <li>
                        <a href="farm" aria-expanded="false">Farms</a>
                    </li>
                    <li>
                        <a href="house" aria-expanded="false">Houses</a>
                    </li>
                    <li>
                        <a href="expense-type" aria-expanded="false">Expense Types</a>
                    </li>
                    <li>
                        <a href="expense-sector" aria-expanded="false">Expense Sectors</a>
                    </li>
                    <li>
                        <a href="bonus-type" aria-expanded="false">Bonus Types</a>
                    </li>
                    <li>
                        <a href="designation" aria-expanded="false">Designations</a>
                    </li>

                    <li>
                        <a href="users" aria-expanded="false">User</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
