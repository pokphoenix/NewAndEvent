@extends('layouts.backOffice.template')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/back-office/setting/user/index.css')}}"/>
@endsection

@section('module_name', 'USER')
@section('page_name', 'INDEX')

@section('body')
<!-- START MAIN PAGE -->
<div id="user" class="x_content">
  <!-- START SEARCH BAR -->
  <section class="section-header-index">
    <form class="form-inline form-header-index">
      <div class="row">
        <table>
          <tr>
            <td class="col-1">
              <div class="col-1-content" >
                <div class="form-group select-all">
                  <input type="checkbox"  checked class="iCheck" id="selectall" name="selectall" >
                  <label for="selectall" class="iCheck-label" >Select All</label>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-default-background" onclick="window.location='{{ url("back-office/setting/user/create") }}'">
                    <span class="btn-label"><i class="fa fa-plus-square new" aria-hidden="true"></i></span ><span class="btn-label-label">NEW</span>
                  </button>
                </div>
                <div class="form-group button-2">
                  <button type="button"    class="btn btn-default-background">
                    <span class="btn-label"><span class="fa-approve-all"></span></span><span class="btn-label-label">Approve All</span>
                  </button>
				        </div>
              </div>
            </td>
            <td class="col-2">
              <div class="" >
                <div class="form-group form-fixed-width" >
                  <div class="icon-addon addon-sm">
                    <input  type="text" placeholder="SEARCH" class="form-control search" id="SEARCH" >
                    <label for="search"  class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                  </div>
                </div>
              </div>
            </td>
            <td class="col-3">

              <div class="text-right col-3-content">
                <div class="form-group">
                  <button type="button" class="btn  btn-default-background">
                    <span class="btn-label"><i class="fa fa-file-pdf-o pdf" aria-hidden="true"></i></i></span><span class="btn-label-label">PDF</span>
                  </button>
                </div>
                <div class="form-group">
                  <button type="button" class="btn  btn-default-background">
                    <span class="btn-label"><i class="fa fa-file-excel-o excel" aria-hidden="true"></i></i></span><span class="btn-label-label">Excel</span>
                  </button>
                </div>
                <div class="form-group">
                  <button type="button" class="btn  btn-default-background">
                    <span class="btn-label"><i class="fa fa-times-circle-o danger" aria-hidden="true"></i></span><span class="btn-label-label">Delete All</span>
                  </button>
                </div>
                <div class="form-group">
                  <div class="btn-group ngin-dropdown-sort">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-sort-alpha-desc"></i> SORT
                    </a>
                    <ul class="dropdown-menu dropdown-menu-form">
                      <li class="title">ORDER</li>
                      <li><input type="radio" id="radioAsc" name="rdoOrder" checked="checked" value="asc"><label for="radioAsc">Ascending</label></li>
                      <li><input type="radio" id="radioDes" name="rdoOrder" value="des"><label for="radioDes">Descending</label></li>
                      <li role="separator" class="divider"></li>
                      <li class="title">BY</li>
                      <li><input type="radio" id="radioId" name="rdoBy" checked="checked" value="id"><label for="radioId">ID</label></li>
                      <li><input type="radio" id="radioDocDate" name="rdoBy" value="doc_date"><label for="radioDocDate">Document Date</label></li>
                      <li><input type="radio" id="radioCusName" name="rdoBy" value="cus_name"><label for="radioCusName">Customer Name</label></li>
                      <li><input type="radio" id="radioAmount" name="rdoBy" value="amount"><label for="radioAmount">Amount</label></li>
                      <li><input type="radio" id="radioStatus" name="rdoBy" value="status"><label for="radioStatus">Status</label></li>
                    </ul>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </form>
	</section>
  <!-- END SEARCH BAR -->

  <!-- START USER LIST -->
  <div class="user-table">
    <table class="table ngin-table">
      <thead>
        <tr>
          <th class="blank"></th>
          <th class="image align-center"></th>
          <th class="detail"></th>
          <th class="actions align-center">
              <span>Action</span>
          </th>
        </tr>
      </thead>
    </table>

    <div class="body-table scroll-2">
      <table class="table ngin-table">
        <tbody>
          @for($i=1;$i<5;$i++)
          <tr>
            <td class="blank">
              <div class="form-group">
                  <input type="checkbox" class="iCheck item">
              </div>
      			</td>
      			<td class="image align-center">
              <div class="profile-image">
                <img src="{{asset('images/avatar.png')}}" class="profilePicture" />
              </div>
      			</td>
      			<td class="detail">
              <div class="row">
                <div class="col-xs-8">
                  <label style="font-size: 13px;">MEMBER.NUMBER: <span style="color: grey;">88888888</span></label>
                  <div class="row">
                    <div class="col-xs-6">
                      <label>FIRSTNAME:</label> <p>LOREM IPSUM</p>
                      <label>SEX:</label> <p>OTHER</p>
                      <label>E-MAIL</label> <p>user@durian.software</p>
                    </div>
                    <div class="col-xs-6">
                      <label>LASTNAME:</label> <p>DOLOR SIT</p>
                      <label>BIRTHDATE:</label> <p>04/09/2017</p>
                      <label>PHONE</label>
                      <p>+66 (0) 8-8888-8888 EXT. 8888</p>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4">
                  <label style="font-size: 13px;">REGISTER DATE: <span style="color: grey;">16/09/2017</span></label>
                  <label>NICKNAME:</label> <p>LOREM IPSUM</p>
                  <div class="status-group">
                    <label>STATUS
                      <span class="switch-status"><input type="checkbox" class="switchCheck" checked></span>
                      <span style="margin-left:1em">@if($i%3) NORMAL @else BLOCK @endif</span>
                    </label>
                  </div>
                </div>
              </div>
      			</td>
      			<td class="actions align-center">
              <div class="buttons">
                <button type="button" class="btn btn-ngin btn-default">
                  <span class="btn-label">
                    <i class="fa fa-pencil-square-o success" aria-hidden="true"></i>
                  </span>Edit
                </button>
                <button type="button" class="btn btn-ngin btn-default">
                  <span class="btn-label">
                    <i class="fa fa-files-o" aria-hidden="true"></i>
                  </span>Duplicate
                </button>
                <button type="button" class="btn btn-ngin btn-default">
                  <span class="btn-label">
                    <i class="fa fa-undo info" aria-hidden="true"></i>
                  </span>Undo
                </button>
                <button type="button" class="btn btn-ngin btn-default">
                  <span class="btn-label">
                    <i class="fa fa-times-circle-o ngin-red" aria-hidden="true"></i>
                  </span>Delete
                </button>
              </div>
    			   </td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
  </div>
  <!-- END USER LIST -->

  <!-- PAGINATION -->
  <div class="row page-showing-pagination">
    <div class="col-xs-6 showing">
      Showing 1-10 of 100
    </div>
    <div class="col-xs-6 page-pagination">
      <nav aria-label="Page navigation">
        <ul class="pagination">
          <li class="page-number">
            <a href="#" aria-label="Previous" class="not-active">
              Previous
            </a>
          </li>
          <li class="page-number  active"><a href="#">1</a></li>
          <li class="page-number"><a href="#">2</a></li>
          <li class="page-number"><a href="#">3</a></li>
          <li class="page-number"><a href="#">4</a></li>
          <li class="page-number"><a href="#">5</a></li>
          <li class="page-number">
            <a href="#" aria-label="Next" >
              Next
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- END PAGINATION -->
</div>
<!-- END MAIN PAGE -->
@endsection

