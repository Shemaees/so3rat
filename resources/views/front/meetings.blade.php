@extends('layouts.app')

@section('style')
<style>
    .row.align-items-center {
        background-color: #f8f9fb;
        text-align: center;
    }

    .card.text-right.meeting-card {
        padding: 3%;
        margin-right: 10%;
        margin-left: 10%;
        font-size: 17px;
        line-height: 1.5;
        border: 1px solid #249680;
        border-top: 3px double #249680;
        border-radius: 25px;
    }
    .green , .green a {
        color: #249680;
    }
    .green a {
        text-decoration: underline;
        color: #249680;
    }
    .breadcrumb-bar {
        background-color: #f8f9fb;
        padding-top: 0;
    }
    .titlee{
        background-color: white;
        padding-top: 8px;
        padding-bottom: 8px;
    }
</style>
@endsection

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 titlee">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <h2 class="breadcrumb-title float-right pr-5">{{ __('front/global.Meetings') }}</h2>
                    </nav>
                    <br>
                </div>
            </div>

            <br>
            <div class="align-items-center">
                @foreach ($meetings as $meeting)
                    <div class="card text-right meeting-card">
                        <p>
                            <b>عنوان الدورة : </b> {{ $meeting->title }}
                            <br>
                            <b>نبذة عن الدورة :</b> {{ $meeting->brief }}
                            <hr style="width: 80%;">
                            <div class="green">
                                <i class="fas fa-calendar-day ml-2"></i><b>تاريخ الدورة : من   </b> {{ $meeting->from_date }}  <b>إلي</b> {{ $meeting->to_date }}
                                <br>
                                <i class="fab fa-youtube ml-2"></i><b>رابط الدورة : </b> <a target="_blank" href="{{ $meeting->link }}">{{ $meeting->link }}</a>
                            </div>
                        </p>

                        <b></b>
                    </div>
                @endforeach
            </div>

        </div>
    </div>


@endsection

@section('scripts')
    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('assets/front/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset('assets/front/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <!-- Select2 JS -->
    {{-- <script src="{{asset('assets/front/plugins/select2/js/select2.min.js')}}"></script> --}}

    <!-- Datetimepicker JS -->
    <script src="{{ asset('assets/front/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Fancybox JS -->
    <script src="{{ asset('assets/front/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
@endsection
