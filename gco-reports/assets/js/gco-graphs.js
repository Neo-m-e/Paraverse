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

  function createRoot(id) {
    const root = am5.Root.new(id);

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

  // School Year solid pie chart
  function createSchoolYearPie(id, data) {
    const root = createRoot(id);

    const chart = root.container.children.push(
      am5percent.PieChart.new(root, {
        layout: root.verticalLayout
      })
    );

    const series = chart.series.push(
      am5percent.PieSeries.new(root, {
        alignLabels: false,
        calculateAggregates: true,
        valueField: "value",
        categoryField: "category"
      })
    );

    series.labels.template.set("visible", false);
    series.ticks.template.set("visible", false);

    series.slices.template.setAll({
      strokeWidth: 0,
      strokeOpacity: 0,
      tooltipText: "{category}: {value}"
    });

    series.get("colors").set("colors", [
      colors.orange,
      colors.pink,
      colors.purple
    ]);

    const schoolYearData = data.map(function (item) {
      return {
        value: item.total,
        category: item.name
      };
    });

    series.data.setAll(schoolYearData);
    series.appear(1000, 100);
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

  // Create Service Type chart
  createColumnChart(
    "gco_service_type_chart",
    reportData.serviceTypes,
    false
  );

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
  const termData = reportData.terms.map(function (item) {
    return {
      name: item.name,
      value: item.total
    };
  });

  createDonut(
    "gco_term_chart",
    termData,
    [
      colors.orange,
      colors.pink,
      colors.purple
    ],
    65
  );

  // Create School Year chart
  createSchoolYearPie(
    "gco_school_year_chart",
    reportData.schoolYears
  );

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

  let attendanceRoot;
  function drawAttendance() {
    if (attendanceRoot) {
      attendanceRoot.dispose();
    }
    const eventName = document.getElementById("gco_graph_event_filter").value;
    document.getElementById("gco_graph_selected_event").textContent = eventName;
    const filtered = reportData.eventAttendance.filter(function (item) {
      return !eventName || item.event === eventName;
    });
    const grouped = [];
    filtered.forEach(function (item) {
      let row = grouped.find(function (entry) { return entry.program === item.program; });
      if (!row) {
        row = { program: item.program, college: item.college, ccsma: 0, coe: 0 };
        grouped.push(row);
      }
      row[item.college.toLowerCase()] += item.attendees;
    });
    attendanceRoot = createRoot("gco_attendance_chart");
    const chart = attendanceRoot.container.children.push(am5xy.XYChart.new(attendanceRoot, { panX: false, panY: false, wheelX: "none", wheelY: "none", layout: attendanceRoot.verticalLayout }));
    const xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(attendanceRoot, { categoryField: "program", renderer: am5xy.AxisRendererX.new(attendanceRoot, { minGridDistance: 30 }) }));
    xAxis.data.setAll(grouped);
    const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(attendanceRoot, { min: 0, renderer: am5xy.AxisRendererY.new(attendanceRoot, {}) }));
    function addAttendanceSeries(name, field, color) {
      const series = chart.series.push(am5xy.ColumnSeries.new(attendanceRoot, { name: name, xAxis: xAxis, yAxis: yAxis, valueYField: field, categoryXField: "program", tooltip: am5.Tooltip.new(attendanceRoot, { labelText: "{name} - {categoryX}: {valueY}" }) }));
      series.columns.template.setAll({ fill: color, stroke: color, cornerRadiusTL: 4, cornerRadiusTR: 4 });
      series.data.setAll(grouped);
      return series;
    }
    const ccsma = addAttendanceSeries("CCSMA", "ccsma", colors.green);
    const coe = addAttendanceSeries("COE", "coe", colors.purple);
    addLegend(attendanceRoot, chart, [ccsma, coe]);
  }
  $("#gco_graph_event_filter").on("change", drawAttendance);
  drawAttendance();
});
