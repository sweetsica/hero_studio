<div id="{{$chartId}}" class="apex-charts mt-3" dir="ltr"
     style="min-height: 329px;"></div>

<!-- Vendor js -->
<script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>
<!-- optional plugins -->
<script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin-asset/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script>
    var options = {
        chart: {
            height: 380,
            type: 'bar',
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                endingShape: 'rounded',
                columnWidth: '55%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [
            {
                name: "{{$department_name}}",
                data: @json($tasks)
            },
        ],
        xaxis: {
            categories: @json($arrayDate),
        },
        yaxis: {
            title: {
                text: "{{$unit}}"
            }
        },
        legend: {
            offsetY: 7,
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.2
            },
            borderColor: '#f1f3fa'
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " {{$unit}}"
                }
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#{{$chartId}}"),
        options
    );

    chart.render();
</script>
