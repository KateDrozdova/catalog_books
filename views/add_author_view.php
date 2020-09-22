<h2>ADD AUTHOR</h2> 
<?php
    if($add_data)
    {
        echo '<div class="message_info" style="color:red">'.$add_data.'</div>';
    }
?>

<form enctype="multipart/form-data" action="addNewAuthorForm.php" method="post" class="inner_form">
    <p>Name: </p><input type="text" name="name" /><br/>
    <p>Surname:</p> <input type="text" name="surname" /><br/>
    <p>Avatar:</p> <input type="file" name="logo"><br/>
    <br/>
    <div class="clear"></div>
    <input class="blue_link" type="submit" value="Add to" />
    <a class="submit_button" href="/index.php/listAuthors.php">To the list of authors</a>
</form>       

