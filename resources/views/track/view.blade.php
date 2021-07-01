@extends('adminlte::page')

@section('title', 'Shipment Track')

@section('content_header')
    <div class="d-flex justify-content-between px-5 mt-3">
      
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="w-100 border-bottom pb-3">
                    <h2>Shipment Track</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card border-top border-primary px-5 py-5">
                    <b>
                        Enter Tracking Number 
                    </b>
                    <form action="">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" placeholder="Enter shipment ID" id="ref_no" >
                            <button class="btn btn-outline-secondary" type="button" id="track-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="timeline" id="parcel_history">
                    
                </div>
            </div>
        </div>
    </div>
    {{-- timeline item --}}
    <div id="clone_timeline-item" class="d-none">
        <div class="iitem">
            <i class="fas fa-box bg-blue"></i>
            <div class="timeline-item">
              <span class="time"><i class="fas fa-clock"></i> <span class="dtime">12:05</span></span>
              <div class="timeline-body">
                  asdasd
              </div>
            </div>
          </div> 

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function refToId(ref) {
            return ref.replace( /^\D+/g, '')
        }
        function track_now(){
            var tracking_num = $('#ref_no').val()
            console.log(tracking_num);
            if(tracking_num == ''){
                $('#parcel_history').html('')
            }else{
                $.ajax({
                    url: `track/${refToId(tracking_num)}`,
                    method: 'GET',
                    error: err => {
                        toastr.error('An error occured')
                    },
                    success: function (res) {
                        console.log(typeof res)    
                        if (!res) {
                            toastr.error('Unkown Tracking Number.')
                            return
                        } 
                        res = JSON.parse(res)
                        $('#parcel_history').html('')
                        res.forEach(timeline => {
                            var tl = $('#clone_timeline-item .iitem').clone()
                            tl.find('.dtime').text(new Date(timeline.created_at).toLocaleString())
                            tl.find('.timeline-body').text(timeline.status_in_text)
                            $('#parcel_history').append(tl)
                        })
                    }
                })
            }
        }
        $('#track-btn').click(function(){
            console.log('click');
            track_now()
        })
        $('#ref_no').on('search',function(){
            track_now()
        })
    </script>
@stop

@php
    function formatID($id) {
        $result = "";
        while ($id >= 1) {
            $result = strval($id % 10) . $result;
            $id /= 10;
        }
        while (strlen($result) < 6)  {
            $result = "0" . $result;
        }
        return "SH" . $result;
    }
@endphp

@section('plugins.Toastr', true)