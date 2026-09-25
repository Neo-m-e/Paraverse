<script>
  const gcoServiceTypes = <?= json_encode($serviceTypes, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
  const gcoSpecialists = <?= json_encode($specialists, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
  const gcoYearLevels = <?= json_encode($yearLevels, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
  const gcoTerms = <?= json_encode($terms, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
  const gcoSchoolYears = <?= json_encode($schoolYears, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
  const gcoPrograms = <?= json_encode($programs, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
  const gcoReportTotal = <?= (int) $reportSummary['total'] ?>;
  const gcoChartColors = ['#e04987', '#f16a4f', '#78b89a', '#7c3bea', '#41b5e8'];

  const gcoCenterTextPlugin = {
    id: 'gcoCenterText',
    afterDraw: function (chart, args, options) {
      if (!options || !options.text) {
        return;
      }

      const context = chart.ctx;
      const area = chart.chartArea;
      context.save();
      context.fillStyle = '#181c32';
      context.font = '700 18px Arial';
      context.textAlign = 'center';
      context.textBaseline = 'middle';
      context.fillText(options.text, (area.left + area.right) / 2, (area.top + area.bottom) / 2);
      context.restore();
    }
  };

  Chart.register(gcoCenterTextPlugin);

  function splitLabel(label) {
    const words = label.split(' ');
    return words.length > 2 ? [words.slice(0, 2).join(' '), words.slice(2).join(' ')] : label;
  }

  function createBarChart(canvasId, data, stacked) {
    new Chart(document.getElementById(canvasId), {
      type: 'bar',
      data: {
        labels: data.map(function (item) { return splitLabel(item.name); }),
        datasets: [
          {
            label: 'Face to Face',
            data: data.map(function (item) { return item.face_to_face; }),
            backgroundColor: gcoChartColors[1],
            borderRadius: 4
          },
          {
            label: 'Online',
            data: data.map(function (item) { return item.online; }),
            backgroundColor: gcoChartColors[0],
            borderRadius: 4
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: { intersect: false, mode: 'index' },
        plugins: { legend: { position: 'bottom' } },
        scales: {
          x: {
            stacked: stacked,
            ticks: { autoSkip: false, maxRotation: 0, minRotation: 0, font: { size: 10 } }
          },
          y: { stacked: stacked, beginAtZero: true }
        }
      }
    });
  }

  function createPieChart(canvasId, data, cutout) {
    new Chart(document.getElementById(canvasId), {
      type: cutout ? 'doughnut' : 'pie',
      data: {
        labels: data.map(function (item) { return item.name; }),
        datasets: [{
          data: data.map(function (item) { return item.total; }),
          backgroundColor: [gcoChartColors[1], gcoChartColors[0], gcoChartColors[3]],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: cutout,
        plugins: { legend: { position: 'bottom' } }
      }
    });
  }

  function createYearLevelDonut(canvasId, level, index) {
    const remainingColors = ['#f9d9e7', '#fbdcd5', '#dcece5', '#e5d8fb'];

    new Chart(document.getElementById(canvasId), {
      type: 'doughnut',
      data: {
        labels: [level.name, 'Remaining'],
        datasets: [{
          data: [level.total, gcoReportTotal - level.total],
          backgroundColor: [gcoChartColors[index], remainingColors[index]],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '72%',
        plugins: {
          legend: { display: false },
          tooltip: { enabled: false },
          gcoCenterText: { text: String(level.total) }
        }
      }
    });
  }

  function createProgramChart(canvasId, data) {
    const canvas = document.getElementById(canvasId);
    const context = canvas.getContext('2d');
    const greenGradient = context.createLinearGradient(0, 0, canvas.parentElement.clientWidth, 0);
    greenGradient.addColorStop(0, '#78b89a');
    greenGradient.addColorStop(1, '#dcece5');

    new Chart(canvas, {
      type: 'bar',
      data: {
        labels: data.map(function (item) { return item.name; }),
        datasets: [
          {
            label: 'Face to Face',
            data: data.map(function (item) { return item.face_to_face; }),
            backgroundColor: gcoChartColors[1],
            borderRadius: 8
          },
          {
            label: 'Online',
            data: data.map(function (item) { return item.online; }),
            backgroundColor: gcoChartColors[0],
            borderRadius: 8
          },
          {
            label: 'Total Students',
            data: data.map(function (item) { return item.not_booked; }),
            backgroundColor: greenGradient,
            borderRadius: 8
          }
        ]
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        interaction: { intersect: false, mode: 'index' },
        plugins: { legend: { position: 'bottom' } },
        scales: {
          x: { stacked: true, beginAtZero: true },
          y: { stacked: true, ticks: { autoSkip: false } }
        }
      }
    });
  }

  createBarChart('gco_service_type_chart', gcoServiceTypes, false);
  createBarChart('gco_specialist_chart', gcoSpecialists, true);

  gcoYearLevels.forEach(function (level, index) {
    createYearLevelDonut('gco_year_level_chart_' + index, level, index);
  });

  createPieChart('gco_term_chart', gcoTerms, '65%');
  createPieChart('gco_school_year_chart', gcoSchoolYears, 0);
  createProgramChart('gco_program_chart', gcoPrograms);
</script>
