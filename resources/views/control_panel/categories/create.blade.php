@extends('control_panel.layouts.master')
@section('title','Add News')

@section('content')
     @include('control_panel/sheared/message')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">



                <!--begin::Portlet-->
                <div class="kt-portlet">

                    <!--begin::Form-->
                    <form class="kt-form" method="post" action="{{route('category.store')}}">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="title">Category Name:</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="title" id="title"  class="form-control {{$errors->has('title')?'is-invalid':''}}" value="{{old('title')}}"  placeholder="Enter The Name..">
                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="show">Status:</label>
                                        <div class="col-lg-6">
                                            <div class="kt-checkbox-inline">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox"  value="1" id="show" name="show" {{old('show')?"checked":""}} > Show
                                                    <span id="published" ></span>
                                                </label>

                                            </div>
                                        </div>
                                    </div>

                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success">Add Category</button>
                                        <a type="reset" href="{{route('news.index')}}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>

        </div>   <!--end::Form-->


                <!--end::Portlet-->
            </div>
        </div>
    </div>

@endsection
