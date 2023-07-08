<?php

use App\Models\Chapter;
use App\Models\Novel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return ['status' => false, 'message' => "Is commimg"];
});

Route::get('url', function () {
    return view('url');
});

Route::get('get_novel', function () {
    ini_set('max_execution_time', 300); //5 minutes

    $urls = [];

    $urls =  array_reverse($urls);
    $duplicateEntry = [];
    $novel_id = 28;

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

            $crawler->filter('.text-left')->each(function ($node) use ($chapter) {
                $content = $node->text();
                $chapter->content = $content;
            });
            $chapter->save();

            unset($crawler);
        } catch (\Throwable $th) {
            array_push($duplicateEntry, $chapter->title);
            continue;
        }
    }

    if (count($duplicateEntry) > 0) {
        dump("ตรวจพบรายการที่พบในระบบ");
        dump($duplicateEntry);
    }

    return ["status" => " เพิ่มสำเร็จ"];
});

Route::get('get_novel1', function () {
    ini_set('max_execution_time', 300); //5 minutes
    $urls = [];

    $urls =  array_reverse($urls);
    $duplicateEntry = [];
    $novel_id = 12;

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

            $crawler->filter('.text-left')->each(function ($node) use ($chapter) {
                $content = $node->text();
                $chapter->content = $content;
            });
            $chapter->save();

            unset($crawler);
        } catch (\Throwable $th) {
            array_push($duplicateEntry, $chapter->title);
            continue;
        }
    }

    if (count($duplicateEntry) > 0) {
        dump("ตรวจพบรายการที่พบในระบบ");
        dump($duplicateEntry);
    }

    return ["status" => " เพิ่มสำเร็จ"];
});


Route::get('get_novel2', function () {
    ini_set('max_execution_time', 300); //5 minutes
    $urls = [];

    $urls =  array_reverse($urls);
    $duplicateEntry = [];
    $novel_id = 26;

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

            $crawler->filter('.text-left')->each(function ($node) use ($chapter) {
                $content = $node->text();
                $chapter->content = $content;
            });
            $chapter->save();

            unset($crawler);
        } catch (\Throwable $th) {
            array_push($duplicateEntry, $chapter->title);
            continue;
        }
    }

    if (count($duplicateEntry) > 0) {
        dump("ตรวจพบรายการที่พบในระบบ");
        dump($duplicateEntry);
    }

    return ["status" => " เพิ่มสำเร็จ"];
});


Route::get('novels/{id}', function ($id) {
    $chapters = Chapter::where('novel_id', $id)
        // ->where('chapter', '>=', 2041)
        // ->where('chapter', '<', 2130)
        ->orderBy('chapter')
        ->paginate(20);

    // return $chapters;
    return view('novel', compact('chapters'));
})->name('novel.show');

Route::get('novels', function () {
    $novels = Novel::withCount('chapters')->get();

    // return $novels;
    return view('novels', compact('novels'));
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
