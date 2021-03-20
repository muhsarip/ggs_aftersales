@extends('layouts.admin.app')

@section('title','Home')

@section('content-dashboard')
<div>
    <style>
        .card-counter {
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter:hover {
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary {
            background-color: #007bff;
            color: #FFF;
        }

        .card-counter.danger {
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success {
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info {
            background-color: #26c6da;
            color: #FFF;
        }

        .card-counter i {
            font-size: 5em;
            opacity: 0.2;
        }

        .card-counter .count-numbers {
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 32px;
            display: block;
        }

        .card-counter .count-name {
            position: absolute;
            right: 35px;
            top: 65px;
            font-style: italic;
            text-transform: capitalize;
            opacity: 0.5;
            display: block;
            font-size: 14px;
        }
    </style>
    <div class="container-fluid" style="min-height: 600px;">
        <div class="row ">
            @foreach ($widgets as $widget)
            @if (!$widget->isComplete)
            <div class="col-md-4">
                <div class="card-counter primary">
                    <i class="fa fa-code-fork"></i>
                    <span class="count-numbers">
                        {{$widget->number}}
                    </span>
                    <span class="count-name">
                        {{$widget->label}}
                    </span>
                </div>
            </div>
            @else
            <div class="col-md-4">
                <div class="card-counter success">
                    <i class="fa fa-check"></i>
                    <span class="count-numbers">
                        {{$widget->number}}
                    </span>
                    <span class="count-name">
                        {{$widget->label}}
                    </span>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

</div>
@endsection