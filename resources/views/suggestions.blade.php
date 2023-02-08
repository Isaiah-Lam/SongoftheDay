@extends('base')

@section('content')

	<h1 class="page-header">Suggestions</h1>
<!--	<div id="filters-div">-->
<!--		<input type="text" class="filter-input" id="title-filter" placeholder="Title">-->
<!--		<input type="text" class="filter-input" id="artist-filter" placeholder="Artist">-->
<!--		<input type="text" class="filter-input" id="album-filter" placeholder="Album">-->
<!--		<select class="filter-input" id="explicit-filter">-->
<!--			<option value="">Explicit</option>-->
<!--			<option value="Yes">Yes</option>-->
<!--			<option value="No">No</option>-->
<!--		</select>-->
<!--	</div>-->
	<table id="suggestion-table">
		<tr>
			<th style="width: 20%">Submitted by</th>
			<th style="width: 30%">Title</th>
			<th style="width: 20%">Artist</th>
            <th style="width: 30%">Link</th>
		</tr>
        
        <?php
            for ($i=0; $i<count($suggestions); $i++) {
                echo '
                <tr class="song">
                    <td class="song-name">'.$suggestions[$i]["name"].'</td>
                    <td class="song-title">'.$suggestions[$i]["title"].'</td>
                    <td class="song-artist">'.$suggestions[$i]["artist"].'</td>
                    <td class="song-link">'.$suggestions[$i]["link"].'</td>
                </tr>
                ';
            }
		?>
	</table>

@stop