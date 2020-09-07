<html>
    <head>
        <title>Ajax Example</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id = 'msg'>This message will be replaced using Ajax. Click the button to replace the message.</div>
        <form>
            <input onclick="getMessage()" type="button" value="Replace Message">
        </form>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
        function getMessage() {
            console.log("clicked");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:'{{ route('getmsg') }}',
                data:'@csrf',
                success:function(data) {
                    $("#msg").html(data.msg);
                }
            });
        }
        </script>
    </body>
</html>