@extends('control_panel.layouts.master')
@section('title', 'All News')
@section('content')
    @include('control_panel/sheared/message')
    <form class="row ml-3 mb-1 mt-3">
        <div class="col-6">
            <input autofocus type="text" value="{{request()->get("q")}}" name="q" class="form-control" placeholder="Enter the search..">
        </div>
        <div class="clo-2 mr-1">
            <select name="category" class="form-control">
                <option value="">Any Category</option>
                @foreach($categories as $category)
                <option {{$category->id==request()->get('category')?"selected":""}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
            </select>
        </div>
        <div class="clo-2 mr-1">
            <select name="published" class="form-control">
                <option value="">Any Status</option>
                <option value="1" {{request()->get("published") ?"selected":""}}>Selected</option>
                <option value="0" {{request()->get("published")=='0'?"selected":""}}>In Selected</option>
            </select>
        </div>
        <div class="clo-2">
            <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i>Search</button>
        </div>

    </form>
    @if($news->count()>0)
    <div class="kt-container  kt-container--fluid kt-grid__item kt-grid__item--fluid">

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">

                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-download"></i> Export
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Choose an option</span>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-print"></i>
                                                <span class="kt-nav__link-text">Print</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-copy"></i>
                                                <span class="kt-nav__link-text">Copy</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                <span class="kt-nav__link-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                <span class="kt-nav__link-text">CSV</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                <span class="kt-nav__link-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            &nbsp;
                            <a href="{{route('news.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Add New News
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>

                    <tr>
                        <th> ID</th>
                        <th>Title</th>
                        <th>Category ID</th>
                        <th>Summary</th>
                        <th>Details</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $r_news)
                    <tr>
                        <td>{{$r_news->id}}</td>
                        <td>{{$r_news->title}}</td>
                        <td>{{$r_news->category->title??''}}</td>
                        <td>{{$r_news->summary}}</td>
                        <td>{{$r_news->detalis}}</td>
                        <td><input type="checkbox" name="published" {{$r_news->published?"checked":""}} disabled></td>
                        <td width="25%">
                            <form method="post" action="{{route('news.destroy',$r_news->id)}}">
                            <a href="{{route('news.show',$r_news->id)}}" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>

                            <a href="{{route('news.edit',$r_news->id)}}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                                <button onclick='return confirm("Are you sure dude?")' type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                                @csrf
                                @method("DELETE")
                            </form>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>

           {{$news->links()}}

                <!--end: Datatable -->
            </div>
        </div>
    </div>
    @else
        <div class="alert alert-warning"> Sorry , there is no result to your search</div>
     @endif
    <!-- end:: Content -->
    </div>
    @endsection
