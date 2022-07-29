@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-8 offset-3 mt-5">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">Admin Profile</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form class="form-horizontal" action="" method="post">
                            @csrf

                          <div class="">
                            <h5>
                              <small>Name : </small>
                              <small>{{ $user->name }}<small><br>
                            <h5>
                          </div>

                          <div class="">
                              <h5>
                                <small>Email : </small>
                                <small>{{ $user->email }}<small><br>
                              <h5>
                          </div>

                          <div class="">
                              <h5>
                                <small>Phone : </small>
                                <small>{{ $user->phone }}<small><br>
                              <h5>
                          </div>

                          <div class="">
                              <h5>
                                <small>Address : </small>
                                <small>{{ $user->address }}<small><br>
                              <h5>
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

@endsection
