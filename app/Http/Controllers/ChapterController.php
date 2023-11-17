<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    function updateReadStatus(Request $request)
    {
        $chapterId = $request->input('chapterId');
        $isRead = ($request->input('isRead') === "true") ? 1 : 0;

        Chapter::find($chapterId)->update(['is_read' => $isRead]);

        return response()->json(['success' => true]);
    }
}
