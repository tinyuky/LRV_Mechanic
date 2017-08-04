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
            <span class="caption-subject font-green bold uppercase">PRODUCT</span>

          </div>
        </div>
        <div class="portlet-body">
          <div class="col-md-12">
                    {!! Form::open(['route' => 'product.search','method' => 'get']) !!}
                    <div class="col-md-8">
                        {{Form::text('search',null,array('class'=>'form-control'))}}
                    </div>
                    <div class="col-md-2">
                        {{Form::submit('Search',array('class'=>'btn btn-success'))}}
                    </div>
                    {!! Form::close() !!}
          </div>
          <br>
          <br>
          <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover order-column dataTable no-footer">
              <thead>
                <tr>
                  <th>#</th>
                  <th> @sortablelink('title', 'Title')</th>
                  <th> @sortablelink('price', 'Price')</th>
                  <th> @sortablelink('status', 'Status')</th>
                  <th> @sortablelink('condition', 'Condition')</th>
                  <th> @sortablelink('category.name', 'Category')</th>
                  <th> @sortablelink('branch.name', 'Branch')</th>
                  <th> @sortablelink('content', 'Content')</th>
                  <th> Options</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0;$i<count($post);$i++)
                <tr>
                  @if(request()->page=="")
                  <td>{{($i+1)}}</td>
                  @else
                  <td>{{($i+1+(request()->page-1)*5)}}</td>
                  @endif
                  <td>{{$post[$i]->title}}</td>
                  <td>{{$post[$i]->price}}</td>
                  <td>{{$post[$i]->status}}</td>
                  <td>{{$post[$i]->condition}}</td>
                  <td>{{$post[$i]->category->name}}</td>
                  <td>{{$post[$i]->branch->name}}</td>
                  @if(str_word_count($post[$i]->content)>10)
                  <td>...</td>
                  @else
                  <td>{!!$post[$i]->content!!}</td>
                  @endif
                  <td>
                    <a href="{{route('product.show',$post[$i]->id)}}"
                      class="btn btn-outline btn-circle btn-sm green-meadow">
                      <i class="fa fa-edit"></i> Edit </a>

                      <button type="button"
                      id="delete-court-button"
                      class="btn btn-outline btn-circle btn-sm red"
                      data-toggle="modal" data-target="#myModal{{$post[$i]->id}}">
                      <i class="fa fa-delete"> Delete
                      </button>
                    </td>

                  </tr>
                  @endfor
                </tbody>
              </table>
            </div>
            <div class="text-center">
              {!! $post->appends(\Request::except('page'))->render() !!}
            </div>
          </div>
        </div>
    </div>




  </div>
</div>


@foreach ($post as $p)
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
          {{ Form::open(['route' => ['product.destroy',$p->id], 'method' => 'delete']) }}
          <button type="submit" class="btn btn-danger">Delete
          </button>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

  @endforeach

@endsection
