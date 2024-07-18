@extends('layouts.appuseradmin')
@section('title', 'Dashboard')
@section('css')
<style>
  .info{
    margin-top: 10px;
  }
</style>
@endsection
@section('content')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: white;">
  <!-- Brand Logo -->
  <a href="https://www.fourbest.co.id/" class="brand-link" style="text-align: center;">
    <img style="width: 100%" src="{{ asset('logo/logo2.png') }}">
  </a>

  <!-- Sidebar -->
  <div class="sidebar" style="background: black;">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-2 pb-2 mb-2 d-flex">
      <div class="info">

        <a href="#" class="d-block" style="text-decoration: none; color: white;"><h5 style="font-family: 'Truculenta', sans-serif;"><b>{{date('l, d - m - Y') }}</b></h5> </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Setting</li>

        @if( Auth::user()->status == 'admin' )
        <li class="nav-item">
          <a href="{{ route('cmsuser') }}" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              User
            </p>
          </a>
        </li>
        @else
        <li class="nav-item">
            <a href="{{ route('cmsnpwp') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Download NPWP
              </p>
            </a>
          </li>
        @endif



      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: white;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chart</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Chart</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-sm-6 col-md-3">
                    @if( Auth::user()->status == 'admin' )
                    <a href="{{ route('cmsuser') }}" style="color:black;">
                        <div class="info-box mb-3">
                            <span class="info-box-icon elevation-1" style="background: #ffffff; color: #41a59c;">
                                <i class="nav-icon far fa-image"></i>
                            </span>


                            <div class="info-box-content">
                                <span class="info-box-text">User</span>
                                <span class="info-box-number">
                                    {{ $file }}
                                </span>
                            </div>

                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    @else
                    <a href="{{ route('cmsnpwp') }}" style="color:black;">
                        <div class="info-box mb-3">
                            <span class="info-box-icon elevation-1" style="background: #ffffff; color: #41a59c;">
                                <i class="nav-icon far fa-image"></i>
                            </span>


                            <div class="info-box-content">
                                <span class="info-box-text">Download NPWP</span>
                                <span class="info-box-number">
                                    {{ $file }}
                                </span>
                            </div>

                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    @endif
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
            </div>
            </a>
            <!-- /.row -->
        </div>
</div>
</div>
</section>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    @endsection

    @section('script')
    <script>

    </script>
    @endsection
