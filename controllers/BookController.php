<?php
namespace App\Controllers;
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

        $errors = \App\Validator::make($data, [
            'name' => ['required', 'min:10'],
            'author' => ['required'],
            'year' => 'required'
        ]);

        if($errors){
            var_dump($errors);
            exit();
        }

        
        $bookStore = new \App\DataStore('books');
        $bookStore->save($data);
        header('location: /books/create');
        exit();
    }
}