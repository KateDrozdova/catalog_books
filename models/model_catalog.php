<?php

class Model_Catalog extends Model
{   
    protected function connectDB() 
    {
        static $link;
        $link = mysqli_connect("localhost", "root", "root", "catalog_db");
        if (mysqli_connect_errno()) {
            printf("Не удалось подключиться: %s\n", mysqli_connect_error());
            exit();
        }
    
        return $link;
    }

    public function getAllBooks()
    {
        $link = $this->connectDB();
        
        $query = "SELECT b.id, b.title AS title_b, b.price, b.page_count, a.name, a.surname, t.title FROM books AS b INNER JOIN author AS a ON b.author = a.id INNER JOIN type AS t ON b.type = t.id";
        $result = $link->query($query);
        $list = array();
        if($result)
        {       
            while ($row = mysqli_fetch_assoc($result)) 
            {
                array_push($list, $row);
            }   
            mysqli_free_result($result);
        }
            
        return $list;
    }
    
    public function getList($table_name)
    {
        $link = $this->connectDB();
        $query = "SELECT * FROM $table_name ORDER BY id";
        $result = $link->query($query);
        $list = array();
        if($result)
        {       
            while ($row = mysqli_fetch_assoc($result)) 
            {
                array_push($list, $row);
            }    

            mysqli_free_result($result);
        }
        
        return $list;
    }
    
    public function writeBookInDB($title, $price, $page_count, $author, $type)
    {
        $link = $this->connectDB();
        $author_str = implode($author);        
        $query = "INSERT INTO books (title, price, page_count, author, type) VALUES ('$title', $price, $page_count, $author_str, $type)";
        $query_res = $link->query($query);
        
        if($query_res)
        {
            $result = 1;
        }
        else
        {
            $result = 0;
        }
        
        return $result;
    }
    
    public function getBookByID($id_book)
    {
        $link = $this->connectDB();
        
        $query = "SELECT b.id, b.title AS title_b, b.price, b.page_count, a.name, a.surname, b.author AS author_id, t.title AS type, t.id AS type_id FROM books AS b INNER JOIN author AS a ON b.author = a.id INNER JOIN type AS t ON b.type = t.id WHERE b.id = $id_book";
        $result = $link->query($query);
        $list = array();
        if($result)
        {       
            while ($row = mysqli_fetch_assoc($result)) 
            {
                array_push($list, $row);
            }   
            mysqli_free_result($result);
        }
            
        return $list;
    }
    
    public function updateBookInDB($title, $price, $page_count, $author, $type, $id_book) 
    {
        $link = $this->connectDB();
        $title = htmlentities(mysqli_real_escape_string($link, $title));
        $price = htmlentities(mysqli_real_escape_string($link, $price));
        $page_count = htmlentities(mysqli_real_escape_string($link, $page_count));
        $author_str = implode($author);
        $author = htmlentities(mysqli_real_escape_string($link, $author_str));
        
        $type = htmlentities(mysqli_real_escape_string($link, $type));
        
        $query_up = "UPDATE books SET title = '$title', price = $price, page_count = $page_count, author = $author, type = $type WHERE id = $id_book";
        $query_res = $link->query($query_up);
        
        if($query_res)
        {
            $result = 1;
        }
        else
        {
            $result = 0;
        }
        
        return $result;
    }   
    
    public function deleteElemByID($id, $table_name) {
        $link = $this->connectDB();
        $query_del = "DELETE FROM $table_name WHERE id=$id";
        $query_res = $link->query($query_del);
         
        if($query_res)
        {
            $result = 1;
        }
        else
        {
            $result = 0;
        }

        return $result;
    }
    
    
    public function writeAuthorInDB($name, $surname, $fileName)
    {
        $link = $this->connectDB();
        $query = "INSERT INTO author (name, surname, avatar) VALUES ('$name', '$surname', '$fileName')";
        $query_res = $link->query($query);
        
        if($query_res)
        {
            $result = 1;
        }
        else
        {
            $result = 0;
        }
        
        return $result;
    }
    
