@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'courses'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Create new course') }}</h5>
                </div>
                <form method="post" action="{{ route('courses.store') }}" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf

                        @include('alerts.success')
                        {{-- image --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" type="file"
                                    name="image" required="">
                                @include('alerts.feedback', ['field' => 'image'])
                            </div>
                        </div>
                        {{-- Name --}}
                        <div class="col-md-10">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('name') }}</label>
                                <input type="text" name="name"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    placeholder="Enter the name " value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </div>
                        {{-- category --}}
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                <label>{{ _('Type') }}</label>
                                <div class="col-xl-12 col-lg-12 col-sm-12 ">
                                    <select class="form-select form-control-sm" aria-label="Default select example"
                                        name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                                {{ $category->name }}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @include('alerts.feedback', ['field' => 'category_id'])
                            </div>
                        </div>

                        {{-- price --}}
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                <label>{{ _('Price') }}</label>
                                <input type="number" name="price"
                                    class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                    placeholder="Enter the price " value="{{ old('price') }}">
                                @include('alerts.feedback', ['field' => 'price'])
                            </div>
                        </div>
                        {{-- maximum --}}
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('maximum') ? ' has-danger' : '' }}">
                                <label>{{ _('maximum of students') }}</label>
                                <input type="number" name="maximum"
                                    class="form-control{{ $errors->has('maximum') ? ' is-invalid' : '' }}"
                                    placeholder="Enter the maximum " value="{{ old('maximum') }}">
                                @include('alerts.feedback', ['field' => 'maximum'])
                            </div>
                        </div>
                        {{-- minimum --}}
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('minimum') ? ' has-danger' : '' }}">
                                <label>{{ _('minimum of students') }}</label>
                                <input type="number" name="minimum"
                                    class="form-control{{ $errors->has('minimum') ? ' is-invalid' : '' }}"
                                    placeholder="Enter the minimum " value="{{ old('minimum') }}">
                                @include('alerts.feedback', ['field' => 'minimum'])
                            </div>
                        </div>
                        {{-- description --}}
                        <div class="col-md-10">
                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('description') }}</label>
                                <textarea type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    placeholder="Enter the description ">{{ old('description') }}</textarea>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
