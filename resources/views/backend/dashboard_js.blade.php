<script type="text/javascript">
    /*======== 16. ANALYTICS - ACTIVITY CHART ========*/
var activity = document.getElementById("activity");
if (activity !== null) {
var activityData = [
    {
        pendingYearData: [ @foreach ($month as $m){{ todoChart($m,$TodoPending).',' }}@endforeach]
    },
    {
        processingYearData: [ @foreach ($month as $m){{ todoChart($m,$TodoProcessing).',' }}@endforeach]
    },
    {
        completedYearData:  [ @foreach ($month as $m){{ todoChart($m,$TodoCompleted).',' }}@endforeach ]
    }
];

activity.height = 100;

var config = {
type: "line",
data: {
    labels:['January','February','March','April','May','June','July','August','September','October','November','December'],
    datasets: [{
            label: "{{ __('pending') }}",
            backgroundColor: "rgba(89, 59, 230, 1)",
            borderColor: "rgba(89, 59, 230, 1)",
            data: activityData[0].pendingYearData,
            lineTension: 0,
            pointRadius: 0,
            borderWidth: 2,
        },
        {
            label: "{{ __('processing') }}",
            backgroundColor: '#ffaa16',
            borderColor: "#ffaa16",
            data: activityData[1].processingYearData,
            lineTension: 0,
            // borderDash: [10, 5],
            borderWidth: 2,
            pointRadius: 0,
        },
        {
            label: "{{ __('compoleted') }}",
            backgroundColor: '#7ed321',
            borderColor: "#7ed321",
            data: activityData[2].completedYearData,
            lineTension: 0,
            // borderDash: [10, 5],
            borderWidth: 2,
            pointRadius: 0,
        }
    ]
},
options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
        display: false
    },
    scales: {
        xAxes: [{
            gridLines: {
                color: "rgba(89, 59, 219,0.1)",
                drawBorder: true
            },
            ticks: {
                fontColor: "#222",
            },
        }],
        yAxes: [{
            gridLines: {
                display: false,
                zeroLineColor: "transparent"
            },
            ticks: {
                stepSize: 50,
                fontColor: "#222",
                fontFamily: "Nunito, sans-serif"
            }
        }]
    },
    tooltips: {
        mode: "index",
        intersect: false,
        titleFontColor: "#888",
        bodyFontColor: "#555",
        titleFontSize: 12,
        bodyFontSize: 15,
        backgroundColor: "rgba(256,256,256,0.95)",
        displayColors: true,
        xPadding: 10,
        yPadding: 7,
        borderColor: "rgba(220, 220, 220, 0.9)",
        borderWidth: 2,
        caretSize: 6,
        caretPadding: 5
    }
}
};



var ctx = document.getElementById("activity").getContext("2d");
var myLine = new Chart(ctx, config);

var items = document.querySelectorAll("#user-activity .nav-tabs .nav-item");
items.forEach(function(item, index) {
    item.addEventListener("click", function() {

        if(index == 3){
            config.data.datasets[0].data = activityData[0].pendingYearData;
            config.data.datasets[1].data = activityData[1].processingYearData;
            config.data.datasets[2].data = activityData[2].completedYearData;
        }else{
            config.data.datasets[0].data = activityData[index].pendingYearData;
            config.data.datasets[1].data = activityData[index].processingYearData;
            config.data.datasets[2].data = activityData[index].completedYearData;
        }

        myLine.update();
    });
});
}

</script>


<script type="text/javascript">
         var gdpData = {
                            @foreach ($LoginActivity as $key=>$country)
                                @if($key !=="" && $key !== null)
                                "{{ $key }}": {{ countryLogin($country) }},
                                @endif
                            @endforeach

                        }


    $("#world-map").vectorMap({
        map: "world_en",
        backgroundColor: "transparent",
        borderColor: "#fff",
        color: "#eee",
        colors: {
            @foreach ($LoginActivity as $key=>$country)
                @if($key !=="" && $key !== null)
                {{ $key }}: "rgba(99, 66, 230,0.9",
                @endif
            @endforeach
        },
        onLabelShow: function(event, label, code) {
            label.text(label.text() + " (" + gdpData[code] + ")");
        },
        enableZoom: true,
        showTooltip: true,
        selectedColor: "rgba(93, 120, 255,1)",
        hoverColor: "rgba(93, 120, 255,0.8)",
    });
</script>
