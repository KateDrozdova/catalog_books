<h2>LIST OF GENRES</h2>
        
<?php 
    if (is_array($data))
    {
        echo '<div class="book_list">';
            foreach ($data as $item)
            {
               echo '<div class="one_book">'
                        . '<div class="field_name">Жанр:</div>'
                        .'<div class="field_value">'.$item['title'].'</div>'
                        . '<a class="submit_button" href="/index.php/editType.php/?id='.$item['id'].'">Edit genre</a>'
                        . '<a class="submit_button" href="/index.php/deleteType.php/?id='.$item['id'].'">Delete genre</a>'
                    . '</div>';
            }
        echo '</div>';
    }
    echo '<a class="blue_link" href="/index.php/addNewType.php">Add genre</a>'
?>

