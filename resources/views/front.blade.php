
@extends('master')

@section('title', "Home page")

@section('content')
    <div class="frontend" data-component="frontend">
        <div class="row justify-content-center">
            <div class="col-4  heading-container">
                <div class="head">Headline Example</div>
                <div class="content">
                    A quick brown fox jumps over the lazy dog. A quick brown fox jumps over the lazy dog. A quick brown fox jumps over the lazy dog. A quick brown fox jumps over the lazy dog. A quick brown fox jumps over the lazy dog. A quick brown fox jumps over the lazy dog. A quick brown fox jumps over the lazy dog. A quick brown fox jumps over the lazy dog. A quick brown fox jumps over the lazy dog. A quick brown fox jumps over the lazy dog.
                </div>
            </div>
            <div class="col-6 ">
                <form action="lead/post" class="front-form">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label class="control-label">First Name *</label>
                                <input type="text" class="form-control first_name">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-6">
                                <label class="control-label">Last Name *</label>
                                <input type="text" class="form-control last_name" />
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="control-label">Email *</label>
                                <input type="text" class="form-control email" />
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="control-label">Phone number *</label>
                                <input type="text" class="form-control ph_number" />
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="form-control submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/app2.js') }}"></script>
@endsection