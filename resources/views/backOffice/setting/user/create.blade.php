@extends('layouts.backOffice.template')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/back-office/setting/user/create.css')}}"/>
@endsection

@section('module_name', 'MODULE_NAME')
@section('page_name', 'PAGE_NAME')

@section('body')
    <!-- ERROR MESSAGES -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="x_content scroll-2">
      <form id="form-create-user" action="{{ route('backOffice.setting.user.store') }}" method="POST" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <div id="profileBox">
              <div class="media" id="accountInfo">
              <div class="media-left">
                  <div class="upload-btn-wrapper">
                      <img src="{{asset('images/avatar.png')}}" class="profilePicture">
                      <input type="file" name="myfile2" id="profilePictureField" />
                      <p class="file-name">N-JOY</p>
                  </div>
                  <div class="upload-btn-wrapper">
                      <img src="{{asset('images/avatar.png')}}" class="profilePicture">
                      <input type="file" name="myfile2" id="profilePictureField" />
                      <p class="file-name">ZENG-N</p>
                  </div>
                  <div class="form-group">
                      <label for="status">Status:</label>
                      <textarea class="form-control" rows="3"></textarea>
                  </div>
              </div>
              <div class="media-body">
                  <div class="row">
                      <div class="col-xs-6">
                          <div class="form-group">
                              <label>MEMBER NUMBER</label>
                              <input type="text" class="form-control" name="member_number" id="member_number" placeholder="member number" value="{{ old('member_number') }}" required>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="form-group">
                              <label>REGISTER DAY</label>
                              <div class="input-group date" id="datepicker" >
                                  <input type="text" class="form-control" name="create_at" id="create_at" value="{{old('created_at')}}"/>
                                  <span class="input-group-addon">
                                      <i class="fa fa-calendar" ></i>
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-6">
                          <div class="form-group">
                              <label for="">Firstname:</label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="firstname" value="{{ old('first_name') }}" required>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="form-group">
                              <label for="">Lastname:</label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="lastname" value="{{ old('last_name') }}" required>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-3">
                          <div class="form-group">
                              <label for="">Nickname:</label>
                              <input type="text" class="form-control" name="nick_name" id="nick_name" placeholder="nickname" value="{{ old('nick_name') }}" required>
                          </div>
                      </div>
                      <div class="col-xs-3">
                          <div class="form-group">
                              <label for="">Gender:</label>
                              <select id="basic" class="form-control">
                                  <option value="">-- select --</option>
                                  <option value="1" @if(old('gender') == 1) selected @endif>Male</option>
                                  <option value="2" @if(old('gender') == 2) selected @endif>Female</option>
                                  </select>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <label for="">Birthdate:</label>
                          <div class="input-group date" id="datepicker" >
                              <input type="text" class="form-control" name="birthdate" id="birthdate" value="{{old('birthdate')}}"/>
                              <span class="input-group-addon">
                                  <i class="fa fa-calendar" ></i>
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-6">
                          <div class="form-group">
                              <label for="">E-Mail:</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{ old('email') }}" required>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="form-group">
                              <label for="">Phone:</label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" value="{{ old('phone') }}" required>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-6">
                          <div class="form-group">
                              <label for="">Password:</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" value="" required>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="form-group">
                              <label for="">Confirm Password:</label>
                              <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="confirm password" value="" required>
                          </div>
                      </div>
                  </div>
              </div>
              <div id="permission">
                  <div id="staffPermission" class="table-responsive">
                      <table class="table table-nonbordered user-status">
                          <thead>
                              <tr>
                                  <th>Right:</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>
                                      <label>
                                          <input type="radio" name="permission" class="iCheck">
                                          <span>Administrator (ADMIN)</span>
                                      </label>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <label>
                                          <input type="radio" name="permission" class="iCheck" checked>
                                          <span>Staff </span>
                                      </label>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                      <table class="table table-nonbordered table-permission">
                          <thead>
                              <tr>
                                  <th style="width: 22%;">Department</th>
                                  <th style="width: 22%;">Manager</th>
                                  <th style="width: 22%;">Supervisor</th>
                                  <th style="width: 22%;">User</th>
                                  <th style="width: 22%;">Don't use</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              $permissionList = [
                                  'purchase'  => 'Purchase',
                                  'sell'      => 'Sell',
                                  'warehouse' => 'Warehouse',
                                  'marketing' => 'Marketing',
                                  'account'   => 'Account',
                                  'transport' => 'Transport',
                                  'hr'        => 'HR',
                                  'it'        => 'IT',
                              ];
                              ?>
                              @foreach($permissionList as $key=>$label)
                              <tr>
                                  <td>{{$label}}</td>
                                  <td>
                                      <label>
                                          <input type="radio" name="permission[{{$key}}]" class="iCheck" value="1" checked>
                                          <span></span>
                                      </label>
                                  </td>
                                  <td>
                                      <label>
                                          <input type="radio" name="permission[{{$key}}]" class="iCheck" value="2">
                                          <span></span>
                                      </label>
                                  </td>
                                  <td>
                                      <label>
                                          <input type="radio" name="permission[{{$key}}]" class="iCheck" value="3">
                                          <span></span>
                                      </label>
                                  </td>
                                  <td>
                                      <label>
                                          <input type="radio" name="permission[{{$key}}]" class="iCheck" value="4">
                                          <span></span>
                                      </label>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              <div class="actions" align="center">
                  <button type="submit" class="btn btn-ngin btn-default"><span class="btn-label"><i class="fa fa-floppy-o success" aria-hidden="true"></i> </span>SAVE</button>
                  <button type="button" class="btn btn-ngin btn-default"><span class="btn-label"><i class="fa fa-times-circle-o danger" aria-hidden="true"></i> </span>CANCEL</button>
              </div>
          </div>
      </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/back-office/setting/user/create.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //Set Label Header Page
            $('#lbHeaderPage').html("<h3>USER | <span>CREATE</span></h3>");
        });
    </script>

@endsection
