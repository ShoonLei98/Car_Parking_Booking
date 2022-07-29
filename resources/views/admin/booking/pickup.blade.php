@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-10 offset-2 mt-5">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">Pick Up Car</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" action="" method="post">
                          @csrf

                        <div class="">
                          <h5>
                            <small>Booking Date : </small>
                            <small>{{ $pickup->booking_date }}<small><br>
                          <h5>
                        </div>

                        <div class="">
                            <h5>
                              <small>Name : </small>
                              <small>{{ $pickup->name }}<small><br>
                            <h5>
                        </div>

                        <div class="">
                            <h5>
                              <small>Email : </small>
                              <small>{{ $pickup->email }}<small><br>
                            <h5>
                        </div>

                        <div class="">
                            <h5>
                              <small>Additional Services : </small>
                              <small>{{ $pickup->service_id }}<small><br>
                            <h5>
                        </div>

                        <div class="">
                            <h5>
                              <small>Car Number : </small>
                              <small>{{ $pickup->car_number }}<small><br>
                            <h5>
                        </div>

                        <div class="">
                            <h5>
                              <small>Duration : </small>
                              <small>{{ $pickup->duration }}<small><br>
                            <h5>
                        </div>

                        <div class="">
                            <h5>
                              <small>Note : </small>
                              <small>{{ $pickup->note }}<small><br>
                            <h5>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn bg-dark text-white">Submit</button>
                            </div>
                          </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection()
