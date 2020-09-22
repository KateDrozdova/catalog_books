<h2> EDIT AUTHOR</h2>
<?php 
    if($add_data)
    {
        echo '<div class="message_info" style="color:red">'.$add_data.'</div>';
    }
?>
<form enctype="multipart/form-data" action="/index.php/editAuthorForm.php" method="post" class="inner_form">
    <?php
        if (is_array($data))
        {
            foreach ($data as $item) 
            {
                echo '<p>Name:</p> <input type="text" name="name" value="'.$item['name'].'"/><br/>';
                echo '<p>Surname:</p> <input type="text" name="surname" value="'.$item['surname'].'"/><br/>'; 
                echo '<input type="hidden" name="author_id" value="'.$item['id'].'" />'; 
            }
        }
    ?>
     
    <div class="clear"></div>
    <input class="blue_link" type="submit" value="Change" />
    <a class="submit_button" href="/index.php/listAuthors.php">To the list of authors</a>
</form>
