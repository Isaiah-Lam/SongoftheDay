@extends('base')

@section('content')
    
    <h1 class="page-header">Admin</h1>
	<div>
        <?php
            if (session_status() === PHP_SESSION_NONE) {
    		    session_start();
		    }   
            if (isset($_SESSION['admin']) && $_SESSION['admin'] === True) {
                echo '
                <form action="/api/updatesongs" method="post" id="admin-song-form">
                    <input type="date" name="date" id="admin-date" placeholder="Date" required>
                    <input type="date" name="posted" id="admin-posted" placeholder="Posted" required>
                    <input type="text" name="title" id="admin-title" placeholder="Title" required>
                    <label for="admin-explicit">Explicit:</label>
                    <input type="checkbox" name="explicit" value=1 id="admin-explicit">
                    <input type="text" name="artist" id="admin-artist" placeholder="Artist" required>
                    <input type="text" name="album" id="admin-album" placeholder="Album" required>
                    <input type="number" name="length" id="admin-length" placeholder="Length" required>
                    <input type="submit">
                </form>
                ';
            }
            else {
                echo '
                
                <form action="/api/adminlogin" method="post" id="admin-login-form">
                    <h4>Enter the admin password:</h4>
                    <br>';
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'incorrect') {
                        echo '<p style="color: red">Incorrect Password</p>';
                    }
                    echo '
                    <input type="password" placeholder="Password" name="admin_pass" id="admin-pass">
                    <input type="submit">
			    </form>
                ';
            }	
		?>
	</div>

@stop