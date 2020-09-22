<H2>FILTERING BOOKS</H2>
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
        if($add_data>0)
        {
            echo '<div class="info_message">according to your request found '.$add_data.' records</div>';
        }
        else
        {
            echo '<div class="info_message">no records found matching your request</div>';
        }
        if (is_array($data))
        {
            echo '<div class="book_list">';
                    foreach ($data as $item)
                    {
                        echo '<div class="one_book">'
                            . '<div class="one_field">'
                                . '<div class="field_name">Name: </div>'
                                . '<div class="field_value">'.$item['title_b'].'</div>'
                            . '</div>'
                            . '<div class="one_field">'
                                . '<div class="field_name">Price: </div>'
                                . '<div class="field_value">'.$item['price'].' руб.</div>'
                            . '</div>'
                            . '<div class="one_field">'
                                . '<div class="field_name">Number of pages: </div>'
                                . '<div class="field_value">'.$item['page_count'].' стр.</div>'
                            . '</div>'
                            . '<div class="one_field">'
                                . '<div class="field_name">Author: </div>'
                                . '<div class="field_value">'.$item['name'].' '.$item['surname'].'</div>'
                            . '</div>'
                            . '<div class="one_field">'
                                . '<div class="field_name">Genre: </div>'
                                . '<div class="field_value">'.$item['title'].'</div>'
                            . '</div>'
                            . '<a class="submit_button" href="/index.php/editBook.php/?id='.$item['id'].'">Edit book</a>'
                            . '<a class="submit_button" href="/index.php/deleteBook.php/?id='.$item['id'].'">Delete book</a>'
                        . '</div>';
                    }
                echo '</div>';
        }
    ?>

    <div class="clear"></div>
    <a class="submit_button" href="/index.php">To the list of books</a>
</div>

