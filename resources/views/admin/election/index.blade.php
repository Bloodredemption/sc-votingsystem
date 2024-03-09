<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CouncilCast: Digital Voting System | Admin</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
  
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
        <a class="btn btn-success" href="{{ route('admin.election.create') }}"> + Create New Election</a>
        <br>
        <br>

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col d-flex align-items-center">
                <h5 class="card-title fw-semibold me-3">Election List</h5>
                </div>
            </div>
            <br>
            <table class="table table-bordered">
              <tr>
                  <th>Title</th>
                  <th>School Year</th>
                  <th>Department</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <!-- <th>Created At</th> -->
                  <!-- <th>Updated At</th> -->
                  <th width="280px">Action</th>
              </tr>
              @foreach ($elections as $election)
                 <tr>
                    <td>{{ $election->electionTitle }}</td>
                    <td>{{ $election->schoolYear }}</td>
                    <td>{{ $election->department }}</td>
                    <td>{{ $election->startDate }}</td>
                    <td>{{ $election->endDate }}</td>
                    <td>
                      @if ($election->status === "Inactive")
                          <span class="text-danger">
                              Inactive
                          </span>
                      @elseif ($election->status === "Active")
                          <span class="text-success">
                              Active
                          </span>
                      @endif
                    </td>
                    <!-- <td>{{ $election->created_at }}</td>
                    <td>{{ $election->updated_at }}</td> -->
                    <td>
                      <form action="" method="POST">
                          <a class="btn btn-info" href="#">Show</a>
                          <a class="btn btn-primary" href="">Edit</a>
                          <button id="delete-btn" type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                </tr>
              @endforeach
            </table>       
            <div class="d-flex justify-content-center flex-wrap">
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col d-flex align-items-center">
                <h5 class="card-title fw-semibold me-3">Archived Election List</h5>
                </div>
            </div>
            <br>
            <table class="table table-bordered">
              <tr>
                  <th>Title</th>
                  <th>School Year</th>
                  <th>Department</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th width="280px">Action</th>
              </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
            </table>       
            <div class="d-flex justify-content-center flex-wrap">
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  @include('admin.scripts')
</body>

</html>