@section('dummmmy')
@foreach ($data['users'] as $user)
<!-- EXAMPLE INDEX ROW -->
<div>member_number: {{ $user->member_number }}</div>
<div>first_name: {{ $user->first_name }}</div>
<div>last_name: {{ $user->last_name }}</div>
<div>nick_name: {{ $user->nick_name }}</div>
<div>image: {{ $user->image }}</div>
<div>day month year:
@if($user->day_id){{ $user->getDay->day }}@endif -
@if($user->month_id){{ $user->getMonth->month }}@endif -
@if($user->year_id){{ $user->getYear->year }}</div>@endif
<div>gender: {{ $user->gender }}</div>
<div>email: {{ $user->email }}</div>
<div>telephone: {{ $user->telephone }}</div>
<div>is_block: {{ $user->is_block }}</div>
<div>google_id: {{ $user->google_id }}</div>
<div>facebook_id: {{ $user->facebook_id }}</div>
<div>twitter_id: {{ $user->twitter_id }}</div>

<!-- COMMAND -->
<a href="{{ route('backOffice.setting.user.show', $user->id) }}">Show</a>
@if(!$user->deleted_at)
<a href="{{ route('backOffice.setting.user.edit', $user->id) }}">Edit</a>
@endif

@if( !$user->deleted_at )
<form action="{{ url('back-office/setting/user', $user->id) }}" method="post">
  <input name="_method" type="hidden" value="DELETE">
  {!! csrf_field() !!}
  <input type="submit" value="Delete">
</form>
@else
<form action="{{ url( 'back-office/setting/user/' . $user->id . '/restore') }}" method="post">
  <input name="_method" type="hidden" value="PUT">
  {!! csrf_field() !!}
  <input type="submit" value="Restore">
</form>

<form action="{{ url('back-office/setting/user', $user->id) }}" method="post">
  <input name="_method" type="hidden" value="Delete">
  {!! csrf_field() !!}
<input type="submit" value="Force Delete">
</form>
@endif
@endforeach

<!-- Pagination -->
@if(isset($_GET['search']))
{{ $data['users']->appends(['search' => $_GET['search']])->links() }}
@else
{{ $data['users']->links() }}
@endif

@endsection

@section('script')
<script src="{{ asset('js/back-office/setting/user/index.js') }}"></script>
@endsection
