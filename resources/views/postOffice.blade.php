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
<div id="postOffice"></div>
<style>
    #Map {
        width:67%;
        height: 600px;
    }
    #branchAndMap{
        display: flex;
        width: 100%;
        justify-content: space-between;
        padding-top: 7px;
    }
    #postOffice{
        width: 1182px;
        margin: auto;
        float: none;
    }
    #listBranch{
        display: flex;
        flex-direction: column;
        width: 32%;
        height: 600px;
        overflow: auto;
    }
    #listBranch div{
        border-bottom: 1px solid rgb(221,221,221);
        padding: 20px 0;
    }
    #about_post_office{
        display: flex;
        flex-wrap: wrap;

    }
    #review_post_office{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        height: 530px;
    }
    #reviews{
        width: 42%;
    }
    #reviews h4{
        font-weight: 400;
    }
    #advertise{
        width: 50%
    }
    #review_post_office img{
        object-fit: contain;
    }
    #location{
        width: 100%;
    }
    #addr{
        width: 93%;
    }
    #click_search{
        width: 7%;
    }
    #user_trust{
        display: flex;
        justify-content: space-around;
        width: 100%;
    }
    #user_trust h1{
        color: red;
    }
    #user_trust div{
        width: 220px;
        height: 115px;
        text-align: center;
        padding-top: 12px;
        border: 1px solid;
    }
    #location{
        border: 1px solid rgb(181 181 181);
        padding: 7px;
    }
</style>


<script  src="{{ mix("js/app.js") }}"></script>
</body>
</html>
