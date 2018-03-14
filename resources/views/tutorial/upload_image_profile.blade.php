<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>Laravel Tutorials</title>
    <!-- Styles -->
    <link href="{{ asset('bootstrap-3.3.6/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row"></div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <center>
                <br/>

                <div style="width:200px;height: 200px;border: 1px solid whitesmoke;text-align: center" id="img1">
                    <img width="100%" height="100%" src="{{url('/assets/img/matches/galleries1.png')}}"/>
                </div>
                <br/>

                <p>
                    <a href="javascript:changeProfile()" style="text-decoration: none;"><i
                                class="glyphicon glyphicon-edit"></i> Change</a>&nbsp;&nbsp;
                    <a href="javascript:removeFile()"
                       style="color: red;text-decoration: none;"><i
                                class="glyphicon glyphicon-trash"></i>
                        Remove</a>
                </p>
                <input type="file" id="file1" style="display: none"/>
            </center>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<!-- JavaScripts -->
<script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('bootstrap-3.3.6/js/bootstrap.min.js') }}"></script>
<script>
    var filename = '';
    function changeProfile() {
        $('#file1').click();
    }
    $('#file1').change(function () {
        if ($(this).val() != '') {
            upload();

        }
    });
    function upload() {
        var file_data = $('#file1').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });
        $('#img1').html('<img src="{{url('/assets/img/matches/galleries2.png')}}" style="padding-top: 40%"/>');
        $.ajax({
            url: "{{url('tutorial/upload-image-profile')}}", // point to server-side PHP script
            data: form_data,
            type: 'POST',
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#img1').html('<img width="100%" height="100%" src="{{asset('/assets/img/matches/galleries2.png')}}"/>');
                    alert(data.errors['file']);
                }
                else {
                    filename = data;
                    $('#img1').html('<img width="100%" height="100%" src="{{asset('uploads')}}/' + data + '"/>');
                }
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
                $('#img1').html('<img width="100%" height="100%" src="{{asset('/assets/img/matches/galleries3.png')}}"/>');
            }
        });
    }
    function removeFile() {
        if (filename != '')
            if (confirm('Are you sure want to remove profile picture?'))
                $.ajax({
                    url: "{{url('tutorial/remove-image-profile')}}/" + filename, // point to server-side PHP script
                    type: 'GET',
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,
                    success: function (data) {
                        $('#img1').html('<img width="100%" height="100%" src="{{asset('images/default.jpg')}}"/>');
                        filename = '';
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
    }
</script>
</body>
</html>