<div id="daily-task-chart" class="apex-charts mt-3" dir="ltr"
     style="min-height: 329px;"></div>

<!-- Vendor js -->
<script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>
<!-- optional plugins -->
<script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin-asset/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script>
    var dailyTaskOption = {
        "chart": {
            "height": 329,
            "type": "area"
        },
        "dataLabels": {
            "enabled": false
        },
        "stroke": {
            "curve": "smooth",
            "width": 4
        },
        "series": [
            {
                "name": "Yêu cầu",
                "data": @json($tasks['value'])
            }
        ],
        "zoom": {
            "enabled": false
        },
        "legend": {
            "show": false
        },
        "colors": [
            "#43d39e"
        ],
        "xaxis": {
            "type": "string",
            "categories": @json($tasks['format']),
            "tooltip": {
                "enabled": false
            },
            "axisBorder": {
                "show": false
            },
            "labels": {},
            "convertedCatToNumeric": true
        },
        "yaxis": [
            {
                "show": true,
                "showAlways": false,
                "showForNullSeries": true,
                "opposite": false,
                "reversed": false,
                "logarithmic": false,
                "forceNiceScale": false,
                "floating": false,
                "labels": {
                    "show": true,
                    "minWidth": 0,
                    "maxWidth": 160,
                    "offsetX": 0,
                    "offsetY": 0,
                    "rotate": 0,
                    "padding": 20,
                    "style": {
                        "colors": [],
                        "fontSize": "11px",
                        "fontWeight": 400,
                        "cssClass": ""
                    }
                },
                "axisBorder": {
                    "show": false,
                    "color": "#e0e0e0",
                    "width": 1,
                    "offsetX": 0,
                    "offsetY": 0
                },
                "axisTicks": {
                    "show": false,
                    "color": "#e0e0e0",
                    "width": 6,
                    "offsetX": 0,
                    "offsetY": 0
                },
                "title": {
                    "rotate": -90,
                    "offsetY": 0,
                    "offsetX": 0,
                    "style": {
                        "fontSize": "11px",
                        "fontWeight": 900,
                        "cssClass": ""
                    }
                },
                "tooltip": {
                    "enabled": false,
                    "offsetX": 0
                },
                "crosshairs": {
                    "show": true,
                    "position": "front",
                    "stroke": {
                        "color": "#b6b6b6",
                        "width": 1,
                        "dashArray": 0
                    }
                }
            }
        ],
        "fill": {
            "type": "gradient",
            "gradient": {
                "type": "vertical",
                "shadeIntensity": 1,
                "inverseColors": false,
                "opacityFrom": 0.45,
                "opacityTo": 0.05,
                "stops": [
                    45,
                    100
                ]
            }
        },
        "annotations": {
            "yaxis": [],
            "xaxis": [],
            "points": []
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#daily-task-chart"),
        dailyTaskOption
    );

    chart.render();
</script>
