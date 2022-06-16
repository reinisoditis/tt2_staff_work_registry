<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('report.prtitle') }}
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
                                <div class="pl-4 basis-1/2">
                                    <canvas id="MonthlyChart" height="400" width="800">{{ __('report.rerror') }}</canvas>
                                </div>
                                <div class="pr-4 basis-1/2">
                                    <canvas id="MonthlyChart2" height="380" width="700">{{ __('report.rerror') }}</canvas>
                                </div>
                            </div>
                                <div class=" py-4">
                                    <canvas id="MonthlyChart3" height="300" width="300">{{ __('report.rerror') }}</canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        var chartOnelabels = {!! json_encode($months) !!};
        var chartOnedata = {!! json_encode($timespent)!!};
        var chartTwolabels = {!! json_encode($projects_names) !!};
        var chartTwodata = {!! json_encode($projects_time)!!};
        var chartThreelabels = {!! json_encode($worktypes_names) !!};
        var chartThreedata = {!! json_encode($worktypes_time)!!};

        const backgroundcolorThree = [];
        const backgroundcolorThreeHover = [];
        for (i = 0; i < chartThreelabels.length; i++){
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);
            backgroundcolorThree.push('rgba('+r+', '+g+', '+b+', 0.4)');
            backgroundcolorThreeHover.push('rgba('+r+', '+g+', '+b+', 1)');
        }

        Chart.defaults.font.family = 'Quicksand';
        var ctx = document.getElementById('MonthlyChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartOnelabels,
                datasets: [{
                label: '{{ __('report.tswm') }}',
                backgroundColor: 'rgba(229, 224, 89, 0.4)',
                borderColor: 'rgba(229, 224, 89, 1)',
                borderWidth: '1',
                borderJoinStyle: 'round',
                pointRadius: '5',
                pointHoverRadius: '5',
                data: chartOnedata,
                 }]
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

    var ctx2 = document.getElementById('MonthlyChart2').getContext('2d');
        var myChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: chartTwolabels,
                datasets: [{
                label: '{{ __('report.tswm') }}',
                axis: 'y',
                backgroundColor: 'rgba(189, 211, 88, 0.4)',
                borderColor: 'rgb(113, 113, 113)',
                borderWidth: '1',
                hoverBackgroundColor: 'rgba(189, 211, 88, 1)',
                borderJoinStyle: 'round',
                data: chartTwodata,
                 }]
            },
            options: {
                indexAxis: 'y',
                plugins: {
                    title: {
                        display: true,
                        text: '{{ __('report.tswobp') }}',
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

    var ctx3 = document.getElementById('MonthlyChart3').getContext('2d');
        var myChart = new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: chartThreelabels,
                datasets: [{
                backgroundColor: backgroundcolorThree,
                borderColor: 'rgb(113, 113, 113)',
                borderWidth: '1',
                hoverBackgroundColor: backgroundcolorThreeHover,
                borderJoinStyle: 'round',
                data: chartThreedata,
                 }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: '{{ __('report.tswobwt') }}',
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
      </script>


</x-app-layout>



