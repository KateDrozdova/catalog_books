<?php

class Controller_Catalog extends Controller
{
    public function __construct() 
    {
        $this->model = new Model_Catalog();
        $this->view = new View();
    }
    
    public function index() 
    {
        $list = $this->model->getAllBooks();
        $table_name = 'author';
        $authorsArr = $this->model->getList($table_name);
        $table_name2 = 'type';
        $typesArr = $this->model->getList($table_name2);
        $this->view->generate('catalog_view.php', 'mainPage.php', $list, $authorsArr, $typesArr);        
    }
    
    public function addNewBook() 
    {
        $table_name = 'author';
        $authorsArr = $this->model->getList($table_name);
        $table_name2 = 'type';
        $typesArr = $this->model->getList($table_name2);
        $this->view->generate('add_book_view.php', 'mainPage.php', $authorsArr, $typesArr);
    }
    
    public function addNewBookForm() 
    {
        if(isset($_POST['title_b']) && !empty($_POST['title_b']))
        {
            $title = htmlentities($_POST['title_b']);
            $price = $_POST['price'];
            if($_POST['page_count']>0)
            {
                $page_count = $_POST['page_count'];
            }
            $author =  $_POST['authors'];           
            $type = $_POST['type'];
            
            $result = $this->model->writeBookInDB($title, $price, $page_count, $author, $type);            
        }        
        if($result)
        {
            $list = $this->model->getAllBooks();
            $this->view->generate('catalog_view.php', 'mainPage.php', $list, $result);
        }
        else
        {
            $message = "No entry added. Please try again";
            $table_name = 'author';
            $authorsArr = $this->model->getList($table_name);
            $table_name2 = 'type';
            $typesArr = $this->model->getList($table_name2);
            $this->view->generate('add_book_view.php', 'mainPage.php', $authorsArr, $typesArr, $message);
        }
    }
    
    public function editBook() 
    {
        $id_book = $_GET['id'];       
        $result = $this->model->getBookByID($id_book);
        $table_name = 'author';
        $authorsArr = $this->model->getList($table_name);
        $typesArr = $this->model->getList($table_name = "type");
        $this->view->generate('edit_book_view.php', 'mainPage.php', $result, $authorsArr, $typesArr);
    }
    
    public function editBookForm() 
    {   
        if(isset($_POST['title_b']) && !empty($_POST['title_b']))
        {
            $title = $_POST['title_b'];
            $price = $_POST['price'];
            if($_POST['page_count']>0)
            {
                $page_count = $_POST['page_count'];
            }
            $author =  $_POST['authors'];
            $type =  $_POST['type'];
            $id_book = $_POST['book_id'];
            $result = $this->model->updateBookInDB($title, $price, $page_count, $author, $type, $id_book);
            if($result)
            {
                $list = $this->model->getAllBooks();
                $this->view->generate('catalog_view.php', 'mainPage.php', $list);
            }    
            else
            {
                $message = "No entry added. Please try again"; 
                $id_book = $_POST['book_id'];
                $result = $this->model->getBookByID($id_book);
                $table_name = 'author';
                $authorsArr = $this->model->getList($table_name);
                $typesArr = $this->model->getList($table_name = "type");
                $this->view->generate('edit_book_view.php', 'mainPage.php', $result, $authorsArr, $typesArr, $message);
            }
        }
        else
        {
            $message = "No entry added. Please try again"; 
            $id_book = $_POST['book_id'];
            $result = $this->model->getBookByID($id_book);
            $table_name = 'author';
            $authorsArr = $this->model->getList($table_name);
            $typesArr = $this->model->getList($table_name = "type");
            $this->view->generate('edit_book_view.php', 'mainPage.php', $result, $authorsArr, $typesArr, $message);
        }
    }
    
    public function deleteBook() 
    {   
        $id_book = $_GET['id'];
        $table_name = "books";
        $result = $this->model->deleteElemByID($id_book, $table_name);
        if($result)
        {
            $list = $this->model->getAllBooks();
            $this->view->generate('catalog_view.php', 'mainPage.php', $list);
        }
    }
    
    public function listAuthors()
    {
        $table_name = 'author';
        $authorsArr = $this->model->getList($table_name);
        $this->view->generate('list_authors_view.php', 'mainPage.php', $authorsArr);
    }
    
    public function addNewAuthor() 
    {
        $table_name = 'author';
        $list = $this->model->getList($table_name);
        $this->view->generate('add_author_view.php', 'mainPage.php', $list, $message = '');        
    }
    
    public function addNewAuthorForm() 
    {
        if(isset($_POST['name'])  && !empty($_POST['name']) && isset($_POST["surname"]) && !empty($_POST['surname']))
        {
            $name = htmlentities($_POST['name']);
            $surname = htmlentities($_POST['surname']);         
            if(isset($_FILES['logo'])) 
            {
                $check = $this->model->canUploadFile($_FILES['logo']);
                if($check === true){
                    $fileName = $this->model->makeUploadFile($_FILES['logo']);
                }
            }   
            if(isset($fileName))
            {
                $result = $this->model->writeAuthorInDB($name, $surname, $fileName);
            }
            else
            {
                $result = $this->model->writeAuthorInDB($name, $surname, $fileName = '');
            }            
            if($result)
            {
                $table_name = 'author';
                $authorsArr = $this->model->getList($table_name);
                $this->view->generate('list_authors_view.php', 'mainPage.php', $authorsArr);
            }
            else
            {
                $message = "No entry added. Please try again"; 
                $this->view->generate('add_author_view.php', 'mainPage.php', $list = '', $message);                
            }
        }  
        else
        {
            $message = "No entry added. Please try again";             
            $this->view->generate('add_author_view.php', 'mainPage.php', $list = '', $message);                
        }
    }
    
