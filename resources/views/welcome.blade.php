<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
        <link href="{{url()}}/bootstrap/css/bootstrap.min.css" />
        <script  type="text/javascript" src="{{url()}}/bootstrap/js/jquery-1.11.3.min.js"></script>
        <script  type="text/javascript" src="{{url()}}/public/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <button class="prueba"> dar</button>
        
        
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>


<script type="text/javascript">

$(document).ready(function (){
    
    $('.prueba').click(function (){
        alert("todo ok");
        
    });
});



</script>
    </body>
</html>
