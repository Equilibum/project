<!DOCTYPE html>
<html>
<head lang="en">
    <link href="/css.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
    include "connect.php";


    $query = mysql_query('SELECT * FROM picture');
    while($sql = mysql_fetch_assoc($query)){
        echo '
         <div class="show">
            <div class="showup">',$sql['title'],'</div>
            <div class="showdown">',$sql['text'],'
            <img src="http://arena-rating.com/uploads/',$sql['url'],'">
            </div>
          </div>
        ';
    }
?>
</body>
</html>
