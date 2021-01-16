var config = {
    type: "line",
    data: {
        labels: ["2019.1", "2019.2", "2020.1", "2020.2"],
        datasets: [
            {
                label: "Aprovados",
                backgroundColor: "rgb(40, 167, 69, 0.7)",
                borderColor: "rgb(40, 167, 69, 0.7)",
                data: [90, 95, 99, 80],
                fill: false
            },
            {
                label: "Reprovados",
                fill: false,
                backgroundColor: "rgb(220, 53, 69,0.7)",
                borderColor: "rgb(220, 53, 69,0.7)",
                data: [10, 5, 1, 20]
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            datalabels: {
                display: function(context) {
                    return context.dataset.data[context.dataIndex] !== 0;
                },
                labels: {
                    title: null
                }
            }
        },
        tooltips: {
            mode: "index",
            intersect: false
        },
        hover: {
            mode: "nearest",
            intersect: true
        },
        scales: {
            xAxes: [
                {
                    display: true,
                    scaleLabel: {
                        display: true
                    }
                }
            ],
            yAxes: [
                {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: "% de alunos"
                    }
                }
            ]
        }
    }
};

window.onload = function() {
    var ctx = document.getElementById("chart-line").getContext("2d");
    window.myLine = new Chart(ctx, config);
};
