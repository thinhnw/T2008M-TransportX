@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Branch</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $user)
                <tr>
                    <th scope="row">{{($user->id)-1}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->user_branch}}</td>
                    <td>
                        <button
                            style="
                            background-color: #007bff;
                            border: none;
                            border-radius: 5px;
                            ">
                            <a href="{{url("/users/list/edit",['id'=>$user->id])}}">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABK0lEQVRIS82V7VHDMBBE31YAqQA6ICVAJ9ABdBA6oANCJVACdEA6oINlzmNn/CHLsrFn0K9MbO/b2ztJYuOljfVZBWD7ETDwJumnbboDsH0LvALXE5U9SDravgTegX39/idw14b0Ad/A1QLxr/qbG6AD6QOiTCRlo+s5D/GoPNYHEJAnSS+VVtut7UnAWCy1ThPXs6TDbEDCeWg0scTv6EVVUdOH4goKYglAR7y4gpR4OBz7Pzemgx7MFbe9lxSTVK1sREvEY19I2pUCwkk08ZxtLhbbsYsv2mM+VUEVGbAryTw15kWAcFTS0MWA3tExGMXm+RqAUfGAzAZMHHqDx/8CUI3ZXOe990+SzvdJ6sI5FtwJYx5OwL2kOLaHO/mPzpOfr3In54xtDvgFNKnzGTSjjxgAAAAASUVORK5CYII="/>
                            </a>
                        </button>
                        <button style="
                            background-color: #c82333;
                            border: none;
                            border-radius: 5px;
                            ">
                            <a href="{{url("/users/list/delete",['id'=>$user->id])}}">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAt0lEQVRIS+2V3Q3CMAyE7yZghMImjEIng1EYpd2ADYyCFCk0P5cmRLy0b5Fjf3e2UhODPw6ujyLAzK4A7gDOGSELgJnkMydUAVyBSbhcSF5aAeYSSSaFmFkx/sktqVMFVDwC+ITewYeOvxwMB3jlNdZDl6X7zcP7KWCrUJ1DeJUDVbC7RQcgeld7W3LMQP6aulukCC2AF4CTKryJrySjzZd7yW5VPiq2mWesAG6p1fnfpb+zRcnrb968zhn/bNJ5AAAAAElFTkSuQmCC"/>
                            </a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@stop
