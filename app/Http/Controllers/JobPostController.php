<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Profile;
use App\Models\BusinessPage;
use App\Models\User; 
use Auth;
use Illuminate\Http\Request;



class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_posts = JobPost::all();
        $profiles =Profile::all();
        $business_page = BusinessPage::all();

        return view('jobposts.index' , compact('job_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobPost = new JobPost();

        $businessPage = BusinessPage::all();
        
        //$x = $businessPage->profile();
        //dd($x);

        //dd($profiles);
        return view('jobposts.create' , compact('businessPage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->visible);
        $validatedData = $request->validate([
            
            'businessPage' =>'required',
            'profile' =>'required',

            'country' =>'required',
            'city' =>'required',
            'region' =>'required',
            'experience_min' =>'required',
            'experience_max' =>'required',
        ]);

        $jobPost = new JobPost();
        $jobPost->user_id = Auth::user()->id;
        $jobPost->profile_id = $request->profile ;
        $jobPost->businessPage_id = $request->businessPage ;
        //  , job_location 
        $jobPost->businessPageName = $request->businessPageName;
        $jobPost->country = $request->country ;
        $jobPost->city = $request->city ;
        $jobPost->region = $request->region ;
        $jobPost->job_title = $request->job_title ;
        $jobPost->job_department = $request->job_department ;
        $jobPost->job_Role = $request->job_Role ;
        $jobPost->skills = $request->skills ;
        $jobPost->education = $request->education ;
        $jobPost->experience_min = $request->experience_min ;
        $jobPost->experience_max = $request->experience_max ;
        $jobPost->job_description = $request->job_description ;
        $jobPost->published = 1 ;
        $jobPost->visible = $request->visible ;
        // , reviewedBy 
        $jobPost->published_at = $request->published_at ;
        $jobPost->publish_end = $request->publish_end ;
        
        $jobPost->save();
        return redirect('/jobPosts');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function show(JobPost $jobPost)
    {
        $job_post = JobPost::where('id' , $jobPost->id)->first();
        return view('jobposts.details' , compact('job_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPost $jobPost)
    {
        $jobPost = JobPost::find($jobPost->id);
        $businessPage = BusinessPage::all();
        
        
        return view('jobposts.edit' , compact('jobPost' , 'businessPage') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPost $jobPost)
    {
        //dd($request->visible);
        $jobPost = JobPost::find($jobPost->id);
        $validatedData = $request->validate([
            
            'businessPage' =>'required',
            'profile' =>'required',

            'country' =>'required',
            'city' =>'required',
            'region' =>'required',
            'experience_min' =>'required',
            'experience_max' =>'required',
        ]);

        
        $jobPost->user_id = Auth::user()->id;
        $jobPost->profile_id = $request->profile ;
        $jobPost->businessPage_id = $request->businessPage ;
        //  , job_location 
        $jobPost->businessPageName = $request->businessPageName;
        $jobPost->country = $request->country ;
        $jobPost->city = $request->city ;
        $jobPost->region = $request->region ;
        $jobPost->job_title = $request->job_title ;
        $jobPost->job_department = $request->job_department ;
        $jobPost->job_Role = $request->job_Role ;
        $jobPost->skills = $request->skills ;
        $jobPost->education = $request->education ;
        $jobPost->experience_min = $request->experience_min ;
        $jobPost->experience_max = $request->experience_max ;
        $jobPost->job_description = $request->job_description ;

        $jobPost->published = 0 ;

        if($request->visible == "on")
          $jobPost->visible = 1 ;
        else 
            $jobPost->visible = 0;
        // , reviewedBy 
        $jobPost->published_at = $request->published_at ;
        $jobPost->publish_end = $request->publish_end ;
        
        $jobPost->save();
        return redirect('/jobPosts');
        //dd($updatedJobPost);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPost $jobPost)
    {
       // dd("hello");
        $jobPost = JobPost::find($jobPost->id);

        $jobPost->delete();
        return redirect('/jobPosts');
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $profiles = BusinessPage::find($value)->profiles;
        
        return $profiles;
        
    }

    public function changeVisibility($id){

       $temp =  JobPost::find($id);

       if ($temp->visible == 1){
            $temp->visible = 0 ;
            $temp->update();
       }else{
            $temp->visible = 1 ;
            $temp->update();
       }

       return redirect('/jobPosts');
    }

    

    public function changePublish($id){

       $temp =  JobPost::find($id);

       if ($temp->published == 1){
            $temp->published = 0 ;
            $temp->update();
       }else{
            $temp->published = 1 ;
            $temp->update();
       }

       return redirect('/jobPosts');
    }
}
