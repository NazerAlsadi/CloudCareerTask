@extends('layouts.admin_layout')

@section('title' , 'Edit Job Post')

@section('content')

<div class="container-fluid">
    <div class="row">


    <div class="col-md-10">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Edit Job Post</h4>
          <p class="card-category">Complete your job post</p>
        </div>
        <form method="post" action="{{ route('jobPosts.update' , $jobPost->id)  }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
        <div class="card-body">
          
          <div class="row">
                <div class="col-md-6">
                
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox"
                           name="visible"  
                           @if($jobPost->visible == 1) checked @endif>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                          <p class="text-primary">Show In Search</p>
                        </label>
                    </div>
                </td>

                
               
                </div>
            </div>

            <!-- profile, name -->
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating text-primary">Business Name</label>
                      <select name = "businessPage" id = "businessPage" class ="form-control input-lg dynamic @error('businessPage') is-invalid @enderror" data-dependent = "profile" value=""
                       >
                        <option value="" selected disabled>select business page</option>
                        @foreach ($businessPage as $page)
                            <option value = "{{$page->id}}"
                                @if($jobPost->businessPage_id== $page->id) selected='selected' @endif> {{$page->companyName}}</option>
                        @endforeach

                        </select>

                        @error('businessPage')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating text-primary">Profile</label>
                      <select name = "profile" id = "profile" class ="form-control input-lg xx @error('profile') is-invalid @enderror">
                       
                      </select>
                      @error('profile')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
              
                <div class="col-md-4">
                    
                    <div class="form-group">
                      <label class="text-primary mt-3">Business Page Name</label>
                     <br>
                      <input type="text" class="form-control alias mt-2" name="businessPageName" value="{{$jobPost->businessPageName}}">
                       
                    </div>
                </div>

            </div>

            <!-- title , department, role -->
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating text-primary">Job Title</label>
                      <input type="text" class="form-control" name= "job_title"
                      value="{{$jobPost->job_title}}">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating text-primary">Job Department</label>
                        <input type="text" class="form-control" name ="job_department"
                        value="{{$jobPost->job_department}}">
                    </div>
                </div>

              
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating text-primary">Job Role</label>
                        <input type="text" class="form-control" name = "job_Role"
                        value="{{$jobPost->job_Role}}">
                    </div>
                </div>

            </div>

            <!-- describtion -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Job Description</label>
                            <div class="form-group">
                                <label class="bmd-label-floating text-primary"> More 
                                details about this job</label>
                                <textarea class="form-control" rows="5" name="job_description"
                                >{{ $jobPost->job_description }}</textarea>
                            </div>
                    </div>
                </div>
            
            </div>

            <!-- education , skills -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Education</label>
                            <div class="form-group">
                                <label class="bmd-label-floating text-primary"> Minimun Education requied</label>
                                <textarea class="form-control" rows="5" name="education"
                                > {{$jobPost->education}}</textarea>
                            </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Skills</label>
                            <div class="form-group">
                                <label class="bmd-label-floating text-primary"> Minimum Skills requied</label>
                                <textarea class="form-control" rows="5" name="skills">
                                    {{ $jobPost->skills }}
                                </textarea>
                            </div>
                    </div>
                </div>

            </div>

            <!-- experiance -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating text-primary">Minimum Experiance</label>
                        
                        <select name = "experience_min" id = "experience_min" class ="form-control input-lg @error('experience_min') is-invalid @enderror exp_min">
                            @for($i = 0 ; $i< 26 ; $i++)
                            <option value=" {{$i}}"  @if($jobPost->experience_min== $i) selected='selected' @endif>{{$i }}</option>
                            @endfor
                        </select>

                        @error('experience_min')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating text-primary">Maximum Experiance</label>
                        <select name = "experience_max" id = "experience_max" class ="form-control input-lg @error('experience_max') is-invalid @enderror exp_max">
                           
                        </select>

                        @error('experience_max')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- country -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating text-primary">Country</label>
                      <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{$jobPost->country}}">
                      @error('country')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating text-primary">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror " name="city" value="{{$jobPost->city}}">
                        @error('city')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                </div>

              
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating text-primary">Region</label>
                        <input type="text" class="form-control @error('region') is-invalid @enderror " name="region" value="{{$jobPost->region}}">
                        @error('region')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                </div>
            </div>

            <hr>
            <!-- published at , publish end -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class=" text-primary">published at</label>
                      <input type="date" class="form-control" name="published_at"
                      value="{{$jobPost->published_at}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label class="text-primary">publish end</label>
                      
                      <input type="date" class="form-control" name="publish_end"
                      value="{{$jobPost->publish_end}}">
                    </div>
                </div>
            </div> 


            
            <button type="submit" class="btn btn-primary pull-right">Edit Job Post</button>

            <div class="clearfix"></div>
          
        </div>
        </form>
      </div>
    </div>



    
  </div>
