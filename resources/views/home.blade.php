@extends('layouts.app')

@section('content')
@if($count > 0)
<div class="row">
  <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>{{ $count }} open tickets</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tbody><tr>
                        <th>Ticket ID</th>
                        <th>Subject</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Received</th>
                      </tr>

                      <tr>
                        <td><a href="#">#{{ $tickets[0]->ticketId }}</a></td>
                        <td class="font-weight-600">{{ $tickets[0]->subject }}</td>
                        <td class="font-weight-600">{{ $tickets[0]->name }}</td>
                        <td><div class="badge badge-warning">Needs Attention</div></td>
                        <td>{{ $tickets[0]->created_at->diffForHumans() }}</td>
                      </tr>

                      <tr>
                        <td><a href="#">#{{ $tickets[1]->ticketId }}</a></td>
                        <td class="font-weight-600">{{ $tickets[1]->subject }}</td>
                        <td class="font-weight-600">{{ $tickets[1]->name }}</td>
                        <td><div class="badge badge-success">Resolved</div></td>
                        <td>{{ $tickets[1]->created_at->diffForHumans() }}</td>
                      </tr>

                      <tr>
                        <td><a href="#">#{{ $tickets[2]->ticketId }}</a></td>
                        <td class="font-weight-600">{{ $tickets[2]->subject }}</td>
                        <td class="font-weight-600">{{ $tickets[2]->name }}</td>
                        <td><div class="badge badge-success">Resolved</div></td>
                        <td>{{ $tickets[2]->created_at->diffForHumans() }}</td>
                      </tr>

                      <tr>
                        <td><a href="#">#{{ $tickets[3]->ticketId }}</a></td>
                        <td class="font-weight-600">{{ $tickets[3]->subject }}</td>
                        <td class="font-weight-600">{{ $tickets[3]->name }}</td>
                        <td><div class="badge badge-success">Resolved</div></td>
                        <td>{{ $tickets[3]->created_at->diffForHumans() }}</td>
                      </tr>

                    </tbody></table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endif
@endsection