    public function editAuthor() 
    {
        $id_author = $_GET['id']; 
        $table_name = 'author';
        $result = $this->model->getElementByID($id_author, $table_name);
        $this->view->generate('edit_author_view.php', 'mainPage.php', $result);
    }
    
    public function editAuthorForm() 
    {  
        if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST["surname"]) && !empty($_POST['surname']))
        {   
            $name = htmlentities($_POST['name']);
            $surname = htmlentities($_POST['surname']);     
            $id_author = $_POST['author_id'];
           
            $result = $this->model->updateAuthorInDB($name, $surname, $id_author);
            if($result)
            {
                $table_name = 'author';
                $authorsArr = $this->model->getList($table_name);
                $this->view->generate('list_authors_view.php', 'mainPage.php', $authorsArr);
            }
            else
            {
                $message = "No entry added. Please try again";
                $table_name = 'author';
                $result = $this->model->getElementByID($id_author, $table_name);
                $this->view->generate('edit_author_view.php', 'mainPage.php', $result, $message);
            }
        }
        else
        {
            $id_author = $_POST['author_id'];
            $message = "No entry added. Please try again";
            $table_name = 'author';
            $result = $this->model->getElementByID($id_author, $table_name);
            $this->view->generate('edit_author_view.php', 'mainPage.php', $result, $message);
        }
    }
    
    public function deleteAuthor() 
    {   
        $id_author = $_GET['id'];
        $table_name = "author";
        $result = $this->model->deleteElemByID($id_author, $table_name);
        if($result)
        {   
            $authorsArr = $this->model->getList($table_name);
            $this->view->generate('list_authors_view.php', 'mainPage.php', $authorsArr);
        }
        else
        {
            $this->view->generate('edit_book_view.php', 'mainPage.php');
        }
    }
    
    public function listTypes()
    {
        $table_name = 'type';
        $list = $this->model->getList($table_name);
        $this->view->generate('list_types_view.php', 'mainPage.php', $list);
    }
    
    public function addNewType() 
    {
        $table_name = 'type';
        $list = $this->model->getList($table_name);
        $this->view->generate('add_type_view.php', 'mainPage.php', $list, $message = '');        
    }
    
    public function addNewTypeForm() 
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title = htmlentities($_POST['title']);       
            $result = $this->model->writeTypeInDB($title);
            if($result)
            {
                $table_name = 'type';
                $typesArr = $this->model->getList($table_name);
                $this->view->generate('list_types_view.php', 'mainPage.php', $typesArr);
            }
            else 
            {
                $message = "No entry added. Please try again";
                $this->view->generate('add_type_view.php', 'mainPage.php', $list = '', $message); 
                
            }
        }        
        else 
        {
            $message = "No entry added. Please try again";
            $this->view->generate('add_type_view.php', 'mainPage.php', $list = '', $message); 

        }
    }
    
    public function editType() 
    {
        $id_type = $_GET['id'];  
        $table_name = 'type';
        $result = $this->model->getElementByID($id_type, $table_name);
        $this->view->generate('edit_type_view.php', 'mainPage.php', $result);
    }
    
    public function editTypeForm() 
    {   
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            
            $title = htmlentities($_POST['title']);                 
            $id_type = $_POST['type_id'];
            $result = $this->model->updateTypeInDB($title, $id_type);
            if($result)
            {
                $table_name = 'type';
                $typesArr = $this->model->getList($table_name);
                $this->view->generate('list_types_view.php', 'mainPage.php', $typesArr);
            }
            else
            {   
                $message = "No entry added. Please try again";
                $table_name = 'type';
                $result = $this->model->getElementByID($id_type, $table_name);
                $this->view->generate('edit_type_view.php', 'mainPage.php', $result, $message);           
            }
        }
        else 
        {
            $id_type = $_POST['type_id'];
            $message = "No entry added. Please try again";
            $table_name = 'type';
            $result = $this->model->getElementByID($id_type, $table_name);
            $this->view->generate('edit_type_view.php', 'mainPage.php', $result, $message);       
        }
    }
    
    public function deleteType() 
    {   
        $id_type = $_GET['id'];
        $table_name = "type";
        $result = $this->model->deleteElemByID($id_type, $table_name);
        if($result)
        {   
            $typesArr = $this->model->getList($table_name);
            $this->view->generate('list_types_view.php', 'mainPage.php', $typesArr);
        }
        else
        {
            $this->view->generate('edit_types_view.php', 'mainPage.php');
        }
    }
    
    public function filterBooksByAuthors()
    {
        $author_id = $_POST['authors'];
        $col_name = 'author';
        $list = $this->model->getBooksByFilter($author_id, $col_name);
        $count = count($list);
        $this->filterBooks($list, $count);
    }
    
    public function filterBooksByTypes()
    {
        $type_id = $_POST['types'];
        $col_name = 'type';
        $list = $this->model->getBooksByFilter($type_id, $col_name);
        $count = count($list);
        $this->filterBooks($list, $count);
    }
    
    public function filterBooksByPrice()
    {
        $prices = $_POST['prices'];
        $priceStr = explode("-", $prices);
        $begin = $priceStr[0];
        $end = $priceStr[1];
        $col_name = 'price';
        $list = $this->model->getBooksByPrice($col_name, $begin, $end);
        $count = count($list);
        $this->filterBooks($list, $count);
    }
    
    public function filterBooks($list, $count)
    {
        return $this->view->generate('filter_view.php', 'mainPage.php', $list, $count);
    }
    
    public function importDB()
    {
        $sqlFile = "database/catalog_db.sql"; 
        $result = $this->model->importDB($sqlFile);
        return $this->view->generate('import_db_view.php', 'mainPage.php', $result);
    }
}

?>