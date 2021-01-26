<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    {{-- plugins header --}}
    @include('plugins.pluginsheader')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <x-app-layout>
        <x-slot name="header"></x-slot>
        <div class="wrapper">
            <!-- Navbar -->
                @include('layout.header')
            <!-- /.navbar -->
    
            <!-- Main Sidebar Container -->
            @include('layout.sidebar')
    
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                  <div class="container-fluid">
                    {{-- header row --}}
                    
                    
                    @yield('page')
    
                    </div>
                    <!-- /.row (main row) -->
                  </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
    
        </div>
    </x-app-layout>
    @include('plugins.plugins')
</body>
</html>