<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CouncilCast: Digital Voting System | Admin</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">  
  
  <style>
    
  </style>
</head>

<body>
  <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/dark-logo2.png') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <!-- <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
                </li> -->
                <!-- <li class="sidebar-item">
                <a class="sidebar-link" href="./index.html" aria-expanded="false">
                    <span>
                    <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
                </li> -->
                
                <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('personnel.admin.dashboard') }}" aria-expanded="false">
                    <span>
                    <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
                </li>
                <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('personnels.votes') }}" aria-expanded="false">
                    <span>
                    <i class="ti ti-list-check"></i>
                    </span>
                    <span class="hide-menu">Votes</span>
                </a>
                </li>
                <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Manage</span>
                </li>
                <li class="sidebar-item">
                <a class="sidebar-link active" href="{{ route('election.index') }}" aria-expanded="false">
                    <span>
                    <i class="ti ti-circle-check"></i>
                    </span>
                    <span class="hide-menu">Election</span>
                </a>
                </li>
                <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('personnels.voters') }}" aria-expanded="false">
                    <span>
                    <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Voters</span>
                </a>
                </li>
                <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('personnels.candidates') }}" aria-expanded="false">
                    <span>
                    <i class="ti ti-user-check"></i>
                    </span>
                    <span class="hide-menu">Candidates</span>
                </a>
                </li>
                
                <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('personnels.index') }}" aria-expanded="false">
                    <span>
                    <i class="ti ti-user-circle"></i>
                    </span>
                    <span class="hide-menu">Personnels</span>
                </a>
                </li>
                <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Others</span>
                </li>
                <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('personnels.reports') }}" aria-expanded="false">
                    <span>
                    <i class="ti ti-report-analytics"></i>
                    </span>
                    <span class="hide-menu">Reports</span>
                </a>
                </li>
                <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('personnels.about') }}" aria-expanded="false">
                    <span>
                    <i class="ti ti-info-circle"></i>
                    </span>
                    <span class="hide-menu">About</span>
                </a>
                </li>
            </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
                </li>
                <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">System / Election</span>
                </li>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                @include('admin.profile')
            </div>
            </nav>
        </header>
        <!--  Header End -->

        <div class="container-fluid" style="max-width: 100% !important;">
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <h5 class="card-title fw-semibold me-3"><i class="ti ti-user"></i> Create Election</h5>
                            <a href="{{ route('election.index') }}">← Back</a>
                        </div>
                    </div>
                    <br>
                    <!-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif -->
                     
                    <form action="{{ route('admin.election.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group ">
                                    <strong>Election Title:</strong>
                                    <input type="text" name="electionTitle" class="form-control" placeholder="Title" required>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>School Year:</strong>
                                    <input type="number" name="schoolyear" class="form-control" placeholder="Year" required>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Department:</strong>
                                    <select name="department" class="form-control">
                                        <option>Select ...</option>
                                        <option value="BED">Basic Education Department</option>
                                        <option value="HED">Higher Education Department</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Start Date:</strong>
                                    <input class="form-control" type="date" id="startDate" name="startDate" required/>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>End Date:</strong>
                                    <input class="form-control" type="date" id="endDate" name="endDate" required/>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-xs-12 col-sm-6 col-md-6" hidden>
                                <div class="form-group">
                                    <strong>Status:</strong>
                                    <select name="status" class="form-control">
                                        <option value="Active">Active</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-xs-12 col-sm-6 col-md-6" hidden>
                                <div class="form-group">
                                    <strong>Logged In Admin</strong>
                                    <select name="personnelid" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.scripts')
</body>
</html>