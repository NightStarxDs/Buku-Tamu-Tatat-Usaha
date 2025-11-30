// Set new default font family and font color to mimic Bootstrap's default styling
try {
  Chart.defaults.global.defaultFontFamily =
    "Nunito, -apple-system,system-ui,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif";
  Chart.defaults.global.defaultFontColor = "#858796";
} catch (e) {
  // Chart v3+ uses different defaults; ignore if property not present
}

function number_format(number, decimals, dec_point, thousands_sep) {
  number = (number + "").replace(",", "").replace(" ", "");
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
    dec = typeof dec_point === "undefined" ? "." : dec_point,
    s = "",
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return "" + Math.round(n * k) / k;
    };
  s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
  if (s[0].length > 3) s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  if ((s[1] || "").length < prec) {
    s[1] = s[1] || "";
    s[1] += new Array(prec - s[1].length + 1).join("0");
  }
  return s.join(dec);
}

(async function initBarChart() {
  try {
    const canvas = document.getElementById("myBarChart");
    if (!canvas) {
      console.error("Canvas #myBarChart not found on page.");
      return;
    }
    const ctx = canvas.getContext("2d");

    const year = new Date().getFullYear();
    // sesuaikan path berikut jika project Anda di subfolder lain
    const apiUrl = `${location.origin}/Buku-Tamu-Tatat-Usaha/api/chart_visitors.php?year=${year}`;
    const res = await fetch(apiUrl);
    if (!res.ok) {
      throw new Error("Network response was not ok: " + res.status);
    }
    const json = await res.json();
    if (json.error) {
      throw new Error("API error: " + json.error);
    }

    if (window.myBarChartInstance) window.myBarChartInstance.destroy();

    window.myBarChartInstance = new Chart(ctx, {
      type: "bar",
      data: {
        labels: json.labels || [],
        datasets: [
          {
            label: "Tamu (" + (json.year || year) + ")",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: json.data || [],
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        layout: { padding: { left: 10, right: 25, top: 25, bottom: 0 } },
        scales: {
          xAxes: [
            {
              time: { unit: "month" },
              gridLines: { display: false, drawBorder: false },
              ticks: { maxTicksLimit: 12 },
              maxBarThickness: 25,
            },
          ],
          yAxes: [
            {
              ticks: {
                min: 0,
                maxTicksLimit: 10,
                padding: 10,
                callback: (value) => number_format(value),
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2],
              },
            },
          ],
        },
        legend: { display: false },
        tooltips: {
          titleMarginBottom: 10,
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          callbacks: {
            label: (tooltipItem, chart) =>
              (chart.datasets[tooltipItem.datasetIndex].label || "") +
              ": " +
              number_format(tooltipItem.yLabel),
          },
        },
      },
    });
  } catch (err) {
    console.error("Chart init error:", err);
  }
})();
