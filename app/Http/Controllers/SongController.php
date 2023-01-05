<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class SongController extends Controller
{

    public function adminLogin(Request $request) {

        if ($request->input('admin_pass') == "AdminSongs2729") {
            $_SESSION["admin"] = True;
        }
        else {
            $_SESSION['admin'] = "incorrect";
        }

        return redirect('/admin');

    }

    public function makeSuggestion(Request $request) {

        Suggestion::create([
            "name" => $request->input('sg_name'),
            "title" => $request->input('sg_song'),
            "artist" => $request->input('sg_artist'),
            "link" => $request->input('sg_link')
        ]);

        return redirect()->back();

    }

    public function updateSongs(Request $request) {

        $nextId = Song::all()->last()["id"] + 1;

        $explicit = $request->input("explicit") == 1 ? 1 : 0;

        Song::create([
            "id" => $nextId,
            "date" => $request->input('date'),
            "posted" => $request->input('posted'),
            "title" => $request->input('title'),
            "explicit" => $explicit,
            "artist" => $request->input('artist'),
            "album" => $request->input('album'),
            "length" => $request->input('length')
        ]);

        return redirect('/admin');

    }

}
