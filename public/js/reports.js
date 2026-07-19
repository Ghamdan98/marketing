console.log("reports.js loaded");
document.addEventListener("DOMContentLoaded", function () {

    const canvas = document.getElementById("salesReportChart");

    if (!canvas) return;

    const chart = window.reportChart;

    new Chart(canvas, {

        type: "line",

        data: {

            labels: chart.labels,

            datasets: [

                {

                    label: "Revenue",

                    data: chart.data,

                    borderColor: "#3867F4",

                    backgroundColor: "rgba(56,103,244,.15)",

                    fill: true,

                    tension: .4,

                    borderWidth: 3,

                    pointRadius: 4

                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    display: false

                }

            },

            scales: {

                y: {

                    beginAtZero: true

                }

            }

        }

    });

});
/*=========================================
EXPORT MENU
=========================================*/
document.addEventListener("DOMContentLoaded", () => {

    const toggle = document.getElementById("exportToggle");
    const dropdown = document.querySelector(".export-dropdown");

    if (!toggle || !dropdown) return;

    toggle.addEventListener("click", function (e) {

        e.stopPropagation();

        dropdown.classList.toggle("active");

    });

    document.addEventListener("click", function () {

        dropdown.classList.remove("active");

    });

});