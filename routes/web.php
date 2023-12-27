<?php

use App\Models\Novel;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('novels', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $novels = Novel::withCount('chapters')->with('chapter_latest:novel_id,chapter,created_at')->orderby('created_at', 'DESC')->lazy();
    return view('dashboard', compact('novels'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('novels/{id}', function ($id, Request $request) {

        if ($request->show) {
            $show = (int) $request->show;
        } else {
            $show = 20;
        }

        $chapters = Chapter::where('novel_id', $id)
            ->when(request()->start, function ($q) use ($request) {
                $q->where('chapter', '>=', $request->start);
            })
            ->when(request()->end, function ($q) use ($request) {
                $q->where('chapter', '<=', $request->end);
            })
            ->orderBy('chapter')
            ->orderBy('id')
            ->paginate($show)
            ->withQueryString();

        if ($request->title) {
            $showTitle = true;
        } else {
            $showTitle = false;
        }

        if ($request->html) {
            $showHtml = true;
        } else {
            $showHtml = false;
        }

        // return $chapters;
        return view('novel', compact('chapters', 'showTitle', 'showHtml'));
    })->name('novel.show');

    Route::get('novels/{novel_id}/chapters', function ($novel_id) {

        $novel = Novel::find($novel_id);
        $chapters = Chapter::with('novel:id,name')
            ->select(['id', 'novel_id', 'chapter', 'title', 'is_read', 'created_at'])
            ->where("novel_id", $novel_id)->orderBy('chapter', "DESC")
            ->paginate(20);

        return view('chapter', compact('novel', 'chapters'));
    })->name('chapters');

    Route::get('clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');

        return "Cache is cleared and view:cache config:cache";
    });
});


Route::get('url', function () {
    return view('url');
});

Route::get('get_novel', function () {
    ini_set('max_execution_time', 600); //10 minutes

    $urls = [
        ""
    ];

    $urls =  array_reverse($urls);
    $duplicateEntry = [];
    $novel_id = 56;

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
                // $title_novel_arr = explode("EP. ", $title_novel);

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

require __DIR__ . '/auth.php';
