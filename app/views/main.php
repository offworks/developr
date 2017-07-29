<html>
<head>
    <script type="text/javascript" src="/node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/node_modules/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="http://designmodo.github.io/Flat-UI/dist/css/flat-ui.css" />
    <script src="https://unpkg.com/vue"></script>
    <style type="text/css">
        .btn {
            cursor: pointer;
        }

    </style>
</head>
<body>
<div class="container">
    <div id="app">
    </div>
</div>
</body>
<script type="application/javascript">
    var app = new Vue({
        el: "#app",
        data: {
            message: "Hello"
        }
    });
</script>
</html>