document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("myBarChart");
    if (!ctx || !window.chartBulan) return;

    const namaBulan = [
        "Jan","Feb","Mar","Apr","Mei","Jun",
        "Jul","Agu","Sep","Okt","Nov","Des"
    ];

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: chartBulan.map(b => namaBulan[b - 1]),
            datasets: [{
                label: "Pengunjung",
                data: chartTotalTahunan
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
