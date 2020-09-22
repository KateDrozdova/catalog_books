<h2>ADD GENRE</h2>
<?php
    if($add_data)
    {
        echo '<div class="message_info" style="color:red">'.$add_data.'</div>';
    }
?>
<form enctype="multipart/form-data" action="addNewTypeForm.php" method="post" class="inner_form">
    <p>Name:</p> <input type="text" name="title" /><br/>
  
     <div class="clear"></div>
    <input class="blue_link" type="submit" value="Add to" />
    <a class="submit_button" href="/index.php/listTypes.php">To the list of genres</a>
</form>       
