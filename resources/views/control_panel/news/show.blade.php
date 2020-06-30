@extends('control_panel.layouts.master')
@section('title', $news->title)

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">



                <!--begin::Portlet-->
                <div class="kt-portlet">

                    <!--begin::Form-->
                    <form class="kt-form" enctype="multipart/form-data" >
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="title">Title News:</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="title" id="title"  class="form-control {{$errors->has('title')?'is-invalid':''}}" value="{{$news->title}}"  disabled>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="exampleFormControlSelect1" for="category_id">Category:</label>
                                        <div class="col-lg-6">
                                            <select class="form-control {{$errors->has('category_id')?'is-invalid':''}}" aria-selected="true" id="exampleFormControlSelect1" name="category_id" id="category_id" disabled  >
                                                <option>{{$news->category_id}}</option>
                                            </select>
                                        </div>

                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="summary">Summary:</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="summary" id="summary" class="form-control {{$errors->has('summary')?'is-invalid':''}}" value="{{$news->summary}}" disabled>
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="exampleFormControlSelect1">Details:</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control {{$errors->has('detalis')?'is-invalid':''}}" id="exampleFormControlTextarea1" name="detalis" rows="3" disabled>{{$news->detalis}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-lg-3 col-form-label mr-2" for="exampleFormControlSelect1">Image:</label>
                                    @if($news->image)
                                    <img src="{{asset("storage/".$news->image)}}" width='240' class='img-thumbnail'>
                                        @endif
                                </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="published">Status:</label>
                                        <div class="col-lg-6">
                                            <div class="kt-checkbox-inline">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" id="published" name="published" {{ (old('published')?? $news->published)?"checked":"" }} disabled> Published
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
