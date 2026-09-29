am5.ready(function () {
  const dataElement = document.getElementById('gco_report_data');
  if (!dataElement || typeof am5 === 'undefined') return;

  const reportData = JSON.parse(dataElement.textContent);
  const colors = {
    orange: am5.color(0xff6b4a), pink: am5.color(0xe04987),
    green: am5.color(0x78b89a), purple: am5.color(0x7c3bea),
    dark: am5.color(0x181c32), muted: am5.color(0xa1a5b7),
    grid: am5.color(0xe4e6ef)
  };

  function createRoot(id) {
    const root = am5.Root.new(id);
    root.setThemes([am5themes_Animated.new(root)]);
    return root;
  }

  function addLegend(root, chart, seriesList) {
    const legend = chart.children.push(am5.Legend.new(root, {
      centerX: am5.p50, x: am5.p50, marginTop: 15
    }));
    legend.labels.template.setAll({ fontSize: 12, fill: colors.muted });
    legend.data.setAll(seriesList);
  }

  function createColumnChart(id, data, stacked) {
    const root = createRoot(id);
    const chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false, panY: false, wheelX: 'none', wheelY: 'none',
      layout: root.verticalLayout
    }));
    const xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 25 });
    xRenderer.labels.template.setAll({
      fontSize: 10, fill: colors.muted, oversizedBehavior: 'wrap',
      maxWidth: 90, textAlign: 'center'
    });
    xRenderer.grid.template.set('visible', false);
    const xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: 'name', renderer: xRenderer
    }));
    xAxis.data.setAll(data);

    const yRenderer = am5xy.AxisRendererY.new(root, {});
    yRenderer.labels.template.setAll({ fontSize: 11, fill: colors.muted });
    yRenderer.grid.template.setAll({ stroke: colors.grid, strokeOpacity: 0.7 });
    const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      min: 0, strictMinMax: false, renderer: yRenderer
    }));

    function addSeries(name, field, color) {
      const series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name, xAxis: xAxis, yAxis: yAxis, valueYField: field,
        categoryXField: 'name', stacked: stacked,
        tooltip: am5.Tooltip.new(root, { labelText: '{name}: {valueY}' })
      }));
      series.columns.template.setAll({
        fill: color, stroke: color, cornerRadiusTL: 4, cornerRadiusTR: 4
      });
      series.data.setAll(data);
      series.bullets.push(function () {
        return am5.Bullet.new(root, {
          locationY: 0,
          sprite: am5.Label.new(root, {
            text: '{valueY}', fill: colors.dark,
            centerY: am5.p100, centerX: am5.p50,
            populateText: true, fontSize: 10, dy: -5
          })
        });
      });
      series.appear(600);
      return series;
    }

    const f2f = addSeries('Face to Face', 'face_to_face', colors.orange);
    const online = addSeries('Online', 'online', colors.pink);
    addLegend(root, chart, [f2f, online]);
    chart.appear(600, 100);
  }

  function createDonut(id, data, palette, holeRadius) {
    const root = createRoot(id);
    const chart = root.container.children.push(am5percent.PieChart.new(root, {
      layout: root.verticalLayout, innerRadius: am5.percent(holeRadius)
    }));
    const series = chart.series.push(am5percent.PieSeries.new(root, {
      valueField: 'value', categoryField: 'name', alignLabels: false
    }));
    series.labels.template.set('visible', false);
    series.ticks.template.set('visible', false);
    series.slices.template.setAll({
      strokeOpacity: 0,
      tooltipText: '{category}: {value}',
      templateField: 'sliceSettings'
    });
    series.data.setAll(data.map(function (item, index) {
      return {
        name: item.name,
        value: item.value,
        sliceSettings: { fill: palette[index], stroke: palette[index] }
      };
    }));

    series.appear(600, 100);
  }

  function createSchoolYearPie(id, data) {
    // Based directly on Metronic's amCharts Pie Chart example.
    var root = createRoot(id);
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
      layout: root.verticalLayout
    }));
    var series = chart.series.push(am5percent.PieSeries.new(root, {
      alignLabels: false,
      calculateAggregates: true,
      valueField: 'value',
      categoryField: 'category'
    }));

    series.labels.template.set('visible', false);
    series.ticks.template.set('visible', false);
    series.slices.template.setAll({
      strokeWidth: 0,
      strokeOpacity: 0,
      tooltipText: '{category}: {value}'
    });
    series.get('colors').set('colors', [colors.orange, colors.pink, colors.green]);
    series.data.setAll(data.map(function (item) {
      return {
        value: item.total,
        category: item.name
      };
    }));
    series.appear(1000, 100);
  }

  function createProgramChart(id, data) {
    const root = createRoot(id);
    const chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false, panY: false, wheelX: 'none', wheelY: 'none',
      layout: root.verticalLayout
    }));
    const yRenderer = am5xy.AxisRendererY.new(root, {
      inversed: true, minGridDistance: 18
    });
    yRenderer.grid.template.set('visible', false);
    yRenderer.labels.template.setAll({
      fontSize: 11, fontWeight: '600', fill: colors.dark
    });
    const yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: 'name', renderer: yRenderer
    }));
    yAxis.data.setAll(data);

    const xRenderer = am5xy.AxisRendererX.new(root, {});
    xRenderer.labels.template.setAll({ fontSize: 10, fill: colors.muted });
    xRenderer.grid.template.setAll({ stroke: colors.grid, strokeOpacity: 0.7 });
    const xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
      min: 0, renderer: xRenderer
    }));

    function addSeries(name, field, color) {
      const series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name, xAxis: xAxis, yAxis: yAxis, valueXField: field,
        categoryYField: 'name', stacked: true,
        tooltip: am5.Tooltip.new(root, { labelText: '{name}: {valueX}' })
      }));
      series.columns.template.setAll({
        fill: color, stroke: color, height: am5.percent(58)
      });
      series.data.setAll(data);
      series.appear(600);
      return series;
    }

    const f2f = addSeries('Face to Face', 'face_to_face', colors.orange);
    const online = addSeries('Online', 'online', colors.pink);
    const notBooked = addSeries('Not Booked', 'not_booked', colors.green);
    addLegend(root, chart, [f2f, online, notBooked]);
    chart.appear(600, 100);
  }

  createColumnChart('gco_service_type_chart', reportData.serviceTypes, false);
  createColumnChart('gco_specialist_chart', reportData.specialists, true);

  const yearPalettes = [
    [am5.color(0xef765d), am5.color(0xf6c8be)],
    [am5.color(0xd93b79), am5.color(0xefb6cd)],
    [am5.color(0x8146dd), am5.color(0xcbb4ef)],
    [am5.color(0x22a4d6), am5.color(0xa9dcec)]
  ];
  reportData.yearLevels.forEach(function (level, index) {
    createDonut('gco_year_level_chart_' + index, [
      { name: 'Face to Face', value: level.face_to_face },
      { name: 'Online', value: level.online }
    ], yearPalettes[index], 70);
  });

  createDonut('gco_term_chart', reportData.terms.map(function (item) {
    return { name: item.name, value: item.total };
  }), [colors.orange, colors.pink, colors.purple], 65);

  createSchoolYearPie('gco_school_year_chart', reportData.schoolYears);

  createProgramChart('gco_program_chart', reportData.programs);
});