    public function getElementByID($id, $table_name)
    {
        $link = $this->connectDB();
        
        $query = "SELECT * FROM $table_name WHERE id = $id";
        $result = $link->query($query);
        $list = array();
        if($result)
        {       
            while ($row = mysqli_fetch_assoc($result)) 
            {
                array_push($list, $row);
            }   
            mysqli_free_result($result);
        }
            
        return $list;
    }
    
    public function updateAuthorInDB($name, $surname, $id_author) 
    {
        $link = $this->connectDB();
        
        $name = htmlentities(mysqli_real_escape_string($link, $name));
        $surname = htmlentities(mysqli_real_escape_string($link, $surname));
        
        $query_up = "UPDATE author SET name = '$name', surname = '$surname' WHERE id = $id_author";
        $query_res = $link->query($query_up);
        
        if($query_res)
        {
            $result = 1;
        }
        else
        {
            $result = 0;
        }
        
        return $result;
    }  
    
    public function deleteAuthorByID($id_author) 
    {
        $link = $this->connectDB();
        $query_del = "DELETE FROM author WHERE id=$id_author";
        $query_res = $link->query($query_del);
         
        if($query_res)
        {
            $result = 1;
        }
        else
        {
            $result = 0;
        }

        return $result;
    }
    
    public function writeTypeInDB($title)
    {
        $link = $this->connectDB();
        $query = "INSERT INTO type (title) VALUES ('$title')";
        $query_res = $link->query($query);
        
        if($query_res)
        {
            $result = 1;
        }
        else
        {
            $result = 0;
        }
        
        return $result;
    }
    
    public function updateTypeInDB($title, $id_type) 
    {
        $link = $this->connectDB();
        
        $title = htmlentities(mysqli_real_escape_string($link, $title));
        
        $query_up = "UPDATE type SET title = '$title' WHERE id = $id_type";
        $query_res = $link->query($query_up);
        
        if($query_res)
        {
            $result = 1;
        }
        else
        {
            $result = 0;
        }
        
        return $result;
    }  
    
    public function getBooksByFilter($id, $col_name)
    {
        $link = $this->connectDB();
        
        $query = "SELECT b.id, b.title AS title_b, b.price, b.page_count, a.name, a.surname, t.title FROM books AS b INNER JOIN author AS a ON b.author = a.id INNER JOIN type AS t ON b.type = t.id WHERE $col_name=$id";
        $result = $link->query($query);
        $list = array();
        if($result)
        {       
            while ($row = mysqli_fetch_assoc($result)) 
            {
                array_push($list, $row);
            }   
            mysqli_free_result($result);
        }
            
        return $list;
    }
    
    public function getBooksByPrice($col_name, $begin, $end)
    {
        $link = $this->connectDB();
        
        $query = "SELECT b.id, b.title AS title_b, b.price, b.page_count, a.name, a.surname, t.title FROM books AS b INNER JOIN author AS a ON b.author = a.id INNER JOIN type AS t ON b.type = t.id WHERE $col_name>=$begin && $col_name<=$end";
        $result = $link->query($query);
        $list = array();
        if($result)
        {       
            while ($row = mysqli_fetch_assoc($result)) 
            {
                array_push($list, $row);
            }   
            mysqli_free_result($result);
        }
            
        return $list;
    }
    
    function canUploadFile($file)
    {
        if($file['name'] == '')
            return 'Вы не выбрали файл.';
        
	if($file['size'] == 0)
            return 'Файл слишком большой.';
	
	$getMime = explode('.', $file['name']);
	$mime = strtolower(end($getMime));
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
        if(!in_array($mime, $types))
            return 'Недопустимый тип файла.';
	
	return true;
    }
  
    function makeUploadFile($file)
    {	
        $name = mt_rand(0, 10000).'_' . $file['name'];
        copy($file['tmp_name'], 'image/' . $name);

        return $name;
    }

    public function importDB($sqlFile) 
    {
        $link = $this->connectDB();
        $sqlSource = file_get_contents($sqlFile);
        $query_res = mysqli_multi_query($link, $sqlSource);
        
        if($query_res)
        {
            $result = 1;
        }
        else
        {
            $result = 0;
        }
        
        return $result;
    }
}

?>