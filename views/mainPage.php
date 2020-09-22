<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Book catalog</title>
        <link rel="stylesheet" type="text/css" href="/css/styles.css" />
</head>
<body>
    <div class="header">
        <h1><a href="/index.php">Book catalog</a></h1>
        <div class="top_menu">
            <a class="menu_item" href="/index.php/listAuthors.php">Authors</a>
            <a class="menu_item" href="/index.php/listTypes.php">Types</a>
            <a class="menu_item" href="/index.php/importDB.php">Import data into DB</a>
        </div>
    </div>
   
    <div class="content_part">
	<?php 
            include 'views/'.$content_view; 
        ?>
    </div>
    <div class="footer">
        <div class="copyright">@2020. Drozdova Katerina</div>
    </div>
</body>
</html>
