<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('report.pjtitle') }}
        </h2>
    </x-slot>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-12 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="flex flex-row justify-center">
                                <div class="pl-4 basis-1/4">
                                    <canvas id="MonthlyChart" height="400" width="400">{{ __('report.rerror') }}</canvas>
                                </div>
                                <div class="pr-4 basis-1/4">
                                    <canvas id="OverallChart" height="200" width="400">{{ __('report.rerror') }}</canvas>
                                </div>
                            </div>
                            <div class="flex flex-row justify-center">
                                <div class="pl-4 basis-1/4">
                                    <canvas id="WorkersChart" height="200" width="400">{{ __('report.rerror') }}</canvas>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
        var monthlyData = {!! json_encode($monthlyData) !!};
        var chartOnelabels = {!! json_encode($months) !!};

        var chartTwolabels = {!! json_encode($projects_names) !!};
        var chartTwodata = {!! json_encode($projects_time) !!};
        var chartThreedata = {!! json_encode($projects_workers) !!};




        const backgroundcolorTwo = [];
        const backgroundcolorTwoHover = [];
        for (i = 0; i < chartTwolabels.length; i++){
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);
            backgroundcolorTwo.push('rgba('+r+', '+g+', '+b+', 0.4)');
            backgroundcolorTwoHover.push('rgba('+r+', '+g+', '+b+', 0.8)')
        }

        datasets = [];

        for (line = 0; line < chartTwolabels.length; line++) {
            y = [];

            datasets.push({}); //create a new line dataset
            d = datasets[line];
            d.label = chartTwolabels[line];
            d.borderColor = backgroundcolorTwoHover[line];
            d.backgroundColor = backgroundcolorTwo[line];
            d.borderWidth = '1';

            for (x = 0; x < chartOnelabels.length; x++) {
                y.push(0); //push some data aka generate 4 distinct separate lines

            } //for x

            d.data = y; //send new line data to dataset
        }

        for(var monthName in monthlyData) {
            monthlyData[monthName].forEach(x => {
                setData( x.spent_time, monthName, x.project_name, chartOnelabels, datasets );
            });
        }


        Chart.defaults.font.family = 'Quicksand';

        var ctx1 = document.getElementById('MonthlyChart').getContext('2d');
        var myChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: chartOnelabels,
                datasets: datasets
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: '{{ __('report.tswobm') }}',
                        font: {
                            weight: 'bold',
                            size: '15',
                        }
                    },
                    legend: {
                        labels: {
                            font: {
                                size: '15'
                            }
                        }
                    }

                }
        }
    });

        var ctx2 = document.getElementById('OverallChart').getContext('2d');
        var myChart = new Chart(ctx2, {
            type: 'polarArea',
            data: {
                labels: chartTwolabels,
                datasets: [{
                backgroundColor: backgroundcolorTwo,
                borderColor: backgroundcolorTwoHover,
                borderWidth: '1',
                hoverBackgroundColor: backgroundcolorTwoHover,
                data: chartTwodata,
                 }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: '{{ __('report.ptsoc') }}',
                        font: {
                            weight: 'bold',
                            size: '15',
                        }
                    },
                    legend: {
                        labels: {
                            font: {
                                size: '15'
                            }
                        }
                    }
                }
        }
    });

    var ctx3 = document.getElementById('WorkersChart').getContext('2d');
        var myChart = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: chartTwolabels,
                datasets: [{
                label: '{{ __('report.ua') }}',
                axis: 'y',
                backgroundColor: 'rgba(122, 212, 235, 0.4)',
                borderColor: 'rgba(122, 212, 235, 1)',
                borderWidth: '1',
                hoverBackgroundColor:'rgba(122, 212, 235, 1)',
                data: chartThreedata,
                 }]
            },
            options: {
                indexAxis: 'y',
                plugins: {
                    title: {
                        display: true,
                        text: '{{ __('report.nouiep') }}',
                        font: {
                            weight: 'bold',
                            size: '15',
                        }
                    },
                    legend: {
                        labels: {
                            font: {
                                size: '15'
                            }
                        }
                    }
                }
        }
    });

    function setData(value, month, project, labels, datasets) {
        // get month index in labels list
        var monthNum = 0;
        for(  m = 0; m< labels.length ; m++  ) {
            if (labels[m] == month) {
                monthNum = m;
            }
        }
        // set dataset value
        for(  i = 0; i< datasets.length ; i++  ) {
            if (datasets[i].label == project) {
                datasets[i].data[monthNum] = value;
            }
        }

    }

</script>
</x-app-layout>



