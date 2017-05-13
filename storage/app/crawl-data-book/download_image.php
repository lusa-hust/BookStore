<?php
$files = Array(
            'khoa-hoc-tu-nhien-nhan-van',
            'thieu-nhi',
            'thoi-su-chinh-tri',
            'van-hoc-nuoc-ngoai',
            'van-hoc-viet-nam'
        );

foreach($files as $file) {
    $contents = file_get_contents($file.'.txt');
    $books = json_decode($contents);

    mkdir('images-'.$file);

    
    foreach ($books as $book) {
        $img_name = md5($book->image).'.jpg';
        file_put_contents('images-'.$file.'/'.$img_name, file_get_contents($book->image));
        $book->image_name = $img_name;
    }

    $fp = fopen($file.'.json', 'w');
    fwrite($fp, json_encode($books));
    fclose($fp);
}

 ?>