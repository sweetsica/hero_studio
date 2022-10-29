@extends('admin-template.main.master')

@section('content-page')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Danh sách nhiệm vụ</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- tasks panel -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    <div class="row" style="padding: 1%">
                                        <div class="col-sm-3 col-md-3">
                                            <a href="{{route('create.taskOrder')}}" class="btn btn-primary">
                                                <i class='uil uil-plus me-1'></i>Thêm mới yêu cầu
                                            </a>
                                        </div>
                                        <div class="col-sm-9 col-md-9">
                                            <div class="float-sm-end mt-3 mt-sm-0">
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="uil uil-sort-amount-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="#">Tuần này</a>
                                                        <a class="dropdown-item" href="#">Tháng này</a>
                                                        <a class="dropdown-item" href="#">3 Tháng gần đây</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <div class="collapse show" id="todayTasks">
                                                <div class="card mb-0 border-0">
                                                    <!-- task -->
                                                    <div class="card-body">
                                                        @foreach($infos as $data)
                                                            @if($data->status_code_text == "Đang chờ nhận")
                                                                <div class="alert alert-secondary row" role="alert">
                                                            @elseif($data->status_code_text == "Đang thực hiện")
                                                                <div class="alert alert-info row" role="alert">
                                                            @elseif($data->status_code_text == "Đã hoàn thành")
                                                                <div class="alert alert-success row" role="alert">
                                                            @else
                                                                <div class="alert alert-warning row" role="alert">
                                                            @endif
                                                            <div class="col-lg-5 mb-2 mb-lg-0" style="padding-top: 0.75rem;">
                                                                <a href="{{route('edit.taskOrder',$data->id)}}">{{$data->name}}</a>
                                                            </div>
                                                            <div class="col-lg-7 mb-2 d-sm-flex justify-content-between" style="padding-top: 0.75rem;">
                                                                <div class="row">
                                                                    <ul class="list-inline px-0 text-sm-end">
                                                                        <li class="list-inline-item pe-1">Người nhận: {{$data->member->name}}</li>
                                                                        <li class="list-inline-item pe-1"><i class='uil uil-stopwatch'></i>{{$data->product_length}} phút</li>
                                                                        <li class="list-inline-item pe-1"><i class='uil uil-schedule me-1'></i>Ngày tạo: {{$data->created_at->format('d-m-Y'.'#'.'h:i A')}}</li>
                                                                    </ul>
                                                                    <ul class="list-inline text-sm-end">
                                                                        <li class="list-inline-item">
                                                                            @if($data->status_code_text == "Đang chờ nhận")
                                                                                <span class="badge bg-secondary">
                                                                            @elseif($data->status_code_text == "Đang thực hiện")
                                                                                <div class="badge bg-info" role="alert">
                                                                            @elseif($data->status_code_text == "Đã hoàn thành")
                                                                                <div class="badge bg-success" role="alert">
                                                                            @else
                                                                                <div class="badge bg-warning" role="alert">
                                                                            @endif
                                                                                {{$data->status_code}}
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        @endforeach
                                                    </div><!-- endtask -->
                                                </div> <!-- end card -->
                                            </div> <!-- end .collapse-->
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- task details -->
                <div class="col-xl-4">
                    <div class="card row">
                        <div class="card-body">
                            <h4 class="card-title header-title">Tổng quan</h4>
                            <div class="row border-bottom justify-content-between align-items-end pt-2 pb-3">
                                <div class="col-6 col-md-5">
                                    <h6 class="text-muted mt-0 fs-14">Số yêu cầu hôm nay</h6>
                                    <h3 class="my-2">{{$count['task_today']}}</h3>
{{--                                    <h6 class="text-success mb-0">+17.98%</h6>--}}
                                </div>
                                <div class="col-5 col-md-3">
                                    <div id="chart1"
                                         data-colors="#43d39e"
                                         style="min-height: 60px;">
                                        <div
                                            id="apexchartsss9w0sk8"
                                            class="apexcharts-canvas apexchartsss9w0sk8 apexcharts-theme-light"
                                            style="width: 83px; height: 60px;">
                                            <svg
                                                id="SvgjsSvg1655"
                                                width="83"
                                                height="60"
                                                xmlns="http://www.w3.org/2000/svg"
                                                version="1.1"
                                                class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS"
                                                transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG1657"
                                                   class="apexcharts-inner apexcharts-graphical"
                                                   transform="translate(0, 0)">
                                                    <defs
                                                        id="SvgjsDefs1656">
                                                        <linearGradient
                                                            id="SvgjsLinearGradient1661"
                                                            x1="0"
                                                            y1="0"
                                                            x2="0"
                                                            y2="1">
                                                            <stop
                                                                id="SvgjsStop1662"
                                                                stop-opacity="0.4"
                                                                stop-color="rgba(216,227,240,0.4)"
                                                                offset="0"></stop>
                                                            <stop
                                                                id="SvgjsStop1663"
                                                                stop-opacity="0.5"
                                                                stop-color="rgba(190,209,230,0.5)"
                                                                offset="1"></stop>
                                                            <stop
                                                                id="SvgjsStop1664"
                                                                stop-opacity="0.5"
                                                                stop-color="rgba(190,209,230,0.5)"
                                                                offset="1"></stop>
                                                        </linearGradient>
                                                        <clipPath
                                                            id="gridRectMaskss9w0sk8">
                                                            <rect
                                                                id="SvgjsRect1667"
                                                                width="87"
                                                                height="60"
                                                                x="-2"
                                                                y="0"
                                                                rx="0"
                                                                ry="0"
                                                                opacity="1"
                                                                stroke-width="0"
                                                                stroke="none"
                                                                stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath
                                                            id="gridRectMarkerMaskss9w0sk8">
                                                            <rect
                                                                id="SvgjsRect1668"
                                                                width="87"
                                                                height="64"
                                                                x="-2"
                                                                y="-2"
                                                                rx="0"
                                                                ry="0"
                                                                opacity="1"
                                                                stroke-width="0"
                                                                stroke="none"
                                                                stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <line
                                                        id="SvgjsLine1666"
                                                        x1="0"
                                                        y1="0"
                                                        x2="0"
                                                        y2="60"
                                                        stroke-dasharray="3"
                                                        class="apexcharts-xcrosshairs"
                                                        x="0"
                                                        y="0"
                                                        width="1"
                                                        height="60"
                                                        fill="url(#SvgjsLinearGradient1661)"
                                                        filter="none"
                                                        fill-opacity="0.9"
                                                        stroke-width="0"></line>
                                                    <g id="SvgjsG1683"
                                                       class="apexcharts-xaxis"
                                                       transform="translate(0, 0)">
                                                        <g id="SvgjsG1684"
                                                           class="apexcharts-xaxis-texts-g"
                                                           transform="translate(0, 2.75)"></g>
                                                    </g>
                                                    <g id="SvgjsG1697"
                                                       class="apexcharts-grid">
                                                        <g id="SvgjsG1698"
                                                           class="apexcharts-gridlines-horizontal"
                                                           style="display: none;">
                                                            <line
                                                                id="SvgjsLine1700"
                                                                x1="0"
                                                                y1="0"
                                                                x2="83"
                                                                y2="0"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1701"
                                                                x1="0"
                                                                y1="12"
                                                                x2="83"
                                                                y2="12"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1702"
                                                                x1="0"
                                                                y1="24"
                                                                x2="83"
                                                                y2="24"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1703"
                                                                x1="0"
                                                                y1="36"
                                                                x2="83"
                                                                y2="36"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1704"
                                                                x1="0"
                                                                y1="48"
                                                                x2="83"
                                                                y2="48"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1705"
                                                                x1="0"
                                                                y1="60"
                                                                x2="83"
                                                                y2="60"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG1699"
                                                           class="apexcharts-gridlines-vertical"
                                                           style="display: none;"></g>
                                                        <line
                                                            id="SvgjsLine1707"
                                                            x1="0"
                                                            y1="60"
                                                            x2="83"
                                                            y2="60"
                                                            stroke="transparent"
                                                            stroke-dasharray="0"></line>
                                                        <line
                                                            id="SvgjsLine1706"
                                                            x1="0"
                                                            y1="1"
                                                            x2="0"
                                                            y2="60"
                                                            stroke="transparent"
                                                            stroke-dasharray="0"></line>
                                                    </g>
                                                    <g id="SvgjsG1669"
                                                       class="apexcharts-bar-series apexcharts-plot-series">
                                                        <g id="SvgjsG1670"
                                                           class="apexcharts-series"
                                                           rel="1"
                                                           seriesName="seriesx1"
                                                           data:realIndex="0">
                                                            <path
                                                                id="SvgjsPath1672"
                                                                d="M 0.7545454545454549 60L 0.7545454545454549 45Q 0.7545454545454549 45 0.7545454545454549 45L 6.790909090909091 45Q 6.790909090909091 45 6.790909090909091 45L 6.790909090909091 45L 6.790909090909091 60L 6.790909090909091 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 0.7545454545454549 60L 0.7545454545454549 45Q 0.7545454545454549 45 0.7545454545454549 45L 6.790909090909091 45Q 6.790909090909091 45 6.790909090909091 45L 6.790909090909091 45L 6.790909090909091 60L 6.790909090909091 60z"
                                                                pathFrom="M 0.7545454545454549 60L 0.7545454545454549 60L 6.790909090909091 60L 6.790909090909091 60L 6.790909090909091 60L 6.790909090909091 60L 6.790909090909091 60L 0.7545454545454549 60"
                                                                cy="45"
                                                                cx="8.3"
                                                                j="0"
                                                                val="25"
                                                                barHeight="15"
                                                                barWidth="6.036363636363636"></path>
                                                            <path
                                                                id="SvgjsPath1673"
                                                                d="M 8.3 60L 8.3 20.4Q 8.3 20.4 8.3 20.4L 14.336363636363636 20.4Q 14.336363636363636 20.4 14.336363636363636 20.4L 14.336363636363636 20.4L 14.336363636363636 60L 14.336363636363636 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 8.3 60L 8.3 20.4Q 8.3 20.4 8.3 20.4L 14.336363636363636 20.4Q 14.336363636363636 20.4 14.336363636363636 20.4L 14.336363636363636 20.4L 14.336363636363636 60L 14.336363636363636 60z"
                                                                pathFrom="M 8.3 60L 8.3 60L 14.336363636363636 60L 14.336363636363636 60L 14.336363636363636 60L 14.336363636363636 60L 14.336363636363636 60L 8.3 60"
                                                                cy="20.4"
                                                                cx="15.845454545454547"
                                                                j="1"
                                                                val="66"
                                                                barHeight="39.6"
                                                                barWidth="6.036363636363636"></path>
                                                            <path
                                                                id="SvgjsPath1674"
                                                                d="M 15.845454545454547 60L 15.845454545454547 35.400000000000006Q 15.845454545454547 35.400000000000006 15.845454545454547 35.400000000000006L 21.881818181818183 35.400000000000006Q 21.881818181818183 35.400000000000006 21.881818181818183 35.400000000000006L 21.881818181818183 35.400000000000006L 21.881818181818183 60L 21.881818181818183 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 15.845454545454547 60L 15.845454545454547 35.400000000000006Q 15.845454545454547 35.400000000000006 15.845454545454547 35.400000000000006L 21.881818181818183 35.400000000000006Q 21.881818181818183 35.400000000000006 21.881818181818183 35.400000000000006L 21.881818181818183 35.400000000000006L 21.881818181818183 60L 21.881818181818183 60z"
                                                                pathFrom="M 15.845454545454547 60L 15.845454545454547 60L 21.881818181818183 60L 21.881818181818183 60L 21.881818181818183 60L 21.881818181818183 60L 21.881818181818183 60L 15.845454545454547 60"
                                                                cy="35.400000000000006"
                                                                cx="23.390909090909094"
                                                                j="2"
                                                                val="41"
                                                                barHeight="24.599999999999998"
                                                                barWidth="6.036363636363636"></path>
                                                            <path
                                                                id="SvgjsPath1675"
                                                                d="M 23.390909090909094 60L 23.390909090909094 6.600000000000001Q 23.390909090909094 6.600000000000001 23.390909090909094 6.600000000000001L 29.42727272727273 6.600000000000001Q 29.42727272727273 6.600000000000001 29.42727272727273 6.600000000000001L 29.42727272727273 6.600000000000001L 29.42727272727273 60L 29.42727272727273 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 23.390909090909094 60L 23.390909090909094 6.600000000000001Q 23.390909090909094 6.600000000000001 23.390909090909094 6.600000000000001L 29.42727272727273 6.600000000000001Q 29.42727272727273 6.600000000000001 29.42727272727273 6.600000000000001L 29.42727272727273 6.600000000000001L 29.42727272727273 60L 29.42727272727273 60z"
                                                                pathFrom="M 23.390909090909094 60L 23.390909090909094 60L 29.42727272727273 60L 29.42727272727273 60L 29.42727272727273 60L 29.42727272727273 60L 29.42727272727273 60L 23.390909090909094 60"
                                                                cy="6.600000000000001"
                                                                cx="30.93636363636364"
                                                                j="3"
                                                                val="89"
                                                                barHeight="53.4"
                                                                barWidth="6.036363636363636"></path>
                                                            <path
                                                                id="SvgjsPath1676"
                                                                d="M 30.93636363636364 60L 30.93636363636364 22.200000000000003Q 30.93636363636364 22.200000000000003 30.93636363636364 22.200000000000003L 36.972727272727276 22.200000000000003Q 36.972727272727276 22.200000000000003 36.972727272727276 22.200000000000003L 36.972727272727276 22.200000000000003L 36.972727272727276 60L 36.972727272727276 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 30.93636363636364 60L 30.93636363636364 22.200000000000003Q 30.93636363636364 22.200000000000003 30.93636363636364 22.200000000000003L 36.972727272727276 22.200000000000003Q 36.972727272727276 22.200000000000003 36.972727272727276 22.200000000000003L 36.972727272727276 22.200000000000003L 36.972727272727276 60L 36.972727272727276 60z"
                                                                pathFrom="M 30.93636363636364 60L 30.93636363636364 60L 36.972727272727276 60L 36.972727272727276 60L 36.972727272727276 60L 36.972727272727276 60L 36.972727272727276 60L 30.93636363636364 60"
                                                                cy="22.200000000000003"
                                                                cx="38.481818181818184"
                                                                j="4"
                                                                val="63"
                                                                barHeight="37.8"
                                                                barWidth="6.036363636363636"></path>
                                                            <path
                                                                id="SvgjsPath1677"
                                                                d="M 38.481818181818184 60L 38.481818181818184 45Q 38.481818181818184 45 38.481818181818184 45L 44.51818181818182 45Q 44.51818181818182 45 44.51818181818182 45L 44.51818181818182 45L 44.51818181818182 60L 44.51818181818182 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 38.481818181818184 60L 38.481818181818184 45Q 38.481818181818184 45 38.481818181818184 45L 44.51818181818182 45Q 44.51818181818182 45 44.51818181818182 45L 44.51818181818182 45L 44.51818181818182 60L 44.51818181818182 60z"
                                                                pathFrom="M 38.481818181818184 60L 38.481818181818184 60L 44.51818181818182 60L 44.51818181818182 60L 44.51818181818182 60L 44.51818181818182 60L 44.51818181818182 60L 38.481818181818184 60"
                                                                cy="45"
                                                                cx="46.02727272727273"
                                                                j="5"
                                                                val="25"
                                                                barHeight="15"
                                                                barWidth="6.036363636363636"></path>
                                                            <path
                                                                id="SvgjsPath1678"
                                                                d="M 46.02727272727273 60L 46.02727272727273 33.6Q 46.02727272727273 33.6 46.02727272727273 33.6L 52.06363636363637 33.6Q 52.06363636363637 33.6 52.06363636363637 33.6L 52.06363636363637 33.6L 52.06363636363637 60L 52.06363636363637 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 46.02727272727273 60L 46.02727272727273 33.6Q 46.02727272727273 33.6 46.02727272727273 33.6L 52.06363636363637 33.6Q 52.06363636363637 33.6 52.06363636363637 33.6L 52.06363636363637 33.6L 52.06363636363637 60L 52.06363636363637 60z"
                                                                pathFrom="M 46.02727272727273 60L 46.02727272727273 60L 52.06363636363637 60L 52.06363636363637 60L 52.06363636363637 60L 52.06363636363637 60L 52.06363636363637 60L 46.02727272727273 60"
                                                                cy="33.6"
                                                                cx="53.57272727272728"
                                                                j="6"
                                                                val="44"
                                                                barHeight="26.4"
                                                                barWidth="6.036363636363636"></path>
                                                            <path
                                                                id="SvgjsPath1679"
                                                                d="M 53.57272727272728 60L 53.57272727272728 52.8Q 53.57272727272728 52.8 53.57272727272728 52.8L 59.60909090909092 52.8Q 59.60909090909092 52.8 59.60909090909092 52.8L 59.60909090909092 52.8L 59.60909090909092 60L 59.60909090909092 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 53.57272727272728 60L 53.57272727272728 52.8Q 53.57272727272728 52.8 53.57272727272728 52.8L 59.60909090909092 52.8Q 59.60909090909092 52.8 59.60909090909092 52.8L 59.60909090909092 52.8L 59.60909090909092 60L 59.60909090909092 60z"
                                                                pathFrom="M 53.57272727272728 60L 53.57272727272728 60L 59.60909090909092 60L 59.60909090909092 60L 59.60909090909092 60L 59.60909090909092 60L 59.60909090909092 60L 53.57272727272728 60"
                                                                cy="52.8"
                                                                cx="61.118181818181824"
                                                                j="7"
                                                                val="12"
                                                                barHeight="7.199999999999999"
                                                                barWidth="6.036363636363636"></path>
                                                            <path
                                                                id="SvgjsPath1680"
                                                                d="M 61.118181818181824 60L 61.118181818181824 38.400000000000006Q 61.118181818181824 38.400000000000006 61.118181818181824 38.400000000000006L 67.15454545454546 38.400000000000006Q 67.15454545454546 38.400000000000006 67.15454545454546 38.400000000000006L 67.15454545454546 38.400000000000006L 67.15454545454546 60L 67.15454545454546 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 61.118181818181824 60L 61.118181818181824 38.400000000000006Q 61.118181818181824 38.400000000000006 61.118181818181824 38.400000000000006L 67.15454545454546 38.400000000000006Q 67.15454545454546 38.400000000000006 67.15454545454546 38.400000000000006L 67.15454545454546 38.400000000000006L 67.15454545454546 60L 67.15454545454546 60z"
                                                                pathFrom="M 61.118181818181824 60L 61.118181818181824 60L 67.15454545454546 60L 67.15454545454546 60L 67.15454545454546 60L 67.15454545454546 60L 67.15454545454546 60L 61.118181818181824 60"
                                                                cy="38.400000000000006"
                                                                cx="68.66363636363637"
                                                                j="8"
                                                                val="36"
                                                                barHeight="21.599999999999998"
                                                                barWidth="6.036363636363636"></path>
                                                            <path
                                                                id="SvgjsPath1681"
                                                                d="M 68.66363636363637 60L 68.66363636363637 54.6Q 68.66363636363637 54.6 68.66363636363637 54.6L 74.7 54.6Q 74.7 54.6 74.7 54.6L 74.7 54.6L 74.7 60L 74.7 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 68.66363636363637 60L 68.66363636363637 54.6Q 68.66363636363637 54.6 68.66363636363637 54.6L 74.7 54.6Q 74.7 54.6 74.7 54.6L 74.7 54.6L 74.7 60L 74.7 60z"
                                                                pathFrom="M 68.66363636363637 60L 68.66363636363637 60L 74.7 60L 74.7 60L 74.7 60L 74.7 60L 74.7 60L 68.66363636363637 60"
                                                                cy="54.6"
                                                                cx="76.20909090909092"
                                                                j="9"
                                                                val="9"
                                                                barHeight="5.3999999999999995"
                                                                barWidth="6.036363636363636"></path>
                                                            <path
                                                                id="SvgjsPath1682"
                                                                d="M 76.20909090909092 60L 76.20909090909092 27.6Q 76.20909090909092 27.6 76.20909090909092 27.6L 82.24545454545455 27.6Q 82.24545454545455 27.6 82.24545454545455 27.6L 82.24545454545455 27.6L 82.24545454545455 60L 82.24545454545455 60z"
                                                                fill="rgba(67,211,158,0.85)"
                                                                fill-opacity="1"
                                                                stroke-opacity="1"
                                                                stroke-linecap="round"
                                                                stroke-width="0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-bar-area"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskss9w0sk8)"
                                                                pathTo="M 76.20909090909092 60L 76.20909090909092 27.6Q 76.20909090909092 27.6 76.20909090909092 27.6L 82.24545454545455 27.6Q 82.24545454545455 27.6 82.24545454545455 27.6L 82.24545454545455 27.6L 82.24545454545455 60L 82.24545454545455 60z"
                                                                pathFrom="M 76.20909090909092 60L 76.20909090909092 60L 82.24545454545455 60L 82.24545454545455 60L 82.24545454545455 60L 82.24545454545455 60L 82.24545454545455 60L 76.20909090909092 60"
                                                                cy="27.6"
                                                                cx="83.75454545454546"
                                                                j="10"
                                                                val="54"
                                                                barHeight="32.4"
                                                                barWidth="6.036363636363636"></path>
                                                        </g>
                                                        <g id="SvgjsG1671"
                                                           class="apexcharts-datalabels"
                                                           data:realIndex="0"></g>
                                                    </g>
                                                    <line
                                                        id="SvgjsLine1708"
                                                        x1="0"
                                                        y1="0"
                                                        x2="83"
                                                        y2="0"
                                                        stroke="#b6b6b6"
                                                        stroke-dasharray="0"
                                                        stroke-width="1"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line
                                                        id="SvgjsLine1709"
                                                        x1="0"
                                                        y1="0"
                                                        x2="83"
                                                        y2="0"
                                                        stroke-dasharray="0"
                                                        stroke-width="0"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG1710"
                                                       class="apexcharts-yaxis-annotations"></g>
                                                    <g id="SvgjsG1711"
                                                       class="apexcharts-xaxis-annotations"></g>
                                                    <g id="SvgjsG1712"
                                                       class="apexcharts-point-annotations"></g>
                                                </g>
                                                <rect
                                                    id="SvgjsRect1665"
                                                    width="0"
                                                    height="0"
                                                    x="0"
                                                    y="0" rx="0"
                                                    ry="0"
                                                    opacity="1"
                                                    stroke-width="0"
                                                    stroke="none"
                                                    stroke-dasharray="0"
                                                    fill="#fefefe"></rect>
                                                <g id="SvgjsG1696"
                                                   class="apexcharts-yaxis"
                                                   rel="0"
                                                   transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG1658"
                                                   class="apexcharts-annotations"></g>
                                            </svg>
                                            <div
                                                class="apexcharts-legend"
                                                style="max-height: 30px;"></div>
                                            <div
                                                class="apexcharts-tooltip apexcharts-theme-light">
                                                <div
                                                    class="apexcharts-tooltip-series-group"
                                                    style="order: 1;">
                                                                                                    <span
                                                                                                        class="apexcharts-tooltip-marker"
                                                                                                        style="background-color: rgb(67, 211, 158);"></span>
                                                    <div
                                                        class="apexcharts-tooltip-text"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        <div
                                                            class="apexcharts-tooltip-y-group">
                                                                                                            <span
                                                                                                                class="apexcharts-tooltip-text-label"></span><span
                                                                class="apexcharts-tooltip-text-value"></span>
                                                        </div>
                                                        <div
                                                            class="apexcharts-tooltip-z-group">
                                                                                                            <span
                                                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                <div
                                                    class="apexcharts-yaxistooltip-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="resize-triggers">
                                        <div
                                            class="expand-trigger">
                                            <div
                                                style="width: 108px; height: 61px;"></div>
                                        </div>
                                        <div
                                            class="contract-trigger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom justify-content-between align-items-end py-3">
                                <div class="col-6 col-md-5">
                                    <h6 class="text-muted mt-0 fs-14">Đã hoàn thành hôm nay</h6>
                                    <h3 class="my-2">{{$count['task_done_today']}}</h3>
{{--                                    <h6 class="text-success mb-0">+24.98%</h6>--}}
                                </div>
                                <div class="col-5 col-md-3">
                                    <div id="chart2" data-colors="#ff5c75" style="min-height: 60px;">
                                        <div d="apexchartsba0my24b" class="apexcharts-canvas apexchartsba0my24b apexcharts-theme-light" style="width: 83px; height: 60px;">
                                            <svg
                                                id="SvgjsSvg1714"
                                                width="83"
                                                height="60"
                                                xmlns="http://www.w3.org/2000/svg"
                                                version="1.1"
                                                class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS"
                                                transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG1716"
                                                   class="apexcharts-inner apexcharts-graphical"
                                                   transform="translate(0, 0)">
                                                    <defs
                                                        id="SvgjsDefs1715">
                                                        <clipPath
                                                            id="gridRectMaskba0my24b">
                                                            <rect
                                                                id="SvgjsRect1722"
                                                                width="89"
                                                                height="62"
                                                                x="-3"
                                                                y="-1"
                                                                rx="0"
                                                                ry="0"
                                                                opacity="1"
                                                                stroke-width="0"
                                                                stroke="none"
                                                                stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath
                                                            id="gridRectMarkerMaskba0my24b">
                                                            <rect
                                                                id="SvgjsRect1723"
                                                                width="87"
                                                                height="64"
                                                                x="-2"
                                                                y="-2"
                                                                rx="0"
                                                                ry="0"
                                                                opacity="1"
                                                                stroke-width="0"
                                                                stroke="none"
                                                                stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <line
                                                        id="SvgjsLine1721"
                                                        x1="0"
                                                        y1="0"
                                                        x2="0"
                                                        y2="60"
                                                        stroke="#b6b6b6"
                                                        stroke-dasharray="3"
                                                        class="apexcharts-xcrosshairs"
                                                        x="0"
                                                        y="0"
                                                        width="1"
                                                        height="60"
                                                        fill="#b1b9c4"
                                                        filter="none"
                                                        fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <g id="SvgjsG1729"
                                                       class="apexcharts-xaxis"
                                                       transform="translate(0, 0)">
                                                        <g id="SvgjsG1730"
                                                           class="apexcharts-xaxis-texts-g"
                                                           transform="translate(0, 2.75)"></g>
                                                    </g>
                                                    <g id="SvgjsG1743"
                                                       class="apexcharts-grid">
                                                        <g id="SvgjsG1744"
                                                           class="apexcharts-gridlines-horizontal"
                                                           style="display: none;">
                                                            <line
                                                                id="SvgjsLine1746"
                                                                x1="0"
                                                                y1="0"
                                                                x2="83"
                                                                y2="0"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1747"
                                                                x1="0"
                                                                y1="12"
                                                                x2="83"
                                                                y2="12"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1748"
                                                                x1="0"
                                                                y1="24"
                                                                x2="83"
                                                                y2="24"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1749"
                                                                x1="0"
                                                                y1="36"
                                                                x2="83"
                                                                y2="36"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1750"
                                                                x1="0"
                                                                y1="48"
                                                                x2="83"
                                                                y2="48"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1751"
                                                                x1="0"
                                                                y1="60"
                                                                x2="83"
                                                                y2="60"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG1745"
                                                           class="apexcharts-gridlines-vertical"
                                                           style="display: none;"></g>
                                                        <line
                                                            id="SvgjsLine1753"
                                                            x1="0"
                                                            y1="60"
                                                            x2="83"
                                                            y2="60"
                                                            stroke="transparent"
                                                            stroke-dasharray="0"></line>
                                                        <line
                                                            id="SvgjsLine1752"
                                                            x1="0"
                                                            y1="1"
                                                            x2="0"
                                                            y2="60"
                                                            stroke="transparent"
                                                            stroke-dasharray="0"></line>
                                                    </g>
                                                    <g id="SvgjsG1724"
                                                       class="apexcharts-line-series apexcharts-plot-series">
                                                        <g id="SvgjsG1725"
                                                           class="apexcharts-series"
                                                           seriesName="seriesx1"
                                                           data:longestSeries="true"
                                                           rel="1"
                                                           data:realIndex="0">
                                                            <path
                                                                id="SvgjsPath1728"
                                                                d="M 0 45C 2.9050000000000002 45 5.3950000000000005 20.4 8.3 20.4C 11.205000000000002 20.4 13.695 35.400000000000006 16.6 35.400000000000006C 19.505 35.400000000000006 21.995 6.600000000000001 24.9 6.600000000000001C 27.805 6.600000000000001 30.295 22.200000000000003 33.2 22.200000000000003C 36.105000000000004 22.200000000000003 38.595 45 41.5 45C 44.405 45 46.894999999999996 33.6 49.8 33.6C 52.705 33.6 55.195 52.8 58.1 52.8C 61.005 52.8 63.495000000000005 38.400000000000006 66.4 38.400000000000006C 69.305 38.400000000000006 71.795 54.6 74.7 54.6C 77.605 54.6 80.095 27.6 83 27.6"
                                                                fill="none"
                                                                fill-opacity="1"
                                                                stroke="rgba(255,92,117,0.85)"
                                                                stroke-opacity="1"
                                                                stroke-linecap="butt"
                                                                stroke-width="2"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-line"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskba0my24b)"
                                                                pathTo="M 0 45C 2.9050000000000002 45 5.3950000000000005 20.4 8.3 20.4C 11.205000000000002 20.4 13.695 35.400000000000006 16.6 35.400000000000006C 19.505 35.400000000000006 21.995 6.600000000000001 24.9 6.600000000000001C 27.805 6.600000000000001 30.295 22.200000000000003 33.2 22.200000000000003C 36.105000000000004 22.200000000000003 38.595 45 41.5 45C 44.405 45 46.894999999999996 33.6 49.8 33.6C 52.705 33.6 55.195 52.8 58.1 52.8C 61.005 52.8 63.495000000000005 38.400000000000006 66.4 38.400000000000006C 69.305 38.400000000000006 71.795 54.6 74.7 54.6C 77.605 54.6 80.095 27.6 83 27.6"
                                                                pathFrom="M -1 60L -1 60L 8.3 60L 16.6 60L 24.9 60L 33.2 60L 41.5 60L 49.8 60L 58.1 60L 66.4 60L 74.7 60L 83 60"></path>
                                                            <g id="SvgjsG1726"
                                                               class="apexcharts-series-markers-wrap"
                                                               data:realIndex="0">
                                                                <g class="apexcharts-series-markers">
                                                                    <circle
                                                                        id="SvgjsCircle1759"
                                                                        r="0"
                                                                        cx="0"
                                                                        cy="0"
                                                                        class="apexcharts-marker wxtxavhjl no-pointer-events"
                                                                        stroke="#ffffff"
                                                                        fill="#ff5c75"
                                                                        fill-opacity="1"
                                                                        stroke-width="2"
                                                                        stroke-opacity="0.9"
                                                                        default-marker-size="0"></circle>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1727"
                                                           class="apexcharts-datalabels"
                                                           data:realIndex="0"></g>
                                                    </g>
                                                    <line
                                                        id="SvgjsLine1754"
                                                        x1="0"
                                                        y1="0"
                                                        x2="83"
                                                        y2="0"
                                                        stroke="#b6b6b6"
                                                        stroke-dasharray="0"
                                                        stroke-width="1"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line
                                                        id="SvgjsLine1755"
                                                        x1="0"
                                                        y1="0"
                                                        x2="83"
                                                        y2="0"
                                                        stroke-dasharray="0"
                                                        stroke-width="0"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG1756"
                                                       class="apexcharts-yaxis-annotations"></g>
                                                    <g id="SvgjsG1757"
                                                       class="apexcharts-xaxis-annotations"></g>
                                                    <g id="SvgjsG1758"
                                                       class="apexcharts-point-annotations"></g>
                                                </g>
                                                <rect
                                                    id="SvgjsRect1720"
                                                    width="0"
                                                    height="0"
                                                    x="0"
                                                    y="0" rx="0"
                                                    ry="0"
                                                    opacity="1"
                                                    stroke-width="0"
                                                    stroke="none"
                                                    stroke-dasharray="0"
                                                    fill="#fefefe"></rect>
                                                <g id="SvgjsG1742"
                                                   class="apexcharts-yaxis"
                                                   rel="0"
                                                   transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG1717"
                                                   class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend" style="max-height: 30px;"></div>
                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                    <span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 92, 117);"></span>
                                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group">
                                                            <span class="apexcharts-tooltip-text-label"></span>
                                                            <span class="apexcharts-tooltip-text-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-z-group">
                                                            <span class="apexcharts-tooltip-text-z-label"></span>
                                                            <span class="apexcharts-tooltip-text-z-value"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                <div
                                                    class="apexcharts-yaxistooltip-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="resize-triggers">
                                        <div
                                            class="expand-trigger">
                                            <div
                                                style="width: 108px; height: 61px;"></div>
                                        </div>
                                        <div
                                            class="contract-trigger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom justify-content-between align-items-end py-3">
                                <div class="col-6 col-md-5">
                                    <h6 class="text-muted mt-0 fs-14">Tổng thời lượng hôm nay</h6>
                                    <h3 class="my-2">{{$count['task_sum_length_today']}}</h3>
{{--                                    <h6 class="text-success mb-0">+24.98%</h6>--}}
                                </div>
                                <div class="col-5 col-md-3">
                                    <div id="chart2" data-colors="#ff5c75" style="min-height: 60px;">
                                        <div d="apexchartsba0my24b" class="apexcharts-canvas apexchartsba0my24b apexcharts-theme-light" style="width: 83px; height: 60px;">
                                            <svg
                                                id="SvgjsSvg1714"
                                                width="83"
                                                height="60"
                                                xmlns="http://www.w3.org/2000/svg"
                                                version="1.1"
                                                class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS"
                                                transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG1716"
                                                   class="apexcharts-inner apexcharts-graphical"
                                                   transform="translate(0, 0)">
                                                    <defs
                                                        id="SvgjsDefs1715">
                                                        <clipPath
                                                            id="gridRectMaskba0my24b">
                                                            <rect
                                                                id="SvgjsRect1722"
                                                                width="89"
                                                                height="62"
                                                                x="-3"
                                                                y="-1"
                                                                rx="0"
                                                                ry="0"
                                                                opacity="1"
                                                                stroke-width="0"
                                                                stroke="none"
                                                                stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath
                                                            id="gridRectMarkerMaskba0my24b">
                                                            <rect
                                                                id="SvgjsRect1723"
                                                                width="87"
                                                                height="64"
                                                                x="-2"
                                                                y="-2"
                                                                rx="0"
                                                                ry="0"
                                                                opacity="1"
                                                                stroke-width="0"
                                                                stroke="none"
                                                                stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <line
                                                        id="SvgjsLine1721"
                                                        x1="0"
                                                        y1="0"
                                                        x2="0"
                                                        y2="60"
                                                        stroke="#b6b6b6"
                                                        stroke-dasharray="3"
                                                        class="apexcharts-xcrosshairs"
                                                        x="0"
                                                        y="0"
                                                        width="1"
                                                        height="60"
                                                        fill="#b1b9c4"
                                                        filter="none"
                                                        fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <g id="SvgjsG1729"
                                                       class="apexcharts-xaxis"
                                                       transform="translate(0, 0)">
                                                        <g id="SvgjsG1730"
                                                           class="apexcharts-xaxis-texts-g"
                                                           transform="translate(0, 2.75)"></g>
                                                    </g>
                                                    <g id="SvgjsG1743"
                                                       class="apexcharts-grid">
                                                        <g id="SvgjsG1744"
                                                           class="apexcharts-gridlines-horizontal"
                                                           style="display: none;">
                                                            <line
                                                                id="SvgjsLine1746"
                                                                x1="0"
                                                                y1="0"
                                                                x2="83"
                                                                y2="0"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1747"
                                                                x1="0"
                                                                y1="12"
                                                                x2="83"
                                                                y2="12"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1748"
                                                                x1="0"
                                                                y1="24"
                                                                x2="83"
                                                                y2="24"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1749"
                                                                x1="0"
                                                                y1="36"
                                                                x2="83"
                                                                y2="36"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1750"
                                                                x1="0"
                                                                y1="48"
                                                                x2="83"
                                                                y2="48"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1751"
                                                                x1="0"
                                                                y1="60"
                                                                x2="83"
                                                                y2="60"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG1745"
                                                           class="apexcharts-gridlines-vertical"
                                                           style="display: none;"></g>
                                                        <line
                                                            id="SvgjsLine1753"
                                                            x1="0"
                                                            y1="60"
                                                            x2="83"
                                                            y2="60"
                                                            stroke="transparent"
                                                            stroke-dasharray="0"></line>
                                                        <line
                                                            id="SvgjsLine1752"
                                                            x1="0"
                                                            y1="1"
                                                            x2="0"
                                                            y2="60"
                                                            stroke="transparent"
                                                            stroke-dasharray="0"></line>
                                                    </g>
                                                    <g id="SvgjsG1724"
                                                       class="apexcharts-line-series apexcharts-plot-series">
                                                        <g id="SvgjsG1725"
                                                           class="apexcharts-series"
                                                           seriesName="seriesx1"
                                                           data:longestSeries="true"
                                                           rel="1"
                                                           data:realIndex="0">
                                                            <path
                                                                id="SvgjsPath1728"
                                                                d="M 0 45C 2.9050000000000002 45 5.3950000000000005 20.4 8.3 20.4C 11.205000000000002 20.4 13.695 35.400000000000006 16.6 35.400000000000006C 19.505 35.400000000000006 21.995 6.600000000000001 24.9 6.600000000000001C 27.805 6.600000000000001 30.295 22.200000000000003 33.2 22.200000000000003C 36.105000000000004 22.200000000000003 38.595 45 41.5 45C 44.405 45 46.894999999999996 33.6 49.8 33.6C 52.705 33.6 55.195 52.8 58.1 52.8C 61.005 52.8 63.495000000000005 38.400000000000006 66.4 38.400000000000006C 69.305 38.400000000000006 71.795 54.6 74.7 54.6C 77.605 54.6 80.095 27.6 83 27.6"
                                                                fill="none"
                                                                fill-opacity="1"
                                                                stroke="rgba(255,92,117,0.85)"
                                                                stroke-opacity="1"
                                                                stroke-linecap="butt"
                                                                stroke-width="2"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-line"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskba0my24b)"
                                                                pathTo="M 0 45C 2.9050000000000002 45 5.3950000000000005 20.4 8.3 20.4C 11.205000000000002 20.4 13.695 35.400000000000006 16.6 35.400000000000006C 19.505 35.400000000000006 21.995 6.600000000000001 24.9 6.600000000000001C 27.805 6.600000000000001 30.295 22.200000000000003 33.2 22.200000000000003C 36.105000000000004 22.200000000000003 38.595 45 41.5 45C 44.405 45 46.894999999999996 33.6 49.8 33.6C 52.705 33.6 55.195 52.8 58.1 52.8C 61.005 52.8 63.495000000000005 38.400000000000006 66.4 38.400000000000006C 69.305 38.400000000000006 71.795 54.6 74.7 54.6C 77.605 54.6 80.095 27.6 83 27.6"
                                                                pathFrom="M -1 60L -1 60L 8.3 60L 16.6 60L 24.9 60L 33.2 60L 41.5 60L 49.8 60L 58.1 60L 66.4 60L 74.7 60L 83 60"></path>
                                                            <g id="SvgjsG1726"
                                                               class="apexcharts-series-markers-wrap"
                                                               data:realIndex="0">
                                                                <g class="apexcharts-series-markers">
                                                                    <circle
                                                                        id="SvgjsCircle1759"
                                                                        r="0"
                                                                        cx="0"
                                                                        cy="0"
                                                                        class="apexcharts-marker wxtxavhjl no-pointer-events"
                                                                        stroke="#ffffff"
                                                                        fill="#ff5c75"
                                                                        fill-opacity="1"
                                                                        stroke-width="2"
                                                                        stroke-opacity="0.9"
                                                                        default-marker-size="0"></circle>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1727"
                                                           class="apexcharts-datalabels"
                                                           data:realIndex="0"></g>
                                                    </g>
                                                    <line
                                                        id="SvgjsLine1754"
                                                        x1="0"
                                                        y1="0"
                                                        x2="83"
                                                        y2="0"
                                                        stroke="#b6b6b6"
                                                        stroke-dasharray="0"
                                                        stroke-width="1"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line
                                                        id="SvgjsLine1755"
                                                        x1="0"
                                                        y1="0"
                                                        x2="83"
                                                        y2="0"
                                                        stroke-dasharray="0"
                                                        stroke-width="0"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG1756"
                                                       class="apexcharts-yaxis-annotations"></g>
                                                    <g id="SvgjsG1757"
                                                       class="apexcharts-xaxis-annotations"></g>
                                                    <g id="SvgjsG1758"
                                                       class="apexcharts-point-annotations"></g>
                                                </g>
                                                <rect
                                                    id="SvgjsRect1720"
                                                    width="0"
                                                    height="0"
                                                    x="0"
                                                    y="0" rx="0"
                                                    ry="0"
                                                    opacity="1"
                                                    stroke-width="0"
                                                    stroke="none"
                                                    stroke-dasharray="0"
                                                    fill="#fefefe"></rect>
                                                <g id="SvgjsG1742"
                                                   class="apexcharts-yaxis"
                                                   rel="0"
                                                   transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG1717"
                                                   class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend" style="max-height: 30px;"></div>
                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                    <span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 92, 117);"></span>
                                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group">
                                                            <span class="apexcharts-tooltip-text-label"></span>
                                                            <span class="apexcharts-tooltip-text-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-z-group">
                                                            <span class="apexcharts-tooltip-text-z-label"></span>
                                                            <span class="apexcharts-tooltip-text-z-value"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                <div
                                                    class="apexcharts-yaxistooltip-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="resize-triggers">
                                        <div
                                            class="expand-trigger">
                                            <div
                                                style="width: 108px; height: 61px;"></div>
                                        </div>
                                        <div
                                            class="contract-trigger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom justify-content-between align-items-end py-3" style="border-bottom: 0px!important;">
                                <div class="col-6 col-md-5">
                                    <h6 class="text-muted mt-0 fs-14">Số task đang thực hiện hôm nay</h6>
                                    <h3 class="my-2">{{$count['task_inprocess_today']}}</h3>
{{--                                    <h6 class="text-success mb-0">+24.98%</h6>--}}
                                </div>
                                <div class="col-5 col-md-3">
                                    <div id="chart2" data-colors="#ff5c75" style="min-height: 60px;">
                                        <div d="apexchartsba0my24b" class="apexcharts-canvas apexchartsba0my24b apexcharts-theme-light" style="width: 83px; height: 60px;">
                                            <svg
                                                id="SvgjsSvg1714"
                                                width="83"
                                                height="60"
                                                xmlns="http://www.w3.org/2000/svg"
                                                version="1.1"
                                                class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS"
                                                transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG1716"
                                                   class="apexcharts-inner apexcharts-graphical"
                                                   transform="translate(0, 0)">
                                                    <defs
                                                        id="SvgjsDefs1715">
                                                        <clipPath
                                                            id="gridRectMaskba0my24b">
                                                            <rect
                                                                id="SvgjsRect1722"
                                                                width="89"
                                                                height="62"
                                                                x="-3"
                                                                y="-1"
                                                                rx="0"
                                                                ry="0"
                                                                opacity="1"
                                                                stroke-width="0"
                                                                stroke="none"
                                                                stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath
                                                            id="gridRectMarkerMaskba0my24b">
                                                            <rect
                                                                id="SvgjsRect1723"
                                                                width="87"
                                                                height="64"
                                                                x="-2"
                                                                y="-2"
                                                                rx="0"
                                                                ry="0"
                                                                opacity="1"
                                                                stroke-width="0"
                                                                stroke="none"
                                                                stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <line
                                                        id="SvgjsLine1721"
                                                        x1="0"
                                                        y1="0"
                                                        x2="0"
                                                        y2="60"
                                                        stroke="#b6b6b6"
                                                        stroke-dasharray="3"
                                                        class="apexcharts-xcrosshairs"
                                                        x="0"
                                                        y="0"
                                                        width="1"
                                                        height="60"
                                                        fill="#b1b9c4"
                                                        filter="none"
                                                        fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <g id="SvgjsG1729"
                                                       class="apexcharts-xaxis"
                                                       transform="translate(0, 0)">
                                                        <g id="SvgjsG1730"
                                                           class="apexcharts-xaxis-texts-g"
                                                           transform="translate(0, 2.75)"></g>
                                                    </g>
                                                    <g id="SvgjsG1743"
                                                       class="apexcharts-grid">
                                                        <g id="SvgjsG1744"
                                                           class="apexcharts-gridlines-horizontal"
                                                           style="display: none;">
                                                            <line
                                                                id="SvgjsLine1746"
                                                                x1="0"
                                                                y1="0"
                                                                x2="83"
                                                                y2="0"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1747"
                                                                x1="0"
                                                                y1="12"
                                                                x2="83"
                                                                y2="12"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1748"
                                                                x1="0"
                                                                y1="24"
                                                                x2="83"
                                                                y2="24"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1749"
                                                                x1="0"
                                                                y1="36"
                                                                x2="83"
                                                                y2="36"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1750"
                                                                x1="0"
                                                                y1="48"
                                                                x2="83"
                                                                y2="48"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                            <line
                                                                id="SvgjsLine1751"
                                                                x1="0"
                                                                y1="60"
                                                                x2="83"
                                                                y2="60"
                                                                stroke="#e0e0e0"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG1745"
                                                           class="apexcharts-gridlines-vertical"
                                                           style="display: none;"></g>
                                                        <line
                                                            id="SvgjsLine1753"
                                                            x1="0"
                                                            y1="60"
                                                            x2="83"
                                                            y2="60"
                                                            stroke="transparent"
                                                            stroke-dasharray="0"></line>
                                                        <line
                                                            id="SvgjsLine1752"
                                                            x1="0"
                                                            y1="1"
                                                            x2="0"
                                                            y2="60"
                                                            stroke="transparent"
                                                            stroke-dasharray="0"></line>
                                                    </g>
                                                    <g id="SvgjsG1724"
                                                       class="apexcharts-line-series apexcharts-plot-series">
                                                        <g id="SvgjsG1725"
                                                           class="apexcharts-series"
                                                           seriesName="seriesx1"
                                                           data:longestSeries="true"
                                                           rel="1"
                                                           data:realIndex="0">
                                                            <path
                                                                id="SvgjsPath1728"
                                                                d="M 0 45C 2.9050000000000002 45 5.3950000000000005 20.4 8.3 20.4C 11.205000000000002 20.4 13.695 35.400000000000006 16.6 35.400000000000006C 19.505 35.400000000000006 21.995 6.600000000000001 24.9 6.600000000000001C 27.805 6.600000000000001 30.295 22.200000000000003 33.2 22.200000000000003C 36.105000000000004 22.200000000000003 38.595 45 41.5 45C 44.405 45 46.894999999999996 33.6 49.8 33.6C 52.705 33.6 55.195 52.8 58.1 52.8C 61.005 52.8 63.495000000000005 38.400000000000006 66.4 38.400000000000006C 69.305 38.400000000000006 71.795 54.6 74.7 54.6C 77.605 54.6 80.095 27.6 83 27.6"
                                                                fill="none"
                                                                fill-opacity="1"
                                                                stroke="rgba(255,92,117,0.85)"
                                                                stroke-opacity="1"
                                                                stroke-linecap="butt"
                                                                stroke-width="2"
                                                                stroke-dasharray="0"
                                                                class="apexcharts-line"
                                                                index="0"
                                                                clip-path="url(#gridRectMaskba0my24b)"
                                                                pathTo="M 0 45C 2.9050000000000002 45 5.3950000000000005 20.4 8.3 20.4C 11.205000000000002 20.4 13.695 35.400000000000006 16.6 35.400000000000006C 19.505 35.400000000000006 21.995 6.600000000000001 24.9 6.600000000000001C 27.805 6.600000000000001 30.295 22.200000000000003 33.2 22.200000000000003C 36.105000000000004 22.200000000000003 38.595 45 41.5 45C 44.405 45 46.894999999999996 33.6 49.8 33.6C 52.705 33.6 55.195 52.8 58.1 52.8C 61.005 52.8 63.495000000000005 38.400000000000006 66.4 38.400000000000006C 69.305 38.400000000000006 71.795 54.6 74.7 54.6C 77.605 54.6 80.095 27.6 83 27.6"
                                                                pathFrom="M -1 60L -1 60L 8.3 60L 16.6 60L 24.9 60L 33.2 60L 41.5 60L 49.8 60L 58.1 60L 66.4 60L 74.7 60L 83 60"></path>
                                                            <g id="SvgjsG1726"
                                                               class="apexcharts-series-markers-wrap"
                                                               data:realIndex="0">
                                                                <g class="apexcharts-series-markers">
                                                                    <circle
                                                                        id="SvgjsCircle1759"
                                                                        r="0"
                                                                        cx="0"
                                                                        cy="0"
                                                                        class="apexcharts-marker wxtxavhjl no-pointer-events"
                                                                        stroke="#ffffff"
                                                                        fill="#ff5c75"
                                                                        fill-opacity="1"
                                                                        stroke-width="2"
                                                                        stroke-opacity="0.9"
                                                                        default-marker-size="0"></circle>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1727"
                                                           class="apexcharts-datalabels"
                                                           data:realIndex="0"></g>
                                                    </g>
                                                    <line
                                                        id="SvgjsLine1754"
                                                        x1="0"
                                                        y1="0"
                                                        x2="83"
                                                        y2="0"
                                                        stroke="#b6b6b6"
                                                        stroke-dasharray="0"
                                                        stroke-width="1"
                                                        class="apexcharts-ycrosshairs"></line>
                                                    <line
                                                        id="SvgjsLine1755"
                                                        x1="0"
                                                        y1="0"
                                                        x2="83"
                                                        y2="0"
                                                        stroke-dasharray="0"
                                                        stroke-width="0"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG1756"
                                                       class="apexcharts-yaxis-annotations"></g>
                                                    <g id="SvgjsG1757"
                                                       class="apexcharts-xaxis-annotations"></g>
                                                    <g id="SvgjsG1758"
                                                       class="apexcharts-point-annotations"></g>
                                                </g>
                                                <rect
                                                    id="SvgjsRect1720"
                                                    width="0"
                                                    height="0"
                                                    x="0"
                                                    y="0" rx="0"
                                                    ry="0"
                                                    opacity="1"
                                                    stroke-width="0"
                                                    stroke="none"
                                                    stroke-dasharray="0"
                                                    fill="#fefefe"></rect>
                                                <g id="SvgjsG1742"
                                                   class="apexcharts-yaxis"
                                                   rel="0"
                                                   transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG1717"
                                                   class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend" style="max-height: 30px;"></div>
                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                    <span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 92, 117);"></span>
                                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group">
                                                            <span class="apexcharts-tooltip-text-label"></span>
                                                            <span class="apexcharts-tooltip-text-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-z-group">
                                                            <span class="apexcharts-tooltip-text-z-label"></span>
                                                            <span class="apexcharts-tooltip-text-z-value"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                <div
                                                    class="apexcharts-yaxistooltip-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="resize-triggers">
                                        <div
                                            class="expand-trigger">
                                            <div
                                                style="width: 108px; height: 61px;"></div>
                                        </div>
                                        <div
                                            class="contract-trigger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
@endsection

@section('content-footer')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                &copy; Herostudio work track made by Sweetsica</a>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
@endsection
