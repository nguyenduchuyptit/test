<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="admin_asset/images/icon.png">
    <title>Eshop - Admin</title>
    <base href=" {{ asset('') }}">
    @yield('chart')
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin_asset/dist/css/style-custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   {{-- fly --}}
    {{-- <script src="js/jquery.minaddc.js?v=b3f817f2"></script>
    <script type="text/javascript" var_1="true" var_2="false" var_3="false" src="js/flies-obj.js"></script> --}}
    {{-- end fly --}}
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.layouts.navbar');

        {{-- #page-content --}}
        @yield('content')
        {{-- end content --}}
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_asset/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/vendor/metisMenu/metisMenu.min.js"></script>
    
    {{-- Ckeditor --}}
    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
    
    @yield('script')
    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>
    
</body>

</html>
