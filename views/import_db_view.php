<H2>IMPORT DATA TO DB</H2>
<?php


//            if($result)
//            {
//                echo '<h1>КНИГА ДОБАВЛЕНА</h1>';
//            }
//    echo 'add_data===<pre>';
//    print_r($add_data2);
//    echo '</pre>';
 ?>

<div class="inner_form">
    <?php
        if($result=1)
        {
            echo '<div class="info_message">Data import completed successfully</div>';
        }
        else
        {
            echo '<div class="info_message">Data import failed. Please try again</div>';
        }
    ?>

    <div class="clear"></div>
    <a class="submit_button" href="/index.php">To the list of books</a>
</div>

