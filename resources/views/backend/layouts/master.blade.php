<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tunz || Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/register/images/logo-15.png">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
{{--    <link rel="stylesheet" href="/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/backend/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/backend/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/backend/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

{{--    //datepicker--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{--    //morris.char--}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <style>
        #preview img{
            margin: 10px;
        }
        .cake{
            background-color: #e23e3e !important;
            color: white !important;
        }
        .activezz{
            background-color: #717171 !important;
            color: white !important;
        }
        #timedate {
            font: small-caps lighter 25px/150% "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
            text-align:left;
            /*width: 50%;*/
            /*margin: 40px auto;*/
            color:black;
            padding: 0px;
            margin-bottom: 5px;
        }
        #timedate a {
            padding-left: 5px;
        }
    </style>


    @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed" onLoad="initClock()">
<div class="wrapper">

    <!-- Navbar -->
    @include('backend.includes.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('backend.includes.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content-header')

        <!-- /.content-header -->

        <!-- Main content -->
        @yield('content')

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('backend.includes.footer')
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="/backend/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/backend/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/backend/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/backend/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/backend/plugins/moment/moment.min.js"></script>
<script src="/backend/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/backend/dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

{{--//datepicker--}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{--//morris.char--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
    function previewImages() {

        var preview = document.querySelector('#preview');

        if (this.files) {
            [].forEach.call(this.files, readAndPreview);
        }

        function readAndPreview(file) {

            // Make sure `file.name` matches our extensions criteria
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } // else...

            var reader = new FileReader();

            reader.addEventListener("load", function() {
                var image = new Image();
                image.height = 100;
                image.title  = file.name;
                image.src    = this.result;
                preview.appendChild(image);
            });

            reader.readAsDataURL(file);

        }

    }

    document.querySelector('#file-input').addEventListener("change", previewImages);
</script>
<script>
    $(function (){
        $('#datepicker').datepicker({
            prevText:"Th??ng tr?????c",
            nextText:"Th??ng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin: ["Th??? 2","Th??? 3","Th??? 4","Th??? 5","Th??? 6","Th??? 7","Ch??? nh???t"],
            duration: "slow",
        });
        $('#datepicker2').datepicker({
            prevText:"Th??ng tr?????c",
            nextText:"Th??ng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin: ["Th??? 2","Th??? 3","Th??? 4","Th??? 5","Th??? 6","Th??? 7","Ch??? nh???t"],
            duration: "slow",
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    $(document).ready(function (){
        chart30daysorder();
        var char = new Morris.Area({
            element: 'myfirstchart',
            lineColors:['#819C79','#fc8710','#FF6541','#A4ADD3','#766856'],
            pointFillColors:['#FFFFFF'],
            pointStrokeColors:['black'],
             fillOpacity:0.6,
            hideHover:'auto',
            parseTime:'false',
            xkey:'period',
            ykeys:['order','sales','profit','quantity'],
            behaveLikeLine:true,
            labels:['????n h??ng','Doanh s???','L???i nhu???n','s??? l?????ng']
        });
        function chart30daysorder(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/admin/days-order')}}",
                method:"POST",
                dataType:"JSON",
                data:{_token:_token},
                success:function(data){
                    char.setData(data);
                },
                // error: function (){
                //     swal("C???nh b??o!", "Kh??ng c?? d??? li???u !", "error");
                // }
            });
        }

        $('.dashboard-filter').change(function (){
            var dashboard_value = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/admin/select-filter')}}",
                method:"POST",
                dataType:"JSON",
                data:{dashboard_value:dashboard_value,_token:_token},
                success:function (data){
                    char.setData(data);
                },
                error: function (){
                    swal("Xin L???i !", "Kh??ng c?? d??? li???u c???n t??m !", "error");
                }
            });
        });

        $('#btn-dashboard-filter').click(function (){
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            $.ajax({
                url:"{{url('/admin/filter-by-date')}}",
                method:"POST",
                dataType:"JSON",
                data:{from_date:from_date,to_date:to_date,_token:_token},
                success:function(data){
                    char.setData(data);
                },
                error: function (){
                    swal("Xin l???i !", "Kh??ng c?? d??? li???u c???n t??m !", "error");
                }
            });
        });
    });

</script>
<script>
    Number.prototype.pad = function(n) {
        for (var r = this.toString(); r.length < n; r = 0 + r);
        return r;
    };

    function updateClock() {
        var now = new Date();
        var milli = now.getMilliseconds(),
            sec = now.getSeconds(),
            min = now.getMinutes(),
            hou = now.getHours(),
            mo = now.getMonth(),
            dy = now.getDate(),
            yr = now.getFullYear();
        var months = ["Th??ng 1", "Th??ng 2", "Th??ng 3", "Th??ng 4", "Th??ng 5", "Th??ng 6", "Th??ng 7", "Th??ng 8", "Th??ng 9", "Th??ng 10", "Th??ng 11", "Th??ng 12"];
        var tags = ["mon", "d", "y", "h", "m", "s", "mi"],
            corr = [months[mo], dy, yr, hou.pad(2), min.pad(2), sec.pad(2), milli];
        for (var i = 0; i < tags.length; i++)
            document.getElementById(tags[i]).firstChild.nodeValue = corr[i];
    }

    function initClock() {
        updateClock();
        window.setInterval("updateClock()", 1);
    }
</script>


@yield('script')
</body>
</html>
