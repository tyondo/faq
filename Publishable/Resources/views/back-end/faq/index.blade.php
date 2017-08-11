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

      <div class="row">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <h3 class="text-center">Faq</h3>
                                  <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                      <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Question</th>
                                          <th>Answer</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @if(isset($faq))
                                          @foreach($faq as $question)
                                              <tr>
                                                  <td>{{$question->id}}</td>
                                                  <td><a href="{{route('tyondo.faq.edit', $question->id)}}">{{$question->question}}</a></td>
                                                  <td>{{$question->answer}}</td>
                                              </tr>
                                          @endforeach
                                      @endif
                                      </tbody>
                                  </table>
                                  <!-- ********************************************** -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection
