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
              <a class="sidebar-link" href="{{ route('personnels.election') }}" aria-expanded="false">
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
              <a class="sidebar-link active" href="{{ route('personnels.index') }}" aria-expanded="false">
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
              <span class="hide-menu">System / Personnels</span>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            @include('admin.profile')
          </div>
        </nav>
      </header>
      <!--  Header End -->

      <div class="container-fluid">
        <a class="btn btn-success" href="{{ route('admin.personnels.create') }}"> + Create New Personnel</a>
        <br>
        <br>
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col d-flex align-items-center">
                <h5 class="card-title fw-semibold me-3">Admin</h5>
                
                </div>
            </div>
            <br>
            
            <table class="table table-bordered">
              <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Password</th>
                  {{-- <th>Status</th> --}}
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th width="280px">Action</th>
              </tr>
              @foreach ($adminPersonnels as $personnel)
                  @if ($personnel->userType == 'admin')
                      <tr>
                          <td>{{ $personnel->name }}</td>
                          <td>{{ $personnel->username }}</td>
                          <td>{{ $personnel->password }}</td>
                          {{-- <td>
                              @if($personnel->status == 1)
                                  <span class="active">Active</span>
                              @else
                                  <span class="inactive">Inactive</span>
                              @endif
                          </td> --}}
                          <td>{{ $personnel->created_at }}</td>
                          <td>{{ $personnel->updated_at }}</td>
                          <td>
                              <form action="{{ route('personnels.destroy', $personnel->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('personnels.show',$personnel->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('personnels.edit',$personnel->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                {{-- <a class="btn btn-danger" href="#">Delete</a> --}}
                                <button id="delete-btn" type="submit" class="btn btn-danger">Delete</button>
                              </form>
                          </td>
                      </tr>
                  @endif
              @endforeach
            </table>
            <div class="d-flex justify-content-center flex-wrap">
              {{ $adminPersonnels->links('pagination::bootstrap-4') }}
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col d-flex align-items-center">
                <h5 class="card-title fw-semibold me-3">Facilitator</h5>
                {{-- <a class="btn btn-success" href="#"> + Create New Facilitator</a> --}}
                </div>
            </div>
            <br>
            <table class="table table-bordered">
              <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Password</th>
                  {{-- <th>Status</th> --}}
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th width="280px">Action</th>
              </tr>
              @foreach ($facilitatorPersonnels as $personnel)
                  <tr>
                      <td>{{ $personnel->name }}</td>
                      <td>{{ $personnel->username }}</td>
                      <td>{{ $personnel->password }}</td>
                      {{-- <td>
                          @if($personnel->status == 1)
                              <span class="active">Active</span>
                          @else
                              <span class="inactive">Inactive</span>
                          @endif
                      </td> --}}
                      <td>
                        @if ($personnel->created_at)
                            {{ $personnel->created_at->format('M d, Y h:i A') }}
                        @endif
                      </td>
                      <td>
                          @if ($personnel->updated_at)
                              {{ $personnel->updated_at->format('M d, Y h:i A') }}
                          @endif
                      </td>                          
                      <td>
                          <form action="{{ route('personnels.destroy', $personnel->id) }}" method="POST">
                              <a class="btn btn-info" href="#">Show</a>
                              <a class="btn btn-primary" href="{{ route('personnels.edit',$personnel->id) }}">Edit</a>
                              @csrf
                              @method('DELETE')
                              {{-- <a class="btn btn-danger" href="#">Delete</a> --}}
                              <button id="delete-btn" type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
              @endforeach
            </table>       
            <div class="d-flex justify-content-center flex-wrap">
              {{ $facilitatorPersonnels->links('pagination::bootstrap-4') }}
            </div> 
          </div>
        </div>
      </div>

    </div>
  </div>

  {{-- @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
  @endpush --}}

  @include('admin.scripts')
</body>
{{-- @stack('scripts') --}}
</html>