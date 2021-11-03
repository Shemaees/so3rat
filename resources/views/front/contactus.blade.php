@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
        html,
        body {
            min-height: 100%;
            padding: 0;
            margin: 0;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
        }

        h1 {
            margin: 0 0 20px;
            font-weight: 400;
            color: #249680;
            font-weight: bold;
        }

        p {
            margin: 0 0 5px;
        }

        .main-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: white;
        }

        .form-contact {
            padding: 25px;
            margin: 25px;
            box-shadow: 0 2px 5px #f5f5f5;
            background: #f5f5f5;
            border-radius: 25px;
        }

        .fas-contact {
            margin: 25px 10px 0;
            font-size: 72px;
            color: #fff;
        }

        .fa-envelope {
            transform: rotate(-20deg) !important;
        }

        .fa-at,
        .fa-mail-bulk {
            transform: rotate(10deg) !important;
        }

        input,
        textarea {
            width: calc(100% - 18px);
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #1c87c9;
            outline: none;
        }

        input::placeholder {
            color: #666;
        }

        .button-contact {
            width: 100%;
            padding: 10px;
            border: none;
            font-size: 16px;
            font-weight: 400;
            color: #fff;
            background-color: #249680;
            font-weight: bold;
        }
        .button-contact:hover {
            background: #2371a0;
        }

        @media (min-width: 568px) {
            .main-block {
                flex-direction: row;
            }

            .left-part,
            .form-contact {
                width: 50%;
            }

            .fa-envelope {
                margin-top: 0 !important;
                margin-left: 20% !important;
            }

            .fa-at {
                margin-top: 0% !important;
                margin-left: 65% !important;
            }

            .fa-mail-bulk {
                margin-top: 2%;
                margin-left: 28%;
            }
        }

        i.fas{color: #249680ad;}
    </style>
@endsection
@section('content')
@include('front.includes.alerts.success')

    <div class="main-block">
        <div class="left-part">
            <i class="fas-contact fas fa-envelope"></i>
            <i class="fas-contact fas fa-at"></i>
            <i class="fas-contact fas fa-mail-bulk"></i>
        </div>
        <form action="{{route('save_contactus')}}" method="POST" class="form-contact">
            @csrf
            <h1> تواصل معنا</h1>
            <div class="info">
                <input class="fname" type="text" required name="name" placeholder="الاسم">
                <input type="email" name="email" required placeholder="البريد الالكتروني">
                <input type="number" name="phone" required placeholder="رقم التليفون">

            </div>
            <p>الرساله</p>
            <div>
                <textarea rows="4" name="message" required maxlength="250"></textarea>
            </div>
            <button class="button-contact" type="submit" >ارسال</button>
        </form>
    </div>
@endsection
