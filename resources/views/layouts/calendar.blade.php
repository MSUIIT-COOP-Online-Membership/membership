<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo url('theme')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- FullCalendar CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo url('theme')?>/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo url('theme')?>/dist/css/adminlte.min.css">

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <!-- Preloader -->
 <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('images/npmc-logo-nobg.png') }}" alt="MSUIIT COOP" width="200">
  </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-danger navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="home" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    </div>
                </form>
                </div>
            </li>


    </nav>
    <!-- /.navbar -->
    

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="{{ asset('images/msuiitcoop-logo.png') }}" alt="MSUIIT COOP"
                 class="brand-image img-circle elevation-3"
                 style="opacity: 1; width: 45px; height:45px">
            <span class="brand-text font-weight-light">MSUIIT NMPCOOP</span>
        </a>

        @include('layouts.navigation')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <!-- <footer class="main-footer"> -->
        <!-- To the right -->
        <!-- <div class="float-right d-none d-sm-inline">
            Anything you want
        </div> -->
        <!-- Default to the left -->
        <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. -->
    <!-- </footer> -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo url('theme'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo url('theme'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="<?php echo url('theme'); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo url('theme'); ?>/dist/js/adminlte.min.js"></script>
<!-- FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo url('theme'); ?>/plugins/moment/moment.min.js"></script>
<script src="<?php echo url('theme'); ?>/plugins/fullcalendar/main.js"></script>
<!-- Page specific script -->
<script>
   document.addEventListener('DOMContentLoaded', function () {
   var calendarEl = document.getElementById('calendar');
   var appointments = {!! json_encode($appointments) !!};

   var events = appointments.map(function (appointment) {
      var bgColor = '#3c8dbc'; // Default color

      // Set background color based on appointment status
      if (appointment.status === 'Booked') {
         bgColor = '#f0ad4e'; // Warning color
      } else if (appointment.status === 'Available') {
         bgColor = '#5cb85c'; // Success color
      }

      return {
         title: appointment.subject,
         start: appointment.date + 'T' + appointment.start_time,
         end: appointment.date + 'T' + appointment.end_time,
         backgroundColor: bgColor,
         borderColor: bgColor // Customize as needed
      };
   });

   var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
         left: 'prev,next today',
         center: 'title',
         right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      events: events,
      editable: true,
      droppable: true,
      drop: function (info) {
         if (checkbox.checked) {
            info.draggedEl.parentNode.removeChild(info.draggedEl);
         }
      }
   });

   calendar.render();
});

</script>

<script>
    // Add this script to automatically collapse the sidebar on page load
    document.addEventListener('DOMContentLoaded', function () {
        document.body.classList.add('sidebar-collapse');
    });
</script>

</body>
</html>