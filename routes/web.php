<?php

use App\Models\Chapter;
use App\Models\Novel;
use Illuminate\Http\Request;
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
    $novel_id = 8;

    foreach ($urls as $url) {
        try {
            $crawler = Weidner\Goutte\GoutteFacade::request('GET', $url);
            $chapter = new Chapter();
            $chapter->novel_id = $novel_id;
            $crawler->filter('#chapter-heading')->each(function ($node) use ($chapter) {
                $title_novel = $node->text();
                $chapter->title = $title_novel;
                $title_novel_arr = explode("ตอนที่ ", $title_novel);
                // $title_novel_arr = explode("บทที่ ", $title_novel);
                $chapter_ch  = floatval(substr($title_novel_arr[1], 0, 8));
                // dd($chapter_ch);
                // dd($node->text());
                $chapter->chapter = $chapter_ch;
            });

            $crawler->filter('.text-left')->each(function ($node) use ($chapter) {
                $content = $node->text();
                // dd($node->text());
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

Route::get('novels/{id}', function ($id, Request $request) {
    $chapters = Chapter::where('novel_id', $id)
        ->when(request()->start, function ($q) use ($request) {
            $q->where('chapter', '>=', $request->start);
        })
        ->when(request()->end, function ($q) use ($request) {
            $q->where('chapter', '<=', $request->end);
        })
        ->orderBy('chapter')
        ->orderBy('id')
        ->paginate(20)
        ->withQueryString();

    if ($request->title) {
        $showTitle = true;
    } else {
        $showTitle = false;
    }

    // return $chapters;
    return view('novel', compact('chapters', 'showTitle'));
})->name('novel.show');

Route::get('novels', function () {
    $novels = Novel::withCount('chapters')->with('chapter_latest:novel_id,chapter,created_at')->lazy();

    // return $novels;
    return view('novels', compact('novels'));
})->name('novels');


Route::get('novels/{novel_id}/chapters', function ($novel_id) {
    $novel = Novel::find($novel_id);
    $chapters = Chapter::with('novel:id,name')
        ->select(['id', 'novel_id', 'chapter', 'title', 'is_read', 'created_at'])
        ->where("novel_id", $novel_id)->orderBy('chapter', "DESC")
        ->paginate(20);

    return view('chapter', compact('novel', 'chapters'));
})->name('chapters');

Route::get('novels/get', function () {
    $chapters = Chapter::where('id', 8646)->get();
    return view('novel', compact('chapters'));
});

Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');

    Artisan::call('config:cache');

    return "Cache is cleared and view:cache config:cache";
});

Route::get('optimize', function () {
    Artisan::call('optimize:clear');

    return "Cache is cache and config:cache";
});
