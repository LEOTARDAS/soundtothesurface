<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Front</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>name</th>
                <th>genre</th>
                <th>release date</th>
                </tr>
            </thead>
            <tbody>
                <tr class="active">
                <td>The Shawshank Redemption</td>
                <td>Crime, Drama</td>
                <td>14 October 1994</td>
                </tr>
            </tbody>
        </table>


        <button class="btn">default button</button>
        <button class="btn btn-primary">primary button</button>
        <button class="btn btn-link">link button</button>


        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
