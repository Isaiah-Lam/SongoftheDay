@extends('base')

@section('content')

    <h1 class="page-header">Songs</h1>
    <div id="filters-div">
        <input type="text" class="filter-input" id="title-filter" placeholder="Title">
        <input type="text" class="filter-input" id="artist-filter" placeholder="Artist">
        <input type="text" class="filter-input" id="album-filter" placeholder="Album">
        <select class="filter-input" id="explicit-filter">
            <option value="">Explicit</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>
    <table id="song-table">
        <tr>
            <th style="width: 3%">No.</th>
            <th style="width: 8%">Date</th>
            <th style="width: 35%">Title</th>
            <th style="width: 3%">Explicit</th>
            <th style="width: 17%">Artist</th>
            <th style="width: 30%">Album</th>
            <th style="width: 4%">Length</th>
        </tr>
        <?php
            if (session_status() === PHP_SESSION_NONE) {
    		    session_start();
		    }   
            for ($i=0; $i<count($songs); $i++) {
                echo '
                <tr class="song">
                    <td class="song-id">'.$songs[$i]['id'].'</td>
                    <td class="song-date">'.$songs[$i]['date'].'</td>
                    <td class="song-title">'.$songs[$i]['title'].'</td>';
                    if ($songs[$i]['explicit'] == 1) {
                        echo'<td class="song-explicit">Yes</td>';
                    }
                        
                    else {
                        echo'<td class="song-explicit">No</td>';
                    }
                    echo'
                    <td class="song-artist">'.$songs[$i]['artist'].'</td>
                    <td class="song-album">'.$songs[$i]['album'].'</td>
                    <td class="song-length">'.$songs[$i]['length'].'</td>
                </tr>
                ';
            }
            
        ?>
    </table>

@stop