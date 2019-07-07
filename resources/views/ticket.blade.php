@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-8">
  <div class="card">
                  <div class="card-header">
                    <h4>PC Printer not working</h4>
                    <div class="card-header-action">
                        <span class="d-block mb-2">
                          <figure class="avatar mr-2 avatar-sm" data-initial="AL"></figure> Albin Lindström (customer)
                        </span>
                        <span>
                        <figure class="avatar mr-2 avatar-sm" data-initial="S"></figure> Seil Lindström (assigned)
                      </span>
                    </div>
                  </div>


</div>
</div>
<div class="col-md-4">
  timestamps
</div>
</div>

<div class="row">
<div class="card col-md-12">
  <div class="card-body">
    <div class="media">
      <figure class="avatar mr-2 avatar-sm" data-initial="AL"></figure>
      <div class="media-body">
        <p class="mb-0">test</p>
        <div class="d-block text-right small">
          received 5 days ago
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>

                <div class="card col-md-12">
                  <div class="card-body">
                    <div class="media">
                      <figure class="avatar mr-2 avatar-sm" data-initial="S"></figure>
                      <div class="media-body">
                        <div class="alert alert-success">
                      Ticket was resolved by Seil
                    </div>
                        <hr>
                      </div>
                    </div>
                  </div>
                </div>
</div>
@endsection
