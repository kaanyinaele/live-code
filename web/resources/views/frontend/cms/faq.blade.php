@extends('frontend.layout')
@section('content')
  <section class="inner_Privacy_Policy_section">
    <div class="faq_list-box">
      <div class="heading text-center">
        <h4>FAQ</h4>
        <div class="separator"></div>
      </div> 
      <div class="container"> 
        @foreach($faq as $data)
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button"  data-toggle="collapse" data-parent="#accordion" href="#{{$data->id}}" aria-expanded="false" aria-controls="collapseOne">
                  <span>Q: </span>{{$data->question}}
                </a>
              </h4>
            </div>
          <div id="{{$data->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
             <div class="panel-body">
             <span>A:</span>
             {!!$data->answer!!}
            </div>
          </div>
          </div>
        </div> 
        @endforeach
      </div> 
    </div>
  </section>
@endsection

