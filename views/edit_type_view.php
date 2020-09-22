<h2> EDIT GENRE</h2>
<?php 
    if($add_data)
    {
        echo '<div class="message_info" style="color:red">'.$add_data.'</div>';
    }
?>
<form enctype="multipart/form-data" action="/index.php/editTypeForm.php" method="post" class="inner_form">
    <?php
        if (is_array($data))
        {
            foreach ($data as $item) 
            {
                echo '<p>Name: </p><input type="text" name="title" value="'.$item['title'].'"/><br/>';
                echo '<input type="hidden" name="type_id" value="'.$item['id'].'" />'; 
            }
        }
    ?>
    <div class="clear"></div>
    <input class="blue_link" type="submit" value="Change" />
    <a class="submit_button" href="/index.php/listTypes.php">To the list of genres</a>
</form>  

