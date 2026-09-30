<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books =Book::query()->get();
        return response()->json([
        "message"=>"all books in database ",
         "books"=>$books]);
    }


    public function show (int $id){

        $book =Book::query()->where('id',$id)->get();
        return response()->json([
        "message"=>" the book with id $id is ",
         "book"=>$book]);


    }

public function store(BookStoreRequest $request){

$book = Book::query()->create(
    $request->validated()

)
;

 return response()->json([
        "message"=>" the book was created successfully ",
         "book"=>$book]);

}




public function update (BookUpdateRequest $request,int $id){
    $book = Book::query()->where('id',$id)->update(
        $request->validated()
    );
return response()->json([
        "message"=>" the book was updated successfully ",
         "book"=>$book]);

}





public function destroy(int $id){

  Book::query()->where('id',$id)->delete();
    return response()->json([
        "message"=>" the book was deleted successfully ",
        ]);

}

}
