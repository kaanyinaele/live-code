<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ServiceManagement;
use App\Sliderimage;
use App\Cmspage;
use App\Globalsetting;
use App\Subcategory;

class IndexController extends Controller
{
    
    public function Index()
    {   
       $slider=Sliderimage::where('is_delete',0)->where('status',0)->get();
       $category=ServiceManagement::where('is_delete',0)->where('active_status',0)->get();
      
       $aboutUs=Cmspage::where('slug','About-us')->first();

      
       return view('frontend.index',compact('category','slider','aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        //
    }
}
