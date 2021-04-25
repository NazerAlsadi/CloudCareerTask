@extends('layouts.admin_layout')

@section('title' , 'JobPosts Details')

@section('content')

<div class="container-fluid">
  <div class="row">

    <div>
      <a href="{{ route('jobPosts.edit' ,$job_post->id )}}" class="btn btn-success">Edit Job Post</a>
    </div>

    <div class="col-sm-12">

      <div class="card card-stats">

        <div class="card-header card-header-primary">
          <h3 class="card-title">{{$job_post->job_title}}</h3>
          <div>
            {{$job_post->businessPageName}} , {{$job_post->region}} , {{$job_post->city}} , 
            {{$job_post->country}}  
          </div>
        </div>
        

        <div class="card-footer">

          <div class="container">

            <div class="row">

              <div class= "col-sm-3 text-primary"><h4><b>Job Description</b></h4></div>
              <div class= "col-sm-9">{{$job_post->job_description}} Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

            </div> <!-- row -->

            <hr>

            <div class= "row">

              <div class= "col-sm-3 text-primary"><h4><b>Skills</b></h4></div>
              <div class= "col-sm-9">{{$job_post->skills}}</div>

            </div> <!-- row -->

            <hr>


            <div class= "row">

              <div class= "col-sm-3 text-primary"><h4> <b>Job Department</b></h4></div>
              <div class= "col-sm-3">{{$job_post->  job_department}}</div>

              <div class= "col-sm-3 text-primary"><h4><b>Job Role</b></h4></div>
              <div class= "col-sm-3">{{$job_post->job_Role}}</div>

            </div> <!-- row -->



            

            <div class="row">

              <div class= "col-sm-3 text-primary"><h4><b>Education</b></h4></div>
              <div class= "col-sm-9">{{$job_post->education}}</div>

            </div>

            <hr>

            <div class="row">

              <div class= "col-sm-3 text-primary"><h4><b>Minimum experience</b></h4></div>
              <div class= "col-sm-3">{{$job_post->experience_min}}</div>

              <div class= "col-sm-3 text-primary"><h4><b>Maximum experience</b></h4></div>
              <div class= "col-sm-3">{{$job_post->experience_max}}</div>

            </div> <!-- row -->


            <div class="row">

              <div class= "col-sm-3 text-primary"><h4><b>reviewed_by</b></h4></div>
              <div class= "col-sm-9">{{$job_post->reviewed_by}}</div>

            </div> <!-- row -->

            <hr>


            <div class="row">

              <div class= "col-sm-3 text-primary"><h4><b>Published At</b></h4></div>
              <div class= "col-sm-3">{{$job_post->published_at}}</div>

              <div class= "col-sm-3 text-primary"><h4><b>Publish End</b></h4></div>
              <div class= "col-sm-3">{{$job_post->publish_end}}</div>

            </div> <!-- row -->
            <hr>


            <div class="row">

              <div class= "col-sm-3 text-primary"><h4><b>Posted In</b></h4></div>
              <div class= "col-sm-3">{{$job_post->created_at}}</div>
              
              <div class= "col-sm-3 text-primary"><h4><b>Visible</b></h4></div>
              <div class= "col-sm-3">{{$job_post->visible}}</div>

            </div> <!-- row -->


          </div><!--container  -->
            
        </div> <!--card footer-->

      </div>

    </div> <!--col-sm-12-->



  </div><!-- row -->
</div><!-- container-fluid -->


@endsection