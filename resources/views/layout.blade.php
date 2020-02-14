<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex, nofollow">
        <title>Twill Devtools</title>
    </head>
    <body>
        <h1>Twill Devtools</h1>

        <h2>Current users:</h2>
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->email }}</li>
            @endforeach
            <a href="#">Create Super Admin</a>
        </ul>

        <h2>Current modules:</h2>
        <ul>
            <li>Sapien rhoncus <a href="#">delete</a></li>
            <li>Ligula nulla <a href="#">delete</a></li>
            <li>Nam quam <a href="#">delete</a></li>
            <a href="#">Create New Module</a>
        </ul>

        <h2>Current forms:</h2>
        <ul>
            <li>Sapien rhoncus <a href="#">edit</a></li>
            <li>Ligula nulla <a href="#">edit</a></li>
            <li>Nam quam <a href="#">edit</a></li>
        </ul>

        <h2>All Routes:</h2>
        <ul>
            <li>Enim bibendum faucibus fringilla nascetur dolor netus</li>
            <li>Mi venenatis fermentum conubia vehicula blandit condimentum</li>
            <li>Mi cubilia lacinia</li>
        </ul>

        <h2>Navigation</h2>
        <ul>
            <li>
                <h3>Home</h3>
            </li>
            <li>
                <h3>Projects</h3>
                <ul>
                    <li>Landing</li>
                    <li>Project Types</li>
                </ul>
            </li>
        </ul>
    </body>
</html>