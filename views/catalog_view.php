<?php
//            if($result)
//            {
//                echo '<h1>КНИГА ДОБАВЛЕНА</h1>';
//            }
 ?>
<h3>Filter books by:</h3>
<form enctype="multipart/form-data" action="/index.php/filterBooksByAuthors.php" method="post" class="filter_form">
    <p class="filter_title">Author:</p>
    <select name="authors" size="1">
        <?php 
            if (is_array($add_data))
            {
                echo '<option value="">select author</option>';
                foreach ($add_data as $key=>$item) {
                    echo '<option name="'.$key.'" value="'.$item['id'].'">'.$item['name'].'&nbsp;'.$item['surname'].'</option>';
                }
            }
        ?>
    </select>
 
    <input class="submit_button" type="submit" value="Filter" />
</form>

<form enctype="multipart/form-data" action="/index.php/filterBooksByTypes.php" method="post" class="filter_form">
   <p class="filter_title">Genre:</p>
    <select name="types" size="1">
        <?php 
            if (is_array($add_data2))
            {
                echo '<option value="">select type</option>';
                foreach ($add_data2 as $value) {
                    echo '<option name="type" value="'.$value['id'].'">'.$value['title'].'</option>';
                }
            }
        ?>
   </select>
 
    <input class="submit_button" type="submit" value="Filter" />
</form>

<form enctype="multipart/form-data" action="/index.php/filterBooksByPrice.php" method="post" class="filter_form">
    <p class="filter_title">Price:</p>
    <select name="prices" size="1">
        <option name="price" value="">select price</option>
        <option name="price" value="0-50">0-50</option>
        <option name="price" value="51-100">51-100</option>
        <option name="price" value="101-200">101-200</option>
    </select>
 
    <input class="submit_button" type="submit" value="Filter" />
</form>



<?php
    if (is_array($data))
    {
        echo '<div class="book_list"><h3>List of books:</h3>';
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
    echo '<a class="blue_link" href="/index.php/addNewBook.php">Add book</a>';
?>

