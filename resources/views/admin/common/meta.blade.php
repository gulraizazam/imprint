<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Admin Panel | </title>
{{--{{ $pageTitle }}--}}
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="Imprint" content="">
  <!-- Bootstrap 3.3.6 -->
  <link href="{!! asset('admin/bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href="{!! asset('admin/bootstrap/css/styles.css') !!} " media="all" rel="stylesheet" type="text/css" />
  <link href="{!! asset('admin/css/dropzone.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href="{!! asset('admin/css/custom.ilyas.css') !!}" media="all" rel="stylesheet" type="text/css" />
  {{--fancybox--}}

  <link href="{!! asset('admin/css/jquery.fancybox.min.css') !!}" media="all" rel="stylesheet" type="text/css" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />

  <!-- Select2 -->
  <link rel="stylesheet" href="{!! asset('admin/plugins/select2/select2.min.css') !!} ">

    <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{!! asset('admin/plugins/colorpicker/bootstrap-colorpicker.min.css') !!} ">
    <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{!! asset('admin/plugins/timepicker/bootstrap-timepicker.min.css') !!} ">
  <!-- Ionicons -->
  <link href="{!! asset('admin/css/ionicons.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href="{!! asset('admin/css/image-picker.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <!-- daterange picker -->
  <link rel="stylesheet" href="{!! asset('admin/plugins/daterangepicker/daterangepicker-bs3.css') !!} ">
   <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{!! asset('admin/plugins/datepicker/datepicker3.css') !!} ">
  <!-- jvectormap -->
  <link href="{!! asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!} " media="all" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="{!! asset('admin/dist/css/AdminLTE.min.css')  !!} " media="all" rel="stylesheet" type="text/css" />
  
  <link href="{!! asset('admin/dist/css/skins/_all-skins.min.css') !!} " media="all" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="{!! asset('admin/plugins/iCheck/all.css')  !!} " media="all" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
      window.csrf_token = "{{ csrf_token() }}"
    </script>

  <!-- Ionicons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" media="all" rel="stylesheet" type="text/css" />


</head>
<style>
.dragable-box-cursor img{
  cursor: move;
}

</style>
