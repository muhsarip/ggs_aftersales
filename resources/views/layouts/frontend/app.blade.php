<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @yield('title') - Aftersales Good Gaming Shop
    </title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- SWAL --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.js"></script>


    {{-- HELPER --}}
    <script src="/js/helper.js"></script>

    {{-- LOADER --}}
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>

    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    {{-- SWAL --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
    </style>
    @yield('source')
</head>


<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div>
            <div style="width: 50px;height:50px;float:left"><img src="/images/logo-ggs.png" class="img-fluid" alt="">
            </div>
        </div>
        <a class="navbar-brand" href="{{url('/')}}">

            <div class="ml-2">Good
                Gaming Shop</div>
            <div class="clear"></div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('warranty')}}">Warranty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('service')}}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('status')}}">Check Status</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" style="margin-top:30px;min-height:600px;">
        @yield('content')
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <div style="width: 100px;height:100px" class="mb-5 mx-auto">
            <img src="/images/logo-ggs.png" class="img-fluid" alt="">
        </div>
        2021 {{config('app.name')}} - <a href="https://goodgamingshop.com">Good Gaming Shop</a>
    </div>
    @yield('script')




    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Post file
        $(".uploader").on("change",function(){
            let id = $(this).attr("id").replace('-elem','')
            let elemId = "#"+id
            let urlUpload = "/file/upload"
            var fd = new FormData();
            var files = $(elemId+"-elem")[0].files;
            
            // Check file selected or not
            if(files.length > 0 ){
                $.LoadingOverlay("show");
                fd.append('file',files[0]);
                fd.append('_token','{{ csrf_token() }}')

                $.ajax({
                    url: urlUpload,
                    type: 'post',
                    data: fd,
                    dataType:"json",
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $.LoadingOverlay("hide");

                        let fileName  = response.fileName

                        // Fill input
                        $(elemId).val(fileName)
                        
                        $("."+id+"-preview").addClass("d-none");
                        if(helper.isImage(fileName)){
                            $(elemId+"-preview-image").attr("src",helper.getStorageUrl(fileName))
                                .removeClass("d-none"); 
                        }else{
                            $(elemId+"-preview-file").attr("href",helper.getStorageUrl(fileName)); 
                            $(elemId+"-preview-file")
                                .text("Open file in new tab")
                                .removeClass("d-none"); 
                        }   
                    },
                    error: function (data, textStatus, jqXHR) { 
                        $.LoadingOverlay("hide");
                        let res = JSON.parse(data.responseText)

                        let errorDisplay = res.message+". "

                        let errors = res.errors
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errors[key].map(item=>{
                                    errorDisplay+=item
                                })
                            }
                        }

                        Swal.fire({
                            icon: 'error',
                            text: errorDisplay,
                        })
                        
                    }
                });
            }else{
            alert("Please select a file.");
            }
        });
    </script>
</body>

</html>