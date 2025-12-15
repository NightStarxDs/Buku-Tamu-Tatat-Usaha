document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("myPieChart");
    if (!ctx || !window.chartStatus) return;

    new Chart(ctx, {
        type: "pie",
        data: {
            labels: chartStatus,
            datasets: [{
                data: chartTotalBulanan
            }]
        },
        options: {
            responsive: true
        }
    });
});
