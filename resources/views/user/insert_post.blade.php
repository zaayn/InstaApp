@extends('layouts.app_user')

@section('content_header')
<div class="row">
    <div class="col-md-12">
        <div class="panel block">
            <div class="panel-body">
                <h1>New Post</h1>
                <ol class="breadcrumb">
                    <li><a href="{{asset('/user/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{asset('/user/post')}}"></i>Post</a></li>
                    <li class="active">Upload Post</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
                
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel block">
            <div class="panel-body">
                  @include('admin.shared.components.alert')
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                      </div>
                  @endif

                  <br>

                <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    

                    <div class="form-group">
                        <div class="form-group col-md-12">
                	        <label class="font-weight-bold">Image</label>
                	        <input type="file" class="form-control" name="image" required>
                        </div>
                        <div class="form-group col-md-12">
                	        <label class="font-weight-bold">Caption</label>
                	        <textarea type="text" class="form-control timepicker" name="caption" placeholder="klik disini" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-lg btn-info btn-block ">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('js')
    <script>  
    //   time picker
    $(document).ready(function() {
        $(".timepicker").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
        $(".select2").select2({
        placeholder:"Pilih Customer",
        allowClear:true
        })
    });
    </script>
@endsection
