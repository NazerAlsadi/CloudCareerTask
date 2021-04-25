@extends('layouts.admin_layout')

@section('title' , 'JobPosts')

@section('content')

<div class="container-fluid">

  <div>
    <a href="{{ route('jobPosts.create')  }}" class="btn btn-success">Create new Job Post</a>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">

        <div class="card-header card-header-primary">
          <h4 class="card-title ">Job Posts Table</h4>
          <p class="card-category"> Here is a subtitle for this table</p>
        </div>


        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <tr>
                  <th> ID </th>
                  <th> Job title </th>
                  <th> Company </th>
                  <th> County</th>
                  <th> Opened at</th>
                  <th> Closed at</th>
                  <th> Created at</th>
                  <th> Operations </th>
                </tr>
              </thead>

              <tbody>
                @foreach($job_posts as $job_post )
                <tr>
                  <td>{{$job_post->id}}</td>

                  <td>
                    <a href="jobPosts/{{$job_post->id}}"> {{$job_post->job_title}} </a>
                  </td>

                  <td>{{$job_post->businessPageName}} </td>
                  <td>{{$job_post->country}}</td>
                  
                  <td>{{$job_post->published_at}} </td>
                  <td>{{$job_post->publish_end}} </td>
                  <td>{{$job_post->created_at}} </td>
                  <td>
                    
                    <div class="btn-group">
                      <!-- show in search -->
                      <a href="changeVisibility/{{$job_post->id}}" class="btn btn-link btn-warning" rel="tooltip" data-original-title="show in search">
                        @if($job_post->visible == 1)
                          <i class="material-icons">speaker_notes</i> 
                        @else 
                          <i class="material-icons">speaker_notes_off</i> 
                        @endif   
                      </a>

                      <!-- publish or unpublished -->
                      <a href="changePublish/{{$job_post->id}}" class="btn btn-link btn-info" style="width: 50px;"  rel="tooltip" data-original-title="publish">
                        @if($job_post->published == 1)
                          <i class="material-icons">visibility_on</i> 
                          @else 
                          <i class="material-icons">visibility_off</i> 
                        @endif
                      </a>

                      <form action="{{ route('jobPosts.destroy' , $job_post->id) }}" method="POST">
                       {{ method_field('DELETE') }}
                       {{ csrf_field() }}
                           <button rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                <i class="material-icons">delete</i>
                          </button>
                      </form>
                    </div>
                  </td>
                </tr>  
                @endforeach        
              </tbody>


            </table>

          </div>
        </div>



      </div> <!-- card -->
    </div> <!-- col-md-12 -->
           


  </div><!-- row -->
</div><!-- container-fluid -->


@endsection