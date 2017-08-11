<?php

namespace Tyondo\Faq\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Tyondo\Faq\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if(Auth::user()->can('access.categories')){

        }*/
        $faq = Faq::all();
        return view(config('tfaq.views.back-end.faq.index'), compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*if(Auth::user()->can('create.categories')){

        }*/
        return view(config('tfaq.views.back-end.faq.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if(Auth::user()->can('store.posts')){

        }*/

        //return $request->all();

        $faqData = [
            'user_id' => isset(Auth::user()->id)?Auth::user()->id : 1,
            'question' => $request->input('question'),
            'faq_slug' => str_slug($request->input('question')) .'-'.time(),
            'faq_status' => $request->input('faq_status'),
            'answer' => $request->input('answer'),
        ];

        Faq::create($faqData);

        // $user->posts()->create($input);
        Session::flash('message', 'Post Created');
        return redirect()->route('tyondo.faq.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
