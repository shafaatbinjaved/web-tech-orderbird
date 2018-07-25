@extends('layouts.app')

@section('content')
<div class="container backend">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route("home")  }}">
                        All Leads
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('home') }}" method="POST">
                        @method('POST')
                        @csrf

                        <div class="row search-row">
                            <div class="col-7">

                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <input class="form-control btn-search-lead"
                                           value="{{ $search  }}"
                                           name="search"
                                           placeholder="Search lead"
                                           type="text" />
                                </div>
                            </div>
                            <div class="col-2">
                                <button class="btn" type="submit">Search</button>
                            </div>
                        </div>

                        <table class="table">
                        <tr>
                            <th>
                                <a href="{{ route("home")  }}/sort/first_name/{{ $direction  }}/{{ $search  }}">
                                    First Name
                                </a>
                            </th>
                            <th>
                                <a href="{{ route("home")  }}/sort/last_name/{{ $direction  }}/{{ $search  }}">
                                    Last Name
                                </a>
                            </th>
                            <th>
                                <a href="{{ route("home")  }}/sort/email/{{ $direction  }}/{{ $search  }}">
                                    Email
                                </a>
                            </th>
                            <th>
                                <a href="{{ route("home")  }}/sort/phone_num/{{ $direction  }}/{{ $search  }}">
                                    Phone num
                                </a>
                            </th>
                            <th>
                                <a href="{{ route("home")  }}/sort/created_at/{{ $direction  }}/{{ $search  }}">
                                    Created at
                                </a>
                            </th>
                        </tr>
                        @foreach( $leads as $lead )
                            @include('leads.lead')
                        @endforeach
                    </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
