<?php
use Illuminate\Support\Facades\Session;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    <title>SUMAKER | Aplikasi Persuratan</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Morris CSS -->
    <link href="/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="/dist/css/pages/dashboard1.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="/assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!--FORM WIZARD-->
    <link href="/assets/node_modules/wizard/steps.css" rel=
    "stylesheet">
    <!-- toast CSS -->
    <link href="/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- dropify -->
    <link rel="stylesheet" href="/assets/node_modules/dropify/dist/css/dropify.min.css">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <!-- UI USER CARD -->
    <link href="/dist/css/pages/user-card.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-blue fixed-layout">
    
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SUMAKER</p>
        </div>
    </div>
    
    <div id="main-wrapper">
        
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="/assets/images/logo/srtn1.png" width="40px" height="40px" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="/assets/images/logo/srtn2.png" width="40px" height="40px" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <span class="hidden-xs"><span class="font-italic font-bold"> SUMAKER</span></span>
                    </a>
                </div>
                
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                    </ul>

                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="hidden-md-down">@if(Session::get('role')=='ADMIN')
                            Administrator &nbsp;
                            @elseif(Session::get('role')=='LOKET')
                            Loket Informasi &nbsp;
                            @else
                            Seksi &nbsp;
                            @endif
                            <i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                @if(Session::get('role')=='ADMIN')
                                <a href="/admin/{{Session::get('idne')}}/ubahprofil" class="dropdown-item"><i class="ti-user"></i> Profilku</a>
                                @elseif(Session::get('role')=='LOKET')
                                <a href="/loket/{{Session::get('idne')}}/ubahprofil" class="dropdown-item"><i class="ti-user"></i> Profilku</a>    
                                @else
                                <a href="/seksi/{{Session::get('idne')}}/ubahprofil" class="dropdown-item"><i class="ti-user"></i> Profilku</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="/keluar" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </li>
                        
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <!--SIDEBAR-->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        @if(Session::get('role') == 'ADMIN')
                        <li> <a class="waves-effect waves-dark" href="/admin"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        @elseif(Session::get('role') == 'LOKET')
                        <li> <a class="waves-effect waves-dark" href="/loket"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        @else
                        <li> <a class="waves-effect waves-dark" href="/seksi"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        @endif
                        <!--SURAT MASUK-->
                        
                        <li class="nav-small-cap">--- SURAT MASUK</li>
                        @if(Session::get('role') == 'ADMIN' OR Session::get('role') == 'LOKET' )
                        <li> <a class="waves-effect waves-dark" href="/suratmasuk/buat"><i class="ti-save"></i><span class="hide-menu">Buat Surat</span></a>
                        @endif
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/suratmasuk/rekap"><i class="ti-check-box"></i><span class="hide-menu">Monitoring Surat</span></a>
                        <li> <a class="waves-effect waves-dark" href="/suratmasuk/lampiran"><i class="ti-files"></i><span class="hide-menu">Lampiran Surat</span></a>
                        </li>
                        
                        <!--SURAT KELUAR-->
                        @if(Session::get('role') == 'ADMIN' OR Session::get('role') == 'SEKSI')
                        <li class="nav-small-cap">--- SURAT KELUAR</li>
                        <li> <a class="waves-effect waves-dark" href="/suratkeluar/buat"><i class="ti-save"></i><span class="hide-menu">Buat Surat</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/suratkeluar/rekap"><i class="ti-check-box"></i><span class="hide-menu">Monitoring Surat</span></a>
                        <li> <a class="waves-effect waves-dark" href="/suratkeluar/lampiran"><i class="ti-files"></i><span class="hide-menu">Lampiran Surat</span></a>
                        </li>
                        @endif
                        
                        <!--ADMINISTRASI-->
                        <li class="nav-small-cap">--- ADMINISTRASI</li>
                        <li> <a class="waves-effect waves-dark" href="/kantor"><i class="fas fa-building"></i><span class="hide-menu">Instansi/Kantor</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="/counter"><i class="ti-reload"></i><span class="hide-menu">Counter</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#"><i class="ti-na"></i><span class="hide-menu">Coming Soon</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
        <!--CONTENT-->
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">@yield('title')</h4>
                    </div>
                </div>

                    @yield('content')
                
                <!--PANEL KANAN-->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Tema <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>Sidebar Terang</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>Sidebar Gelap</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--FOOTER-->
        <footer class="footer">
            © 2019 SUMAKER by KANGKODING.COM
        </footer>
    </div>
    
    <script src="/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="/assets/node_modules/popper/popper.min.js"></script>
    <script src="/assets/node_modules/bootstrap//dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/dist/js/custom.min.js"></script>
    <script src="/assets/node_modules/moment/moment.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="/assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="/dist/js/dashboard1.js"></script>

    <!-- FORM WIZARD -->
    <script src="/assets/node_modules/wizard/jquery.steps.min.js"></script>
    <script src="/assets/node_modules/wizard/jquery.validate.min.js"></script>
    <script src="/assets/node_modules/sweetalert/sweetalert.min.js"></script>

    <!-- TOASTR -->
    <script src="/assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="/dist/js/pages/toastr.js"></script>
    <!-- jQuery file upload -->
    <script src="/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
    <!-- This is data table -->
    <script src="/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- Magnific popup JavaScript -->
    <script src="/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

    <script>
        $('#datatable-suratmasuk').DataTable({
        dom: 'Bfrtip',
        "scrollX" : true,
        buttons: [
        
        ]
        });

        $('#datatable-suratkeluar').DataTable({
        dom: 'Bfrtip',
        "scrollX" : true,
        buttons: [
        
        ]
        });

        $('#datatable-disposisi').DataTable({
        dom: 'Bfrtip',
        "scrollX" : true,
        buttons: [
        
        ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });

        //Custom design form example
        $(".tab-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Simpan"
            },
            onFinished: function (event, currentIndex) {
                //swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                alert("TES");
            }
        });


        var form = $(".validation-wizard").show();

        $(".validation-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Simpan"
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
            },
            onFinishing: function (event, currentIndex) {
                return form.validate().settings.ignore = ":disabled", form.valid()
            },
            onFinished: function (event, currentIndex) {
                //swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                //alert("TES");
                form.submit();
            }
        }), $(".validation-wizard").validate({
            ignore: "input[type=hidden]",
            errorClass: "text-danger",
            successClass: "text-success",
            highlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            },
            unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element)
            },
            rules: {
                email: {
                    email: !0
                }
            }
        })

        $(document).ready(function(){
            $("#agenda").change(function(){
                sessionStorage.removeItem("coba");
                var jenisSrt = $(this).children("option:selected").val();
                sessionStorage.setItem("tes", jenisSrt);
                hehe(jenisSrt);

                function hehe(id){
                    $.ajax({
                        type:'GET',
                        url:'/suratmasuk/buat/go/getcount/' + id,
                        dataType: 'json',
                        data: { get_param: 'nilai' },
                        success: function(data){
                            //sessionStorage.setItem("coba", data[0]['nilai']);
                            console.log(data[0]['nilai']);
                            $("#nmr_agenda").val(data[0]['nilai']);
                        }
                    });
                }

                $("#jns_surat").val(jenisSrt);
                //console.log(sessionStorage.getItem("coba"));
                //$("#jns_surat").val(jenisSrt);
            });
        });

          <?php
          if(Session::has('success-msg')){
              echo "$.toast({
                    heading: 'Berhasil!',
                    text: '".Session::get('success-msg')."',
                    position: 'bottom-right',
                    loaderBg:'#ff6849',
                    icon: 'success',
                    hideAfter: 3000, 
                    stack: 6
                  });";
          }elseif(Session::has('error-msg')){
              echo "$.toast({
                    heading: 'Kesalahan!',
                    text: '".Session::get('error-msg')."',
                    position: 'bottom-right',
                    loaderBg:'#ff6849',
                    icon: 'error',
                    hideAfter: 3000, 
                    stack: 6
                  });";
          }elseif(Session::has('info-msg')){
              echo "$.toast({
                    heading: 'Informasi!',
                    text: '".Session::get('info-msg')."',
                    position: 'bottom-right',
                    loaderBg:'#ff6849',
                    icon: 'info',
                    hideAfter: 3000, 
                    stack: 6
                  });";
          }elseif(Session::has('warning-msg')){
              echo "$.toast({
                    heading: 'Peringatan!',
                    text: '".Session::get('warning-msg')."',
                    position: 'bottom-right',
                    loaderBg:'#ff6849',
                    icon: 'warning',
                    hideAfter: 3000, 
                    stack: 6
                  });";
          }
          ?>

    </script>
</body>

</html>