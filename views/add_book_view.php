<h2>ADD BOOK</h2>
<?php 
//    if(!$data)
//    {
//        echo '<h1>КНИГА НЕ ДОБАВЛЕНА</h1>';
//    }
//    else
//    {
//         echo '<h1>КНИГА ДОБАВЛЕНА</h1>';
//    }
    if(!empty($add_data2))
    {
        echo '<div class="message_info" style="color:red">'.$add_data2.'</div>';
    }
            
?>
<form enctype="multipart/form-data" action="addNewBookForm.php" method="post" class="inner_form">
    <p>Book Title:</p> <input type="text" name="title_b" /><br/>
    <p>Price:</p> <input type="text" name="price" /><br/>
    <p>Page Count:</p> <input type="text" name="page_count" /><br/>
    <p>Author:</p>
    <select name="authors[]" size="1">
        <?php 
            if (is_array($data))
            {
                foreach ($data as $item) {
                    echo '<option value="'.$item['id'].'">'.$item['name'].'&nbsp;'.$item['surname'].'</option>';
                }
            }
        ?>
    </select><br/>
    <p>Type:</p>
    <?php 
        if (is_array($add_data))
        {
            echo '<div class="checkbox_el">';
            foreach ($add_data as $item) {
                echo '<input type="checkbox" name="type" value="'.$item['id'].'"/>'.$item['title'].'<br/>';
            }
            echo '</div>';
        }
    ?>
    <br/>
    <div class="clear"></div>
    <input class="blue_link" type="submit" value="Add to" />
    <a class="submit_button" href="/index.php">To the list of books</a>
</form>       

