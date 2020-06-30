@extends('control_panel.layouts.master')
@section('title', 'All Categories')
@section('content')
    @include('control_panel/sheared/message')
    <form class="row ml-3 mb-1">
        <div class="col-10">
            <input type="text" name="q" value="{{request()->get("q")}}" class="form-control" placeholder="Enter the Search...">
        </div>
        <div class="clo-2">
            <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i>Search</button>
        </div>

    </form>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

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
                            <a href="{{route('category.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Add New Category
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                @if($category->count()>0)
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>

                    <tr>
                        <th>ID</th>
                        <th>Category Name :</th>
                        <th>Show :</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $r_category)
                    <tr>
                        <td>{{$r_category->id}}</td>
                        <td>{{$r_category->title}}</td>
                        <td><input type="checkbox"disabled class="" {{$r_category->show?"checked":""}}></td>
                        <td>
                        <form method="post" action="{{route('category.destroy',$r_category->id)}}">
                            <button onclick='return confirm("Are you sure dude?")' type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                            @csrf
                            @method("DELETE")
                        </form>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <div class="alert alert-warning"> Sorry , there is no result to your search</div>
                    @endif
                     {{$category->links()}}
                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <!-- end:: Content -->
    </div>
    @endsection
