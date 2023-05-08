<?php

class BookController
{
    public function form(){
        view('books/create', [
            'title' => "Create Book"
        ]);
    }

    public function submit(){
        $name = $_POST['name'];
        $author = $_POST['author'];
        $year = $_POST['year'];
    
        $data = [
            'name' => $name,
            'author' => $author,
            'year' => $year
        ];
        
        $bookStore = new DataStore('books');
        $bookStore->save($data);
        header('location: /books/create');
        exit();
    }
}