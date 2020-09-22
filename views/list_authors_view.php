<h2>LIST AUTHORS</h2>
        
<?php 
    if (is_array($data))
    {
        echo '<div class="book_list">';
            foreach ($data as $item)
            {
                echo '<div class="one_book author_list">'
                        . '<div class="avatar">'
                            . '<img src="/image/'.$item['avatar'].'" />'
                        . '</div>'
                        . '<div class="info_part">'
                            . '<div class="name">'.$item['name'].'&nbsp;'.$item['surname'].'</div>'
                            . '<div class="clear"></div>'
                            . '<a class="submit_button" target="self" href="/index.php/editAuthor.php/?id='.$item['id'].'">Edit author</a>'
                            . '<a class="submit_button" href="/index.php/deleteAuthor.php/?id='.$item['id'].'">Delete author</a>'
                        . '</div>'
                    . '</div>';
            }
        echo '</div>';
    }
?>

<a class="blue_link" href="/index.php/addNewAuthor.php">Add author</a>

