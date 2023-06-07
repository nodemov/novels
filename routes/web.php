<?php

use App\Models\Chapter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return redirect()->route("novels");
});

Route::get('get_novel', function () {
    ini_set('max_execution_time', 300); //5 minutes
    $urls = [
    ];

    $urls =  array_reverse($urls);
    $duplicateEntry = [];
    $novel_id = 14;

    foreach ($urls as $url) {
        try {
            $crawler = Goutte::request('GET', $url);
            $chapter = new Chapter();
            $chapter->novel_id = $novel_id;
            $crawler->filter('#chapter-heading')->each(function ($node) use ($chapter) {
                $title_novel = $node->text();
                $chapter->title = $title_novel;
                $title_novel_arr = explode("ที่ ", $title_novel);
                $chapter_ch  = floatval(substr($title_novel_arr[1], 0, 8));
                $chapter->chapter = $chapter_ch;
            });

            // $crawler->filter('.read-container')->each(function ($node) use ($chapter) {
            $crawler->filter('.text-left')->each(function ($node) use ($chapter) {
                $content = $node->text();
                // dump($content);
                $chapter->content = $content;
            });
            $chapter->save();

            unset($crawler);
        } catch (\Throwable $th) {
            array_push($duplicateEntry, $chapter->title);
            continue;
            // dd($th);
        }
    }

    if (count($duplicateEntry) > 0) {
        dump("ตรวจพบรายการที่พบในระบบ");
        dump($duplicateEntry);
    }

    return ["status" => " เพิ่มสำเร็จ"];
});

Route::get('geturl', function () {
    $crawler = Goutte::request('GET', 'https://novel-lucky.com/novel/battling-records-of-the-chosen-one/%e0%b8%95%e0%b8%ad%e0%b8%99%e0%b8%97%e0%b8%b5%e0%b9%88-1011-%e0%b8%81%e0%b8%a3%e0%b8%b0%e0%b8%9a%e0%b8%a7%e0%b8%99%e0%b9%80%e0%b8%89%e0%b8%b7%e0%b8%ad%e0%b8%99%e0%b9%80%e0%b8%81%e0%b8%b4%e0%b8%94/');

    $crawler->filter('.short')->each(function ($node) {
        // dump($node);
        $title = $node->text();
        dump($title);
    });

    $crawler->filter('.short')->each(function ($node) {
        // dump($node);
        $title = $node->text();
        dump($title);
    });
});

Route::get('novels', function () {
    $chapters = Chapter::where('novel_id', 14)
        // ->where('chapter', '>=', 2041)
        // ->where('chapter', '<', 2130)
        ->orderBy('chapter')
        ->paginate(20);

    // return $chapters;
    return view('novels', compact('chapters'));
})->name('novels');

Route::get('novels/get', function () {
    $chapters = Chapter::where('id', 8646)->get();
    return view('novel', compact('chapters'));
});

Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');

    // Artisan::call('view:cache');
    Artisan::call('config:cache');

    return "Cache is cleared and view:cache config:cache";
});

Route::get('optimize', function () {
    Artisan::call('optimize:clear');

    return "Cache is cache and config:cache";
});
