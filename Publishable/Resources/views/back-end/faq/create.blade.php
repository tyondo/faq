@extends(config('tfaq.views.layouts.master'))
@section('content')
<section class="right_col" role="main">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Add Faq</h1>
            </div>
            <div class="pull-right hidden-xs">
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="{{route('tyondo.faq.index')}}">faq</a>
                    </li>
                    <li class="active">
                        <strong>Add Faq</strong>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <section class="box ">
            <div class="content-body">
                <div class="row">
                    {!! Form::open(['route' => 'tyondo.faq.store', 'method' => 'post', 'files' => true ]) !!}
                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">

                            <div class="form-group">
                                <label class="form-label" for="field-1">Question</label>
                                <span class="desc"></span>
                                <div class="controls">
                                    {{ Form::text('question', null, ['class' => 'form-control', 'placeholder'=> 'Category']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="field-6">Answer</label>
                                <span class="desc"></span>
                                <div class="controls">
                                  {{ Form::textarea('answer', null, ['class' => 'form-control ']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>


            </div>
        </section>
    </div>


</section>
@endsection