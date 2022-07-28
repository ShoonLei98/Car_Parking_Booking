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
                  <legend class="text-center">Create Booking</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" action="{{ route('booking#update') }}" method="post">
                          @csrf

                        <input type="hidden" class="form-control" name="customerID" value="{{ $booking->booking_id }}">
                        <input type="hidden" class="form-control" name="bookingID" value="{{ $booking->customer_id }}">
                        <input type="hidden" class="form-control" name="bookingDate" value="{{ $booking->booking_date }}">

                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Car Number</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Car Number" name="carNo" value="{{ $booking->car_number }}">
                          </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label><strong>Select Category :</strong></label><br/> --}}
                            <label for="inputServices" class="col-sm-2 col-form-label">Select Services</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="service[]" multiple="multiple">

                                    @foreach ($service as $item)

                                        @for ($i = 0; $i < count($booking->service_id); $i++)
                                        {
                                            @if ($booking->service_id[$i] == $item->service_id)
                                                <option value="{{  $item->service_id }}" selected>{{ $item->service_name }}</option>
                                            @endif
                                        }
                                        @endfor

                                        <option value="{{  $item->service_id }}">{{ $item->service_name }}</option>


                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputNote" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="note" cols="30" rows="5" placeholder="Note">{{ $booking->note }}</textarea>
                            </div>
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
