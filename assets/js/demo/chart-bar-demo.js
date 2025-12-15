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

(async function initBarChart(selectedYear) {
  try {
    const canvas = document.getElementById("myBarChart");
    if (!canvas) {
      console.error("Canvas #myBarChart not found on page.");
      return;
    }
    const ctx = canvas.getContext("2d");

    const year = selectedYear || new Date().getFullYear();
    const apiUrl = `api/chart_visitors.php?year=${year}`;

    console.log("Current page URL:", window.location.href);
    console.log("Fetching from:", apiUrl);
    console.log("Full fetch URL:", new URL(apiUrl, window.location.href).href);

    // Show loading state
    canvas.style.opacity = "0.5";

    const res = await fetch(apiUrl);

    if (!res.ok) {
      throw new Error("HTTP error! status: " + res.status);
    }

    // Check content type
    const contentType = res.headers.get("content-type");
    if (!contentType || !contentType.includes("application/json")) {
      const text = await res.text();
      console.error("Response is not JSON:", text.substring(0, 200));
      throw new Error(
        "Server returned HTML instead of JSON. Check API endpoint."
      );
    }

    const json = await res.json();

    if (json.error) {
      throw new Error("API error: " + json.error);
    }

    // Check if there's any data
    const totalVisitors = (json.data || []).reduce((a, b) => a + b, 0);

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
            barThickness: 40,
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
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          callbacks: {
            title: () => null, // Remove title
            label: (tooltipItem, chart) => {
              const monthName = chart.labels[tooltipItem.index];
              const value = tooltipItem.yLabel;
              return (
                monthName +
                ": " +
                value +
                " Kunjungan" +
                (value !== 1 ? "'s" : "")
              );
            },
          },
        },
      },
    });

    // Show empty state message if no data
    const emptyMsg = document.getElementById("chartEmptyMessage");
    if (emptyMsg) {
      emptyMsg.style.display = totalVisitors === 0 ? "block" : "none";
    }

    // Restore opacity
    canvas.style.opacity = "1";
  } catch (err) {
    console.error("Chart init error:", err);

    // Restore opacity
    const canvas = document.getElementById("myBarChart");
    if (canvas) canvas.style.opacity = "1";

    // Show error message to user
    const errorMsg = document.getElementById("chartErrorMessage");
    if (errorMsg) {
      errorMsg.textContent = `Error loading chart: ${err.message}`;
      errorMsg.style.display = "block";
    }
  }
})();

// Add event listener for year selector if it exists
document.addEventListener("DOMContentLoaded", function () {
  const yearSelector = document.getElementById("yearSelector");
  if (yearSelector) {
    yearSelector.addEventListener("change", (e) => {
      initBarChart(parseInt(e.target.value));
    });
  }
});
