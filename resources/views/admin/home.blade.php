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
                <a href="{{$widget->url}}">
                    <div class="card-counter primary">
                        <i class="fa fa-code-fork"></i>
                        <span class="count-numbers">
                            {{$widget->number}}
                        </span>
                        <span class="count-name">
                            {{$widget->label}}
                        </span>
                    </div>
                </a>

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
        <div class="row mt-5">
            <div class="col-lg-12">

            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-xs-12 mx-auto">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <select id="year" class="form-control">
                                        <option value="">- Semua tahun -</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Bulan</label>
                                    <select id="month" class="form-control">
                                        <option value="">- Semua bulan -</option>
                                        @foreach (config('months') as $month)
                                        <option value="{{$month['value']}}">{{$month['label']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select id="category" class="form-control">
                                        <option value="">- Semua kategori -</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-primary btn-sm " style="margin-top:35px;"
                                    onclick="generateChart()">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">



                    <div class="col-lg-5 col-md-8 col-xs-12 mx-auto">
                        <div>
                            <p id="data-not-available" class="text-center text-danger mt-5">
                                <i class="fa fa-list"></i>
                                Data tidak tersedia.</p>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var colors = ['#FF6633', '#FFB399', '#FF33FF', '#00B3E6', 
		  '#E6B333', '#3366E6',  '#99FF99', '#B34D4D',
		  '#809900', '#6680B3', '#66991A', 
		  '#FF99E6', '#CCFF1A', '#FF1A66', '#33FFCC',
		   '#B366CC', '#4D8000', '#B33300', '#CC80CC', 
		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
		  '#E666B3', '#CC9999', '#B3B31A', '#00E680', 
		  '#4D8066', '#809980', '#E6FF80', '#999933',
		 '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',  '#99E6E6', '#6666FF'];
    const data = {
        labels: [
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [],
            backgroundColor: [  ],
            hoverOffset: 4
        }]
    };
    const config = {
        type: 'doughnut',
        data: data,
    };

    var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    async function generateChart(){

        let chartData =  await filterData()
        let {labels,values} = chartData

        config.data.labels = [...labels]
        config.data.datasets[0].data = [...values]
        config.data.datasets[0].backgroundColor = [...labels.map((item,index)=>{
            return colors[index];
        })]


        myChart.update()

        if(values.length == 0){
            $("#data-not-available").removeClass("d-none")
        }else{
            $("#data-not-available").addClass("d-none")
        }

        
    }

    function filterData(){
        $.LoadingOverlay("show");
        return new Promise((resolve,reject)=>{
            let category = document.getElementById("category").value
            let url = category == '' ?'{{route("dashboard.byAll")}}':'{{route("dashboard.byCategory")}}'
            fetch(`${url}?` + new URLSearchParams({
                year: document.getElementById("year").value,
                month: document.getElementById("month").value,
                category
            }))
            .then(res=>res.json())
            .then(res=>{
                $.LoadingOverlay("hide");
                resolve(res)
            })
            .catch(err=>{
                $.LoadingOverlay("hide");
                reject(err)
            })
        })
        
        
    }

    document.addEventListener("DOMContentLoaded", function(event) { 
        generateChart()
    });
</script>
@endsection