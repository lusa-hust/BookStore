<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\Book;
use App\User;

class Initialization extends Controller
{
    public function up()
    {

        $files = Array(
            'khoa-hoc-tu-nhien-nhan-van',
            'thieu-nhi',
            'thoi-su-chinh-tri',
            'van-hoc-nuoc-ngoai',
            'van-hoc-viet-nam'
        );

        echo "<b>Begin installation !!</b><br>";
        echo "<b>Check install status: </b>";

        if (Book::count()) {
            echo "Have been install <br>";
            echo "Abort<br>";
            return;
        } else {
            echo "Not install ! <br>";
           echo "<b>Start Install </b><br>";
        }

        $nBooks = 0;
        // delete directory
        Storage::disk('local')->deleteDirectory('public/covers');

        // make new directory
        Storage::disk('local')->makeDirectory('public/covers');

        foreach ($files as $file) {
            $contents = Storage::disk('local')->get('crawl-data-book/' . $file . '.json');
            $books = json_decode($contents);
            //var_dump($books);
            echo "<b>processing file " . $file . "</b></br>";
            $nBooks += count($books);

            if (!empty($books)) {
                // if decoded successfully
                // insert category
                $category_name = $books[0]->category;
                $category = Category::create(['name' => $category_name]);

                // insert book
                foreach ($books as $book) {
                    echo $book->title . ": ";
                    // insert book record.
                    // copy file
                    $src = 'crawl-data-book/images-' . $file . '/' . $book->image_name;
                    echo $src . "</br>";
                    try {
                        Storage::disk('local')->copy($src, 'public/covers/' . $book->image_name);
                    } catch (Exception $e) {
                        echo "Cannot copy " . $src . ' to public/covers/' . $book->image_name;
                        continue;
                    }
                    $bookrc = Book::create([
                        'title' => $book->title,
                        'author' => $book->author,
                        'price' => (int)$book->price,
                        'qty' => rand(3, 100),
                        'description' => $book->intro,
                        'image' => $book->image_name
                    ]);

                    $bookrc->categories()->attach($category->id);

                }

            }
        }

        echo "<b>Done. Init " . $nBooks . " records</b><br>";

        echo "<h2>Create admin account<h2>";
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'admin' => 1
        ]);

        echo "<b>User admin created</b><br>";

        echo "<b>User admin info:</b><br>";
        echo "User:admin@admin.com; password:admin; <br>";

    }


    public function down()
    {

    }
}
