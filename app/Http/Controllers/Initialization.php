<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Book;

class Initialization extends Controller
{
    public function up() {
        $files = Array(
            'khoa-hoc-tu-nhien-nhan-van',
            'thieu-nhi',
            'thoi-su-chinh-tri',
            'van-hoc-nuoc-ngoai',
            'van-hoc-viet-nam'
        );

        $nBooks = 0;

        foreach ($files as $file) {
            $contents = Storage::disk('local')->get('crawl-data-book/'.$file.'.json');
            $books = json_decode($contents);
            //var_dump($books);
            echo "<b>processing file " . $file."</b></br>";
            $nBooks += count($books);
            
            if (!empty($books)) {
                // if decoded successfully
                // insert category
                $category_name = $books[0]->category;
                $category = Category::create(['name' => $category_name]);

                // make new directory
                Storage::disk('local')->makeDirectory('public/covers');

                // insert book
                foreach ($books as $book) {
                    echo $book->title.": ";
                    // insert book record.
                    $bookrc = Book::create([
                        'title' => $book->title,
                        'author' => $book->author,
                        'price' => (int) $book->price,
                        'qty' => rand(3, 100),
                        'description' => $book->intro
                    ]);

                    $bookrc->categories()->attach($category->id);

                    // copy file
                    $src = 'crawl-data-book/images-'.$file.'/'.$book->image_name;
                    echo $src."</br>";
                    try{
                        Storage::disk('local')->copy($src, 'public/covers/'.$bookrc->id.'.jpg');
                    } catch (Exception $e) { 
                        echo "Cannot copy " . $src . ' to public/covers/'.$bookrc->id.'.jpg';
                    }
                    
                }
                
            }
        }

        echo "<b>Done. Init ".$nBooks." records</b>";
    }


    public function down() {

    }
}
