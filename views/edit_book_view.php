<h2>EDIT BOOK:</h2>
<?php 
    if($add_data3)
    {
        echo '<div class="message_info" style="color:red">'.$add_data3.'</div>';
    }
?>
<form enctype="multipart/form-data" action="/index.php/editBookForm.php" method="post" class="inner_form">
    <?php
        if (is_array($data))
        {
            foreach ($data as $item) 
            {
                echo '<p>Book Title:</p> <input type="text" name="title_b" value="'.$item['title_b'].'"/><br/>';
                echo '<p>Price:</p> <input type="text" name="price" value="'.$item['price'].'"/><br/>';
                echo '<p>Page Count:</p> <input type="text" name="page_count" value="'.$item['page_count'].'"/><br/>';
                echo '<p>Author:</p><select name="authors[]" size="1">';
                if (is_array($add_data))
                {
                    foreach ($add_data as $value) 
                    {
                        if($value['id'] == $item['author_id'])
                        {
                            $selected = ' selected';
                        }
                        else
                        {
                            $selected = '';
                        }
                        echo '<option'.$selected.' value="'.$value['id'].'">'.$value['name'].'&nbsp;'.$value['surname'].'</option>';
                    }
                }
                echo '</select></br>';
                echo '<p>Type:</p>';
                if (is_array($add_data2))
                {
                    echo '<div class="checkbox_el">';
                    foreach ($add_data2 as $value2) 
                    {
                        if($value2['id'] == $item['type_id'])
                        {
                            $checked = ' checked=checked';
                        }
                        else
                        {
                            $checked = '';
                        }
                        echo '<input'.$checked.' type="checkbox" name="type" value="'.$value2['id'].'"/>'.$value2['title'].'<br/>';
                    }
                    echo '</div>';
                }
                echo '<input type="hidden" name="book_id" value="'.$item['id'].'" />';   
            }
        }
    ?>
    
    <div class="clear"></div>
    <input class="blue_link" type="submit" value="Change" />
    <a class="submit_button" href="/index.php">To the list of books</a>
</form>  


