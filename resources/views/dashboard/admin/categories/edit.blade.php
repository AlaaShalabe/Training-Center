@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'categories'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit category') }}</h5>
                </div>
                <form method="post" action="{{ route('categories.update', $category) }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        @include('alerts.success')
                        {{-- name --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="name"
                                value="{{ old('name', $category->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
