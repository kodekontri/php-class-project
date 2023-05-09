<?php
namespace App\Controllers;

class PageController
{
    private function filterBy($books, $func){
        $items = [];
        
        foreach($books as $book){
            if($func($book)){
                array_push($items, $book);
            }
        }
    
        return $items;
    }

    public function home(){
        $bookStore = new \App\DataStore('books');
        $books = $this->filterBy($bookStore->read(), function($book){
            $filter = trim($_GET['filter'] ?? null) ; // author
            $query = trim($_GET['query'] ?? null); // Kelvin Chi
        
            if(!$filter) return true;
        
            return $book[$filter] === $query;
        });
        
        
        view('index', [
            'title' => "Home Page",
            'books' => $books
        ]);
    }



    public function contact(){
        $title = "Contact Us";
        view('contact', compact('title'));
    }


    public function about(){
        $title = "About Us";
        view('about', compact('title'));
    }
}