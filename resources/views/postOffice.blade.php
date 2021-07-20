<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transport X</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
<body>
<div id="postOffice">
</div>
<style>
    #Map {
        width:70%;
        height: 600px;
    }
    #branchAndMap{
        display: flex;
        width: 100%;
    }
    #listBranch{
        display: flex;
        flex-direction: column;
        width: 30%;
    }
    #about_post_office{
        display: flex;
        flex-wrap: wrap;
    }
    #review_post_office{
        display: flex;
        flex-direction: row;
    }
    #review_post_office img{
        object-fit: contain;
    }
</style>


<script  src="{{ mix("js/app.js") }}"></script>
</body>
</html>
