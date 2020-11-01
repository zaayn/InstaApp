@extends('layouts.app_user')

@section('content_header')
<div class="row">
    @foreach($posts as $post)
    <a href="{{route('post',$post->pid)}}">
    <div class="col-md-9 center">
        <div class="panel panel-default" id="chart">
            <div class="panel-body">
                <img src="/img/{{ $post->user->dp }}.png" class="img-circle" alt="User Image" height="40px" width="40px">
                <span>{{ $post->user->name }}</span>
                <br><br>
                <div>
                    <img src="/thum/{{ $post['image'] }}"/><br>
                </div>
                </a>   
                <div>
                    <span>
                        <i class="fa fa-heart fa-lg" style="color:red" aria-hidden="true">{{ $post->like }}</i>
                    </span>
                    <span>
                        <i class="fa fa-comment fa-lg" aria-hidden="true">{{ $commentnya }}</i>
                    </span>
                </div>
                {{ $post->caption }} <br>
            </div>
        </div> 
    </div>
    @endforeach
</div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>


google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawChart);

function drawChart()
{
 var data = google.visualization.arrayToDataTable(analytics);
 var options = {
  
 };
 var chart = new google.visualization.PieChart(document.getElementById('clientChart'));
 chart.draw(data, options);
}
        </script>
@endsection