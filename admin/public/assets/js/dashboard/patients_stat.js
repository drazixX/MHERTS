var chartBar = function(){
    // Assuming you're fetching data asynchronously using a function like fetchPatientsData()
    fetchPatientsData()
        .then(function(patientsData) {
            // Extracting months from DateCheckIn and preparing data for chart
            var months = [];
            var newPatients = [];

            patientsData.forEach(function(patient){
                var date = new Date(patient.DateCheckIn);
                var month = date.toLocaleString('default', { month: 'long' });

                // Check if the month already exists in the array, if not, add it
                if (!months.includes(month)) {
                    months.push(month);
                    newPatients.push(0);
                }

                var index = months.indexOf(month);
                newPatients[index] += patient.NewPatient;
            });

            var optionsArea = {
                series: [
                    {
                        name: "New Patient",
                        data: newPatients
                    }
                ],
                chart: {
                    height: 350,
                    type: 'area',
                    group: 'social',
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [2],
                    colors:['var(--primary)'],
                    curve: 'straight'
                },
                legend: {
                    tooltipHoverFormatter: function(val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    },
                    markers: {
                        fillColors:['#2BC155'],
                        width: 15,
                        height: 15,
                        strokeWidth: 0,
                        radius: 19
                    }
                },
                markers: {
                    size: 6,
                    border:0,
                    colors:['var(--primary)'],
                    hover: {
                        size: 6,
                    }
                },
                xaxis: {
                    categories: months,
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#3e4954',
                            fontSize: '14px',
                            fontFamily: 'Poppins',
                            fontWeight: 100,
                        },
                    },
                },
                fill: {
                    colors:['var(--rgba-primary-1)'],
                    type:'solid',
                    opacity: 0.07
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            };
            var chartArea = new ApexCharts(document.querySelector("#chartBar"), optionsArea);
            chartArea.render();
        })
        .catch(function(error) {
            console.error('Error fetching patient data:', error);
        });
}

// Function to fetch patient data asynchronously
function fetchPatientsData() {
    return new Promise(function(resolve, reject) {
        // Replace this with your actual method of fetching data from the database
        // For example, if you're using fetch API:
        fetch('fetch_patients.php')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                resolve(data);
            })
            .catch(function(error) {
                reject(error);
            });
    });
}

