// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
  "Nunito, -apple-system,system-ui,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif";
Chart.defaults.global.defaultFontColor = "#858796";

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: "pie", // changed from "doughnut" to "pie"
  data: {
    labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
    datasets: [
      {
        data: [0, 0, 0, 0, 0, 0, 0],
        backgroundColor: [
          "#4e73df",
          "#1cc88a",
          "#36b9cc",
          "#f6c23e",
          "#e74a3b",
          "#858796",
          "#5a5c69",
        ],
        hoverBackgroundColor: [
          "#2e59d9",
          "#17a673",
          "#2c9faf",
          "#dda20a",
          "#be2617",
          "#6c707e",
          "#41424a",
        ],
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
    },
    legend: { display: false }, // <-- hide Chart.js legend (v2)
    // removed cutoutPercentage (not applicable to pie)
  },
});

// pie chart dynamic dari API minggu
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
    const isoWeek = (() => {
      // compute ISO week number
      const d = new Date(
        Date.UTC(now.getFullYear(), now.getMonth(), now.getDate())
      );
      const dayNum = d.getUTCDay() || 7;
      d.setUTCDate(d.getUTCDate() + 4 - dayNum);
      const yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
      return Math.ceil(((d - yearStart) / 86400000 + 1) / 7);
    })();
    const year = now.getFullYear();

    const apiUrl = `${location.origin}/Buku-Tamu-Tatat-Usaha/api/chart_visitors_week.php?year=${year}&week=${isoWeek}`;
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

    if (window.myPieChart) window.myPieChart.destroy();

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
        },
        legend: { display: false }, // <-- hide Chart.js legend (v2)
        plugins: { legend: { display: false } }, // <-- also hide for Chart.js v3+
      },
    });
  } catch (err) {
    console.error("Pie chart init error:", err);
  }
})();
