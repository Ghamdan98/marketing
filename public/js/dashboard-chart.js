document.addEventListener("DOMContentLoaded", function () {

    const canvas = document.getElementById("salesChart");

    if (!canvas) return;

    new Chart(canvas, {

        type: "line",

        data: {

            labels: window.chartLabels,

            datasets: [{

                label: "Monthly Sales",

                data: window.chartData,

                borderWidth: 3,

                tension: .35,

                fill: true,

                backgroundColor: "rgba(37,99,235,.12)",

                borderColor: "#2563EB",

                pointRadius: 4,

                pointHoverRadius: 6,

                pointBackgroundColor: "#2563EB",

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    display: false

                }

            },

            interaction: {

                intersect: false,

                mode: "index"

            },

            scales: {

                y: {

                    beginAtZero: true,

                    grid: {

                        color: "#EEF2F7"

                    },

                    ticks: {

                        callback: function(value){

                            return "$" + value;

                        }

                    }

                },

                x: {

                    grid: {

                        display: false

                    }

                }

            }

        }

    });

});
const statusCanvas = document.getElementById("statusChart");

if (statusCanvas) {

    new Chart(statusCanvas, {

        type: "doughnut",

        data: {

            labels: window.statusChart.labels,

            datasets: [{

                data: window.statusChart.data,

                backgroundColor: [

                    "#F59E0B",

                    "#22C55E",

                    "#EF4444"

                ],

                borderWidth: 0

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    position: "bottom"

                }

            }

        }

    });

}