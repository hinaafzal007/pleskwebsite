@extends('admin.layouts.app')

@section('css')
    
@endsection

@section('content')

<div class="content">

    @if (Session()->has('message'))
    <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ Session()->get('message') }}</strong>
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit User</small></h3>
            <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                <i class="si si-pin"></i>
            </button>
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                <i class="si si-refresh"></i>
            </button>
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                <i class="si si-close"></i>
            </button>
            </div>
        </div>

        <div class="block-content">
            <form action="{{'/admin/user/'.$user->id}}" method="post">
                @csrf
                @method('patch')

                <div class="form-group row">
                    <div class="col-md-6">
                      <div class="form-material">
                        <input type="text" required class="form-control" value="{{$user->first_name}}" id="first_name" name="first_name">
                        <label for="category">First Name</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-material">
                            <input type="text" required class="form-control" value="{{$user->last_name}}" id="last_name" name="last_name">
                            <label for="name">Last Name</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                      <div class="form-material">
                        <input type="text" readonly required class="form-control" value="{{$user->email}}" id="email" name="email" >
                        <label for="category">Email</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-material">
                            <input type="text" required class="form-control" value="{{$user->phone_no}}" id="phone_no" name="phone_no" >
                            <label for="name">Phone no</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                      <div class="form-material">
                        <input type="text" required class="form-control" value="{{$user->post_code}}" id="post_code" name="post_code" >
                        <label for="category">PostCode</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-material">
                            <input type="text" required class="form-control" value="{{$user->country}}" id="country" name="country" >
                            <label for="name">Country</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-material">
                            <select class="form-control" required id="state" name="state" onchange="getCities(this.value)">
                                <option value='{{$user->state }}'>{{$user->getState->state_name }}</option>
                                @if(count($states)>0)
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}" name="{{$state->state_name}}">{{$state->state_name}}</option> 
                                    @endforeach
                                @endif
                            </select>
                            <label for="category">State</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-material">
                            <select class="form-control" required id="city" name="city" >
                                <option value='{{$user->city }}'>{{$user->city }}</option>
                            </select>
                            <label for="category">City</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-material">
                            <textarea class="form-control" id="address" name="address" rows="2">{{$user->address}}</textarea>
                            <label for="address">Address</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-material">
                            <button type="submit" class="btn btn-alt-success btn-block" > <i class="fa fa-check"></i> Update User</button>
                        </div>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    function getCities(id)
    {
        $("#city").find("option").remove().end()
        $("#city").append(`<option value="">Choose your city...</option>`)
        $.ajax({
            method:'Get',
            url:'/get/'+id+'/city'
        }).done(function(resp){
            console.log(resp)
            var data;
            $(resp).each(function( index,val ) {
                data+='<option value='+val.city_name+'>'+val.city_name+'</option>';
            });
            $('#city').append(data);
            return;
        }).fail(function(resp){
            alert(resp+'went wrong')
            return;
        })
    }
</script>

@endsection