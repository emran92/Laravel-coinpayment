@extends('layouts.master')
<!-- head -->
@section('title')
Kwatt Coin
@endsection

@section('content')
<div class="col-md-8 mt-5">
    <div class="card">        
        <div class="card-body">
            <ul class="nav nav-pills nav-fill theme-tab">
                <li class="nav-item">
                    <a class="nav-link @if(!session('validator')) active @endif" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">New Rate Add</a>
                </li>
            </ul>            
            <div class="tab-content " id="myTabContent">
                <div class="tab-pane fade @if(!session('validator'))  show active @endif" id="profile" role="tabpanel" aria-labelledby="profile-tab">                            
                    @if(session('success'))
                        <div class="alert alert-success">
                            <strong>Success : </strong>{{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            <strong>Error : </strong> {{ session('error') }}
                        </div>
                    @endif                     
                    <div class="col-md-12">
                        <form class="form-horizontal theme-form mt-5 row"  action="{{url('rate-add')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}                                             
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group col-md-6">
                                <label for="bonus">Bonus</label>
                                <input type="text" class="form-control" name="bonus" value="{{old('bonus')}}" id="" autocomplete="off">
                                @if ($errors->has('bonus'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('bonus') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kwatt_limit">Kwatt Limit</label>
                                <input type="text" class="form-control" name="kwatt_limit" value="{{old('kwatt_limit')}}" id="" autocomplete="off">
                                @if ($errors->has('kwatt_limit'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('kwatt_limit') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                            <div class="form-group col-md-12 text-right">
                                <button type="submit" class="btn-sm btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  
