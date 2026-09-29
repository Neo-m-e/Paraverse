am5.ready(function () {
  const dataElement = document.getElementById("gco_report_data");

  if (!dataElement || typeof am5 === "undefined") {
    return;
  }

  const reportData = JSON.parse(dataElement.textContent);

  const colors = {
    orange: am5.color(0xff6b4a),
    pink: am5.color(0xe04987),
    green: am5.color(0x78b89a),
    purple: am5.color(0x7c3bea),
    dark: am5.color(0x181c32),
    muted: am5.color(0xa1a5b7),
    grid: am5.color(0xe4e6ef),
    white: am5.color(0xffffff)
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
});