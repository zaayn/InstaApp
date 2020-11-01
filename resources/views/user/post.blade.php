@extends('layouts.app_user')

@section('content_header')
<div class="row">
    
    <div class="col-md-9 center">
        <div class="panel panel-default" id="chart">
            <div class="panel-body">
                <img src="/img/{{ $post->user->dp }}.png" class="img-circle" alt="User Image" height="40px" width="40px">
                <span>{{ $post->user->name }}</span>
                <br><br>
                <div>
                    <img src="/thum/{{ $post['image'] }}"/><br>
                </div>
                <div>
                    <span>
                        <a href="{{route('update.like',$post->pid)}}"><i class="fa fa-heart fa-lg" style="color:red" aria-hidden="true">{{$post->like}}</i></a>
                    </span>
                    <span>
                        <i class="fa fa-comment fa-lg" aria-hidden="true">{{$commentnya}}</i>
                    </span>
                </div>
                {{ $post->caption }} <br><br>

                @foreach($comments as $comment)
                <ol class="breadcrumb">
                    <img src="/img/{{ $comment->user->dp }}.png" class="img-circle" alt="User Image" height="30px" width="30px">
                    {{ $comment->user->name }} <br>
                    {{ $comment->comments }} 
                </ol>
                @endforeach

                <div>
                    <form action="{{route('store.comment')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="pid" value="{{ $post->pid }}" class="form-control">
                        <div class="form-group">
                            <div class="form-group ">
                                <input type="text" class="form-control" name="comments" placeholder="comment" required>
                            </div>
                            <div>
                                {{-- <button type="submit" class="btn btn-primary ">Post</button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>

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