</div>

<script src="{{url('/')}}/assets/js/core/jquery.min.js"></script>
<script >
    var profile = {{$jobPost->profile_id}};
    var max = {{$jobPost->experience_max}};

    $(document).ready(
        function(){
                console.log($(".exp_min").val());
                var len = $(".exp_min").val();
                var i;
                $('.exp_max').empty();
                for (i = len; i < 26; i++) {
                    if(i==max)
                    {
                        $(".exp_max").append("<option value = ' "+ i + " ' selected>" + i +"</option>");
                    }
                    else
                    $(".exp_max").append("<option value = ' "+ i + " '>" + i +"</option>");

                }
            });


        $(document).ready(
        function(){
            $('.exp_min').change(function(){
                console.log($(".exp_min").val());
                var len = $(".exp_min").val();
                var i;
                $('.exp_max').empty();
                for (i = len; i < 26; i++) {
                    $(".exp_max").append("<option value = '"+ i + " '>" + i +"</option>");
                }
            });
        }
    );
      
    
    $(document).ready(

        function getProfiles(){

            if($('#businessPage').val() != ''){
                var select = $('#businessPage').attr('id');
                var value = $('#businessPage').val();
                var dependent = $('#businessPage').data('dependent');
                var _token = token;

                $.ajax({
                    url: baseurl+'/fetch',
                    method : "POST",
                    data : {
                        select :select,
                        value :value ,
                        dependent :dependent,
                        _token :_token
                    },
                    success:function(result){
                        console.log(result);
                       
                        $('#profile').empty();
                        $.each(result,function(k,v){

                            if (profile == k){
                                $(".xx").append("<option value = '"+ v['id'] + "' selected>" + v['alias']+"</option>");
                            }
                            else
                            $(".xx").append("<option value = '"+ v['id'] + "'>" + v['alias']+"</option>");

                           
                            

                        });
                        // to get the name of company (business Page)
                        console.log('test:'+$("#businessPage option:selected").text());
                        // to append the value to businessPage name
                        $('.alias').val($("#businessPage option:selected").text()) ;
                    }
                });
            }
        }
    );




    $(document).ready(
        function(){
            $('.dynamic').change(function(){
                if($(this).val() != ''){
                    var select = $(this).attr('id');
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = token;

                    $.ajax({
                        url: baseurl+'/fetch',
                        method : "POST",
                        data : {
                            select :select,
                            value :value ,
                            dependent :dependent,
                            _token :_token
                        },
                        success:function(result){
                            console.log(result);
                           
                            $('#profile').empty();
                            $.each(result,function(k,v){
                                $(".xx").append("<option value = '"+ v['id'] + "'>" + v['alias']+"</option>");

                                console.log("<option value = '"+ v['id'] + "'>" + v['alias']+"</option>");
                            });
                            // to get the name of company (business Page)
                            console.log('test:'+$("#businessPage option:selected").text());
                            // to append the value to businessPage name
                            $('.alias').val($("#businessPage option:selected").text()) ;
                        }
                    });
                }
            });
    });
</script>

@endsection
