<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <hr><h5>Single file Form</h5>
                <div class="title m-b-md">
                    <form id="singlefile" action="{{ route('test.singlefile') }}" enctype="multipart/form-data" method="POST">
                        <p>
                            <label for="photo">
                                <input type="file" name="photo" id="photo">
                            </label>
                        </p>
                        <button>Upload</button>
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                    </form>
                </div>

                <hr><h5>Multiple file Form</h5>
                <div class="title m-b-md">
                    <form id="multipefile" action="{{ route('test.multiplefile') }}" enctype="multipart/form-data" method="POST">
                        <p>
                            <label for="photo">
                                <input type="file" name="photo[]" multiple="multiple" id="photo">
                            </label>
                        </p>
                        <button>Upload</button>
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                    </form>
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#singlefile").on("submit", function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('test.singlefile') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache : false,
                    processData: false,
                    success: function (data) {
                        alert("Sukses");
                    },
                    complete:function(result){
                        alert(result.responseText);
                    }
                });
            });

            $("#multiplefile").on("submit", function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('test.multiplefile') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache : false,
                    processData: false,
                    success: function (data) {
                        alert("Sukses");
                    },
                    complete:function(result){
                        alert(result.responseText);
                    }
                });
            });
        });
    </script>
</html>
