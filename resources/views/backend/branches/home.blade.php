@extends('layouts.mechanic_customer_layout')
@extends('layouts.mechanic_customer_header')
@extends('layouts.mechanic_customer_slidebar')
@extends('layouts.mechanic_customer_footer')
@section('content')
<div class="page-content-wrapper">
  <div class="page-content">

    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    <div class="portlet-body">
      <div class="portlet light bordered">
        <div class="portlet-title">
          <div class="caption">
            <span class="caption-subject font-green bold uppercase">BRANCHES</span>

          </div>
        </div>
        <div class="portlet-body">
          <br>
          <br>
          <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover order-column dataTable no-footer">
              <thead>
                <tr>
                  <th>#</th>
                  <th> @sortablelink('name', 'Name')</th>
                  <th> Options</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0;$i<count($posts);$i++)
                <tr>
                  @if(request()->page=="")
                  <td>{{($i+1)}}</td>
                  @else
                  <td>{{($i+1+(request()->page-1)*5)}}</td>
                  @endif
                  <td>{{$posts[$i]->name}}</td>
                  <td>
                    <a href="{{route('branches.show',$posts[$i]->id)}}"
                      class="btn btn-outline btn-circle btn-sm green-meadow">
                      <i class="fa fa-edit"></i> Edit </a>

                      <button type="button"
                      id="delete-court-button"
                      class="btn btn-outline btn-circle btn-sm red"
                      data-toggle="modal" data-target="#myModal{{$posts[$i]->id}}">
                      <i class="fa fa-delete"> Delete
                      </button>
                    </td>
                  </tr>
                @endfor
                </tbody>
              </table>
            </div>
            <div class="text-center">
              {!! $posts->appends(\Request::except('page'))->render() !!}
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@foreach ($posts as $p)
<div class="modal fade" role="dialog" id="myModal{{$p->id}}" tabindex="-1"
aria-labelledby="myModalLabel" style="display: none;">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"
      aria-label="Close"><span
      aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel"
      style="color: red">Caution</h4></div>
      <div class="modal-body">
        <h4 style="text-align: center">Are you sure to delete
          this?</h4>
        </div>
        <div class="modal-footer">
          {{ Form::open(['route' => ['branches.destroy',$p->id], 'method' => 'delete']) }}
          <button type="submit" class="btn btn-danger">Delete
          </button>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

  @endforeach



@endsection
