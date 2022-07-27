@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-8 offset-3 mt-5">
            <div class="col-md-9">
                <a href="{{ route('user#list') }}" class="text-decoration-none text-black">
                    <div class="mb-3">
                        <i class="fa-solid fa-arrow-left"></i>
                        Back
                    </div>
                </a>
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">Update User</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <form class="form-horizontal" action="{{ route('user#update') }}" method="post">
                          @csrf
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $user->name }}">
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" placeholder="Phone" name="phone" value="{{ $user->phone}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <textarea name="address" cols="30" rows="5" placeholder="Address">{{ $user->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">User Level</label>
                            <div class="col-sm-9">
                              <input type="test" class="form-control" placeholder="User Level" name="role" value="{{ $user->role }}">
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

@endsection
