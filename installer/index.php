<?php

    if(file_exists('../.private/config.php'))exit;
?>
<html>
<head>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>-->
    <script src="./../_lib/_scripts/jquery.min.js"></script>
    <script src="./../_lib/_scripts/jquery-ui.min.js"></script>
    <script type="text/javascript">    var loc = window.location.pathname;
    var dir = loc.substring(0, loc.lastIndexOf('/'));
    </script>
    <script src="./js.js"></script>
    <link rel="stylesheet" href="./../_lib/_css/admin/admin.css"type="text/css" />
    <title>CMS Setup</title>
</head>
<body>
<div id="header"></div>
<div id="content">please wait...</div>
</body>
</html>