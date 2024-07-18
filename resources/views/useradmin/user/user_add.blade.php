@extends('layouts.appuseradmin')
@section('title', 'Add')
@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
    .note-editor.note-airframe .note-editing-area .note-editable, .note-editor.note-frame .note-editing-area .note-editable{
        padding-bottom: 60px;
    }

    .select2-container .select2-selection--single{
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 38px !important;
        user-select: none;
        -webkit-user-select: none;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 26px;
        position: absolute;
        top: 5px;
        right: 10px;
        width: 20px;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[aria-selected]:hover
    {
        background-color: #2a3c8e !important;
    }
</style>
@endsection
@section('content')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: black;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" style="text-align: center;">
      <img width="60" src="">
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
          <li class="nav-item">
            <a href="{{ route('cmsuser') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                User
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

       <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background: white;">
    <!-- /.content-header -->

  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="color: black"></a></li>
                    <li class="breadcrumb-item active" style="color: #a38b0c"></li>
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
                <h1>User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a style="color: black">Dashboard</a></li>
                    <li class="breadcrumb-item active" style="color: #a38b0c">Add User</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

  <!-- Main content -->
  <section class="content">
    <form action="{{ route('cmsuserStore') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="col-sm-12">
        <a href="{{ route('cmsuser') }}" class="btn btn-warning btn-sm" style="margin-bottom: 5px; border-radius: 20px 1px 10px;">
          <i class="fas fa-arrow-circle-left" style="position: relative; right: 3%; top: 1px;"></i>
          back
        </a>
        <div class="card">
          <div class="card-body">
            <div class="row">

              <div class="col-sm-12">
                <label>File ZIP</label><br>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="file_zip" accept=".zip,.rar,.7zip" class="custom-file-input" id="file_zip">
                    <label class="custom-file-label" for="file_zip"></label>
                  </div>
                </div>
              </div>

              <div class="col-sm-12">
                <label>File Excel</label><br>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="file_excel" accept=".xlsx, .xls, .csv" class="custom-file-input" id="file_excel">
                    <label class="custom-file-label" for="file_excel"></label>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Select NPWP</label>
                  <select class="form-control select2" name="users_id" style="width: 100%;">
                    <option selected="selected">Choose NPWP</option>
                    @foreach($user as $u)
                    <option value="{{ $u->id }}">{{ $u->name }} - NPWP : {{ $u->npwp }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-sm-12" style="margin-top: 50px">
                <div class="float-right" >
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </form>

    <!-- ./row -->
  </section>

</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
@endsection

@section('script')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function(){
    $('#file_zip').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

    $('#file_excel').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

});

</script>
@endsection
