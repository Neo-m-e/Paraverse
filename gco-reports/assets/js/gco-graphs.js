am5.ready(function () {
  const dataElement = document.getElementById("gco_report_data");

  if (!dataElement || typeof am5 === "undefined") {
    return;
  }

  const reportData = JSON.parse(dataElement.textContent);

  const colors = {
    orange: am5.color(0xff4621),
    pink: am5.color(0xe04987),
    green: am5.color(0x78b89a),
    purple: am5.color(0x7c3bea),
    dark: am5.color(0x181c32),
    muted: am5.color(0xa1a5b7),
    grid: am5.color(0xe4e6ef),
    white: am5.color(0xffffff)
    ,red: am5.color(0xf1416c)
  };

  const chartRoots = {};

  function createRoot(id) {
    if (chartRoots[id]) {
      chartRoots[id].dispose();
    }
    const root = am5.Root.new(id);
    chartRoots[id] = root;

    root.setThemes([
      am5themes_Animated.new(root)
    ]);

    return root;
  }

  function addLegend(root, chart, seriesList) {
    const legend = chart.children.push(
      am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50,
        marginTop: 15
      })
    );

    legend.labels.template.setAll({
      fontSize: 12,
      fill: colors.muted
    });

    legend.data.setAll(seriesList);
  }

  // Service Type and Specialist charts
  function createColumnChart(id, data, stacked) {
    const root = createRoot(id);

    const chart = root.container.children.push(
      am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "none",
        wheelY: "none",
        layout: root.verticalLayout
      })
    );

    const xRenderer = am5xy.AxisRendererX.new(root, {
      minGridDistance: 25
    });

    xRenderer.labels.template.setAll({
      fontSize: 10,
      fill: colors.muted,
      oversizedBehavior: "wrap",
      maxWidth: 90,
      textAlign: "center"
    });

    xRenderer.grid.template.set("visible", false);

    const xAxis = chart.xAxes.push(
      am5xy.CategoryAxis.new(root, {
        categoryField: "name",
        renderer: xRenderer
      })
    );

    xAxis.data.setAll(data);

    const yRenderer = am5xy.AxisRendererY.new(root, {});

    yRenderer.labels.template.setAll({
      fontSize: 11,
      fill: colors.muted
    });

    yRenderer.grid.template.setAll({
      stroke: colors.grid,
      strokeOpacity: 0.7
    });

    const yAxis = chart.yAxes.push(
      am5xy.ValueAxis.new(root, {
        min: 0,
        strictMinMax: false,
        renderer: yRenderer
      })
    );

    function addSeries(name, field, color) {
      const series = chart.series.push(
        am5xy.ColumnSeries.new(root, {
          name: name,
          xAxis: xAxis,
          yAxis: yAxis,
          valueYField: field,
          categoryXField: "name",
          stacked: stacked,
          tooltip: am5.Tooltip.new(root, {
            labelText: "{name}: {valueY}"
          })
        })
      );

      series.columns.template.setAll({
        fill: color,
        stroke: color,
        cornerRadiusTL: 4,
        cornerRadiusTR: 4
      });

      // Number above each column
      series.bullets.push(function () {
        return am5.Bullet.new(root, {
          locationY: 0,
          sprite: am5.Label.new(root, {
            text: "{valueY}",
            populateText: true,
            fill: colors.dark,
            centerX: am5.p50,
            centerY: am5.p100,
            fontSize: 10,
            dy: -5
          })
        });
      });

      series.data.setAll(data);
      series.appear(600);

      return series;
    }

    const f2f = addSeries(
      "Face to Face",
      "face_to_face",
      colors.orange
    );

    const online = addSeries(
      "Online",
      "online",
      colors.pink
    );

    addLegend(root, chart, [f2f, online]);

    chart.appear(600, 100);
  }

  function createServiceTypeChart(id, data) {
    const root = createRoot(id);
    const chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelX: "none",
      wheelY: "none",
      layout: root.verticalLayout
    }));

    const yRenderer = am5xy.AxisRendererY.new(root, { inversed: true, minGridDistance: 30 });
    yRenderer.grid.template.set("visible", false);
    yRenderer.labels.template.setAll({
      fontSize: 10,
      fill: colors.dark,
      width: 180,
      paddingRight: 15,
      textAlign: "left",
      oversizedBehavior: "wrap"
    });
    const yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "name",
      renderer: yRenderer
    }));
    yAxis.data.setAll(data);

    const xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
    xRenderer.labels.template.setAll({ fontSize: 10, fill: colors.muted });
    xRenderer.grid.template.setAll({ stroke: colors.grid, strokeOpacity: 0.7 });
    const xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, { min: 0, renderer: xRenderer }));

    function addSeries(name, field, color) {
      const series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueXField: field,
        categoryYField: "name",
        tooltip: am5.Tooltip.new(root, { labelText: "{name}: {valueX}" })
      }));
      series.columns.template.setAll({ fill: color, stroke: color, height: am5.percent(65) });
      series.bullets.push(function () {
        return am5.Bullet.new(root, {
          locationX: 1,
          sprite: am5.Label.new(root, {
            text: "{valueX}",
            populateText: true,
            centerY: am5.p50,
            dx: 8,
            fontSize: 10,
            fontWeight: "600",
            fill: colors.dark
          })
        });
      });
      series.data.setAll(data);
      series.appear(600);
      return series;
    }

    const f2f = addSeries("Face to Face", "face_to_face", colors.orange);
    const online = addSeries("Online", "online", colors.purple);
    addLegend(root, chart, [f2f, online]);
    chart.appear(600, 100);
  }

  // Donut charts
  function createDonut(id, data, palette, holeRadius) {
    const root = createRoot(id);

    const chart = root.container.children.push(
      am5percent.PieChart.new(root, {
        layout: root.verticalLayout,
        innerRadius: am5.percent(holeRadius)
      })
    );

    const series = chart.series.push(
      am5percent.PieSeries.new(root, {
        valueField: "value",
        categoryField: "name",
        alignLabels: false
      })
    );

    series.labels.template.set("visible", false);
    series.ticks.template.set("visible", false);

    series.slices.template.setAll({
      strokeOpacity: 0,
      tooltipText: "{category}: {value}",
      templateField: "sliceSettings"
    });

    const chartData = data.map(function (item, index) {
      return {
        name: item.name,
        value: item.value,
        sliceSettings: {
          fill: palette[index],
          stroke: palette[index]
        }
      };
    });

    series.data.setAll(chartData);
    series.appear(600, 100);

    return root;
  }

  // School Year monthly column chart
  function createSchoolYearChart(id, data) {
    const root = createRoot(id);
    const chart = root.container.children.push(
      am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "none",
        wheelY: "none",
        layout: root.verticalLayout
      })
    );
    const xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 25 });
    xRenderer.grid.template.set("visible", false);
    xRenderer.labels.template.setAll({ fontSize: 10, fill: colors.muted });
    const xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, { categoryField: "name", renderer: xRenderer }));
    const termColors = [colors.orange, colors.pink, colors.purple];
    const chartData = data.map(function (item, index) {
      const columnColor = termColors[Math.floor(index / 4)];
      return {
        name: item.name.substring(0, 3),
        fullName: item.name,
        total: item.total,
        columnSettings: { fill: columnColor, stroke: columnColor }
      };
    });
    xAxis.data.setAll(chartData);
    const yRenderer = am5xy.AxisRendererY.new(root, {});
    yRenderer.labels.template.setAll({ fontSize: 10, fill: colors.muted });
    yRenderer.grid.template.setAll({ stroke: colors.grid, strokeOpacity: 0.7 });
    const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, { min: 0, renderer: yRenderer }));
    const series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: "Appointments",
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "total",
      categoryXField: "name",
      tooltip: am5.Tooltip.new(root, { labelText: "{fullName}: {valueY}" })
    }));
    series.columns.template.setAll({ templateField: "columnSettings", cornerRadiusTL: 4, cornerRadiusTR: 4 });
    series.bullets.push(function () {
      return am5.Bullet.new(root, { locationY: 1, sprite: am5.Label.new(root, { text: "{valueY}", populateText: true, centerX: am5.p50, centerY: am5.p100, dy: -5, fontSize: 10, fontWeight: "600", fill: colors.dark }) });
    });
    series.data.setAll(chartData);
    series.appear(600);
    chart.appear(600, 100);
  }

  // Appointments per Program
  function createProgramChart(id, data) {
    const root = createRoot(id);

    const chart = root.container.children.push(
      am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "none",
        wheelY: "none",
        layout: root.verticalLayout
      })
    );

    const yRenderer = am5xy.AxisRendererY.new(root, {
      inversed: true,
      minGridDistance: 18
    });

    yRenderer.grid.template.set("visible", false);

    yRenderer.labels.template.setAll({
      fontSize: 11,
      fontWeight: "600",
      fill: colors.dark
    });

    const yAxis = chart.yAxes.push(
      am5xy.CategoryAxis.new(root, {
        categoryField: "name",
        renderer: yRenderer
      })
    );

    yAxis.data.setAll(data);

    const xRenderer = am5xy.AxisRendererX.new(root, {});

    xRenderer.labels.template.setAll({
      fontSize: 10,
      fill: colors.muted
    });

    xRenderer.grid.template.setAll({
      stroke: colors.grid,
      strokeOpacity: 0.7
    });

    const xAxis = chart.xAxes.push(
      am5xy.ValueAxis.new(root, {
        min: 0,
        renderer: xRenderer
      })
    );

    function addSeries(name, field, color, labelColor) {
      const series = chart.series.push(
        am5xy.ColumnSeries.new(root, {
          name: name,
          xAxis: xAxis,
          yAxis: yAxis,
          valueXField: field,
          categoryYField: "name",
          stacked: true,
          tooltip: am5.Tooltip.new(root, {
            labelText: "{name}: {valueX}"
          })
        })
      );

      series.columns.template.setAll({
        fill: color,
        stroke: color,
        height: am5.percent(58)
      });

      // Number inside each colored section
      series.bullets.push(function () {
        return am5.Bullet.new(root, {
          locationX: 0.5,
          sprite: am5.Label.new(root, {
            text: "{valueX}",
            populateText: true,
            centerX: am5.p50,
            centerY: am5.p50,
            fill: labelColor,
            fontSize: 11,
            fontWeight: "600"
          })
        });
      });

      series.data.setAll(data);
      series.appear(600);

      return series;
    }

    const f2f = addSeries(
      "Face to Face",
      "face_to_face",
      colors.orange,
      colors.white
    );

    const online = addSeries(
      "Online",
      "online",
      colors.pink,
      colors.white
    );

    const notBooked = addSeries(
      "Not Booked",
      "not_booked",
      colors.green,
      colors.dark
    );

    addLegend(root, chart, [
      f2f,
      online,
      notBooked
    ]);

    chart.appear(600, 100);
  }

  function createSpecialistSummaryChart(id, data) {
    const root = createRoot(id);
    const chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelX: "none",
      wheelY: "none"
    }));
    const yRenderer = am5xy.AxisRendererY.new(root, { inversed: true, minGridDistance: 35 });
    yRenderer.grid.template.set("visible", false);
    yRenderer.labels.template.setAll({ fontSize: 11, fontWeight: "600", fill: colors.dark, width: 180, textAlign: "left", oversizedBehavior: "truncate" });
    const yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, { categoryField: "name", renderer: yRenderer }));
    yAxis.data.setAll(data);
    const xRenderer = am5xy.AxisRendererX.new(root, {});
    xRenderer.labels.template.set("visible", false);
    xRenderer.grid.template.set("visible", false);
    const xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, { min: 0, max: 150, strictMinMax: true, renderer: xRenderer }));
    const trackSeries = chart.series.push(am5xy.ColumnSeries.new(root, {
      xAxis: xAxis,
      yAxis: yAxis,
      valueXField: "capacity",
      categoryYField: "name",
      clustered: false
    }));
    trackSeries.columns.template.setAll({ fill: colors.grid, fillOpacity: 0.55, strokeOpacity: 0, height: am5.percent(22), cornerRadiusTR: 6, cornerRadiusBR: 6 });

    const series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: "Appointments",
      xAxis: xAxis,
      yAxis: yAxis,
      valueXField: "appointments",
      categoryYField: "name",
      clustered: false,
      tooltip: am5.Tooltip.new(root, { labelText: "{name}\nAppointments: {appointments}\nRating: {rating}/5" })
    }));
    series.columns.template.setAll({ fill: colors.pink, stroke: colors.pink, height: am5.percent(22), cornerRadiusTR: 6, cornerRadiusBR: 6 });
    series.bullets.push(function () {
      return am5.Bullet.new(root, {
        locationX: 1,
        sprite: am5.Label.new(root, {
          text: "{appointments}",
          populateText: true,
          centerY: am5.p50,
          dx: 8,
          fontSize: 11,
          fontWeight: "700",
          fill: colors.dark
        })
      });
    });

    const ratingSeries = chart.series.push(am5xy.LineSeries.new(root, {
      xAxis: xAxis,
      yAxis: yAxis,
      valueXField: "ratingPosition",
      categoryYField: "name"
    }));
    ratingSeries.strokes.template.set("visible", false);
    ratingSeries.bullets.push(function () {
      return am5.Bullet.new(root, {
        sprite: am5.Label.new(root, {
          text: "★ {rating}/5",
          populateText: true,
          centerX: am5.p50,
          centerY: am5.p50,
          fontSize: 11,
          fontWeight: "600",
          fill: colors.orange
        })
      });
    });
    trackSeries.data.setAll(data);
    series.data.setAll(data);
    ratingSeries.data.setAll(data);
  }

  function createStudentEvaluationChart(id, data) {
    const root = createRoot(id);
    const chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelX: "none",
      wheelY: "none",
      layout: root.verticalLayout
    }));

    const yRenderer = am5xy.AxisRendererY.new(root, {
      inversed: true,
      minGridDistance: 18
    });
    yRenderer.grid.template.set("visible", false);
    yRenderer.labels.template.setAll({
      fontSize: 11,
      fontWeight: "600",
      fill: colors.dark
    });
    const yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "name",
      renderer: yRenderer
    }));
    yAxis.data.setAll(data);

    const xRenderer = am5xy.AxisRendererX.new(root, {});
    xRenderer.labels.template.setAll({ fontSize: 10, fill: colors.muted });
    xRenderer.grid.template.setAll({ stroke: colors.grid, strokeOpacity: 0.7 });
    const xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
      min: 0,
      maxPrecision: 0,
      renderer: xRenderer
    }));

    function addEvaluationSeries(name, field, color) {
      const series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueXField: field,
        categoryYField: "name",
        stacked: true,
        tooltip: am5.Tooltip.new(root, { labelText: "{name}: {valueX}" })
      }));

      series.columns.template.setAll({
        fill: color,
        stroke: color,
        height: am5.percent(58)
      });

      series.bullets.push(function () {
        return am5.Bullet.new(root, {
          locationX: 0.5,
          sprite: am5.Label.new(root, {
            text: "{valueX}",
            populateText: true,
            centerX: am5.p50,
            centerY: am5.p50,
            fontSize: 11,
            fontWeight: "600",
            fill: colors.white
          })
        });
      });

      series.data.setAll(data);
      series.appear(600);
      return series;
    }

    const candidateSeries = addEvaluationSeries("Candidates", "candidate", colors.orange);
    const specialCaseSeries = addEvaluationSeries("Special Cases", "special_case", colors.pink);
    addLegend(root, chart, [candidateSeries, specialCaseSeries]);
    chart.appear(600, 100);
  }

  // Overall service type comparison: stacked horizontal bars, distinct from grouped purpose charts.
  function createOverallServiceChart(id, data) {
    const root = createRoot(id);
    const chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false, panY: false, wheelX: "none", wheelY: "none",
      layout: root.verticalLayout, paddingRight: 40
    }));
    const yRenderer = am5xy.AxisRendererY.new(root, { inversed: true, minGridDistance: 35 });
    yRenderer.grid.template.set("visible", false);
    yRenderer.labels.template.setAll({ fontSize: 12, fill: colors.dark, width: 225,
      oversizedBehavior: "wrap", textAlign: "left", paddingRight: 12 });
    const yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "name", renderer: yRenderer
    }));
    yAxis.data.setAll(data);
    const xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 35 });
    xRenderer.labels.template.setAll({ fontSize: 11, fill: colors.muted });
    xRenderer.grid.template.setAll({ stroke: colors.grid, strokeOpacity: 0.5 });
    const xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
      min: 0, extraMax: 0.12, renderer: xRenderer
    }));
    function segment(name, field, color, showTotal) {
      const series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name, xAxis: xAxis, yAxis: yAxis, stacked: true,
        valueXField: field, categoryYField: "name",
        tooltip: am5.Tooltip.new(root, { labelText: "{categoryY} · {name}: {valueX}" })
      }));
      series.columns.template.setAll({ fill: color, stroke: color, height: am5.percent(55) });
      series.bullets.push(function () {
        return am5.Bullet.new(root, { locationX: 0.5, sprite: am5.Label.new(root, {
          text: "{valueX}", populateText: true, centerX: am5.p50, centerY: am5.p50,
          fill: colors.white, fontSize: 11, fontWeight: "600"
        }) });
      });
      if (showTotal) {
        series.bullets.push(function () {
          return am5.Bullet.new(root, { locationX: 1, sprite: am5.Label.new(root, {
            text: "{total}", populateText: true, dx: 10, centerY: am5.p50,
            fill: colors.dark, fontSize: 12, fontWeight: "600"
          }) });
        });
      }
      series.data.setAll(data);
      series.appear(500);
    }
    segment("Face-to-Face", "face_to_face", colors.orange, false);
    segment("Online", "online", colors.purple, true);
    chart.appear(500, 100);
  }

  createOverallServiceChart("gco_service_overall_chart", reportData.serviceTypes);

  // Four dedicated purpose charts; retain the existing amCharts grouped-bar renderer.
  Object.keys(reportData.appointmentPurposes).forEach(function (serviceType, index) {
    createServiceTypeChart("gco_service_purpose_" + index, reportData.appointmentPurposes[serviceType]);
  });

  // Create Specialist chart
  createColumnChart(
    "gco_specialist_chart",
    reportData.specialists,
    true
  );

  // Create Year Level charts
  const yearPalettes = [
    [
      am5.color(0xef765d),
      am5.color(0xf6c8be)
    ],
    [
      am5.color(0xd93b79),
      am5.color(0xefb6cd)
    ],
    [
      am5.color(0x8146dd),
      am5.color(0xcbb4ef)
    ],
    [
      am5.color(0x22a4d6),
      am5.color(0xa9dcec)
    ]
  ];

  reportData.yearLevels.forEach(function (level, index) {
    createDonut(
      "gco_year_level_chart_" + index,
      [
        {
          name: "Face to Face",
          value: level.face_to_face
        },
        {
          name: "Online",
          value: level.online
        }
      ],
      yearPalettes[index],
      70
    );
  });

  // Create Term chart
  function renderTermChart(data) {
    createDonut(
      "gco_term_chart",
      data.map(function (item) { return { name: item.name, value: item.total }; }),
      [colors.orange, colors.pink, colors.purple, am5.color(0x41b5e8)],
      65
    );
    const total = data.reduce(function (sum, item) { return sum + item.total; }, 0);
    $('#gco_term_total').text(total.toLocaleString());
    data.forEach(function (item, index) {
      $('#gco_term_name_' + index).text(item.name);
      $('#gco_term_value_' + index).text(item.total.toLocaleString());
    });
  }

  renderTermChart(reportData.terms);

  // Create School Year chart
  createSchoolYearChart(
    "gco_school_year_chart",
    reportData.schoolYears
  );

  document.addEventListener('gco:termChanged', function (event) {
    renderTermChart(event.detail.rows);
  });

  document.addEventListener('gco:schoolYearChanged', function (event) {
    createSchoolYearChart('gco_school_year_chart', event.detail.rows);
    const total = event.detail.rows.reduce(function (sum, item) { return sum + item.total; }, 0);
    $('#gco_school_year_total').text(total.toLocaleString());
  });

  // Create Program chart
  createProgramChart(
    "gco_program_chart",
    reportData.programs
  );

  const evaluationData = reportData.specialists.map(function (item) {
    return { name: item.name, appointments: item.total, rating: item.rating, capacity: 100, ratingPosition: 132 };
  });
  createSpecialistSummaryChart("gco_evaluation_chart", evaluationData);
  createStudentEvaluationChart("gco_student_evaluation_chart", reportData.specialCaseSummary);

  function drawAttendance() {
    const eventName = document.getElementById("gco_graph_event_filter").value;
    document.getElementById("gco_graph_selected_event").textContent = eventName;
    const filtered = reportData.eventAttendance.filter(function (item) {
      return !eventName || item.event === eventName;
    });

    function createProgramPie(id, college, palette) {
      const root = createRoot(id);
      const chart = root.container.children.push(am5percent.PieChart.new(root, { innerRadius: 0 }));
      const series = chart.series.push(am5percent.PieSeries.new(root, {
        valueField: "value",
        categoryField: "name"
      }));
      series.slices.template.setAll({
        templateField: "sliceSettings",
        stroke: colors.white,
        strokeWidth: 2,
        tooltipText: "{category}: {value} attendees ({valuePercentTotal.formatNumber('0.0')}%)"
      });
      series.labels.template.setAll({
        text: "{category}: {value}",
        fontSize: 10,
        fill: colors.dark,
        maxWidth: 130,
        oversizedBehavior: "truncate"
      });
      const chartData = filtered.filter(function (item) {
        return item.college === college;
      }).map(function (item, index) {
        return {
          name: item.program,
          value: item.attendees,
          sliceSettings: { fill: palette[index % palette.length], stroke: colors.white }
        };
      });
      series.data.setAll(chartData);
      series.appear(600, 100);
    }

    const programPalette = [
      colors.orange,
      colors.pink,
      colors.green,
      colors.purple,
      am5.color(0x41b5e8)
    ];

    createProgramPie("gco_attendance_ccsma_chart", "CCSMA", programPalette);
    createProgramPie("gco_attendance_coe_chart", "COE", programPalette);
  }
  $("#gco_graph_event_filter").on("change", drawAttendance);
  drawAttendance();
});
