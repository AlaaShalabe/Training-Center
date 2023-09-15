@extends('layouts.app', ['page' => __('Typography'), 'pageSlug' => 'courses'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-5">
                    <div class="card-header">
                        <div class="row">

                            <div class="col-12 text-right">
                                <form action="{{ route('courses.destroy', $course) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn btn-danger animation-on-hover" type="submit"
                                        onclick="return confirm('Are you sure you want to delete this {{ $course->name }} ?')">Delete</button>
                                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-success">Edit</a>

                                </form>
                            </div>


                        </div>

                    </div>
                    <h5 class="card-category"></h5>
                    <h3 class="card-title"><strong><u>{{ $course->name }} </u> course</strong></h3>
                    <h5 class="card-category"></h5>
                    {{-- <h3 class="card-title">{{ $course->phone }}</h3> --}}
                </div>
                <div class="card-body">
                    <div class="typography-line">

                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Image</span> <img src="{{ asset($course->image) }}" alt="Old Photo"
                                width="90" height="90">
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>name</span>{{ $course->name }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Course type</span>{{ $course->category->name }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Minimum of stedunts</span>{{ $course->minimum }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Maximum of students</span>{{ $course->maximum }}
                        </h4>
                    </div>
                    {{-- <div class="typography-line">
                        <h4>
                            <span>Lenses type</span>{{ $course->Lenses_type }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>status</span>{{ $course->status }}
                        </h4>
                    </div> --}}

                    <div class="typography-line">
                        <span>Comments</span>
                        <blockquote>
                            <p class="blockquote blockquote-primary">
                                {{ $course->description }}
                                <br>
                                <br>

                            </p>
                        </blockquote>
                    </div>

                    <div class="typography-line">
                        <span>Lists</span>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Price</h5>
                                <ul class="list-unstyled">
                                    <li>{{ $course->price }}</li>

                                </ul>
                            </div>
                            {{-- <div class="col-md-3">
                                <h5>paid_up</h5>
                                <ul class="list-unstyled">
                                    <li>{{ $course->paid_up }}</li>

                                </ul>

                            </div>
                            <div class="col-md-3">
                                <h5>the_rest</h5>
                                <ul class="list-unstyled">
                                    <li>{{ $course->the_rest }}</li>

                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Created at</span>{{ $course->created_at->format('d M Y') }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Updated at</span>{{ $course->updated_at->format('d M Y') }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
