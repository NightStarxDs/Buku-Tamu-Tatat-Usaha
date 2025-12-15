// Set new default font family and font color to mimic Bootstrap's default styling
try {
  Chart.defaults.global.defaultFontFamily =
    "Nunito, -apple-system,system-ui,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif";
  Chart.defaults.global.defaultFontColor = "#858796";
} catch (e) {
  // Chart v3+ uses different defaults; ignore
}

(async function initPieChart() {
  try {
    const canvas = document.getElementById("myPieChart");
    if (!canvas) {
      console.error("Canvas #myPieChart not found.");
      return;
    }
    const ctx = canvas.getContext("2d");

    const now = new Date();
    const year = now.getFullYear();
    const month = now.getMonth() + 1;

    const apiUrl = `api/chart_visitors_week.php?year=${year}&month=${month}`;

    console.log("Year:", year);
    console.log("Month:", month);
    console.log("Fetching:", apiUrl);

    const res = await fetch(apiUrl);
    if (!res.ok) throw new Error("Network response not ok: " + res.status);
    const json = await res.json();
    if (json.error) throw new Error("API error: " + json.error);

    const data = json.data || [0, 0, 0, 0, 0, 0, 0];
    const labels = json.labels || [
      "Senin",
      "Selasa",
      "Rabu",
      "Kamis",
      "Jumat",
      "Sabtu",
      "Minggu",
    ];
    const colors = [
      "#4e73df",
      "#1cc88a",
      "#36b9cc",
      "#f6c23e",
      "#e74a3b",
      "#858796",
      "#5a5c69",
    ];
    const hoverColors = [
      "#2e59d9",
      "#17a673",
      "#2c9faf",
      "#dda20a",
      "#be2617",
      "#6c707e",
      "#41424a",
    ];

    if (window.myPieChart && typeof window.myPieChart.destroy === "function") {
      window.myPieChart.destroy();
    }

    window.myPieChart = new Chart(ctx, {
      type: "pie",
      data: {
        labels: labels,
        datasets: [
          {
            data: data,
            backgroundColor: colors,
            hoverBackgroundColor: hoverColors,
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: true,
          caretPadding: 10,
          callbacks: {
            label: function (tooltipItem, data) {
              const label = data.labels[tooltipItem.index] || "";
              const value = data.datasets[0].data[tooltipItem.index];
              return label + ": " + value + " (" + "Kunjungan" + ")";
            },
          },
        },
        legend: { display: false },
      },
    });

    console.log("Chart created with data:", data);
  } catch (err) {
    console.error("Pie chart init error:", err);
  }
})();
