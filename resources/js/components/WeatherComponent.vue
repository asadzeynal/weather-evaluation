<template>
  <div>
    <div id="weatherChart">
      <div class="row">
        <current-weather :options="currentOptions"></current-weather>
        <line-chart class="mt-3" style="width: 100%" v-if="loaded" :chartdata="chartdata" :options="options" />
      </div>
    </div>
  </div>
</template>

<script>
import LineChart from "./LineChart.js";
import CurrentWeather from "./CurrentWeather";

export default {
  components: { LineChart, CurrentWeather },
  data: () => ({
    loaded: false,
    chartdata: null,
    data: null,
    options: null,
    currentOptions: {
      current: null,
      windSpeed: null,
      humidity: null,
      feelsLike: null,
      pressure: null
    }
  }),
  async mounted() {
    let labelObjects = [];
    this.loaded = false;
    try {
      this.data = (
        await axios.get(
          "/api/weather"
        )
      ).data;
      this.options = setupChartOptions();
      this.currentOptions = setupCurrentWeatherOptions(this.data);
      this.chartdata = {
        labels: setupDateArray(),
        datasets: [
          {
            label: "Daily Forecast",
            data: [
              this.data.daily[1].temp.day,
              this.data.daily[2].temp.day,
              this.data.daily[3].temp.day,
              this.data.daily[4].temp.day,
              this.data.daily[5].temp.day,
              this.data.daily[6].temp.day
            ],
            backgroundColor: "rgba(255, 220, 0, 0.45)",
            borderColor: "#FFDC00"
          }
        ]
      };
      this.loaded = true;
    } catch (e) {
      console.error(e);
    }
  }
};

function setupDateArray() {
  var days = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday"
  ];
  let day0 = new Date();
  let day1 = new Date(day0);
  let day2 = new Date(day0);
  let day3 = new Date(day0);
  let day4 = new Date(day0);
  let day5 = new Date(day0);
  let day6 = new Date(day0);
  day1.setDate(day0.getDate() + 1);
  day2.setDate(day0.getDate() + 2);
  day3.setDate(day0.getDate() + 3);
  day4.setDate(day0.getDate() + 4);
  day5.setDate(day0.getDate() + 5);
  day6.setDate(day0.getDate() + 6);
  return [
    days[day1.getDay()],
    days[day2.getDay()],
    days[day3.getDay()],
    days[day4.getDay()],
    days[day5.getDay()],
    days[day6.getDay()]
  ];
}

function setupCurrentWeatherOptions(data) {
  return {
    currentTemp: data.current.temp,
    windSpeed: data.current.wind_speed,
    humidity: data.current.humidity,
    feelsLike: data.current.feels_like,
    pressure: data.current.pressure
  };
}

function setupChartOptions() {
  return {
    legend: {
      display: false
    },
    aspectRatio: 2,
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      xAxes: [
        {
          gridLines: {
            display: false
          }
        }
      ],
      yAxes: [
        {
          gridLines: {
            display: false
          },
          ticks: {
            display: false
          }
        }
      ]
    },
    plugins: {
      datalabels: {
        color: "#474747",
        offset: 14,
        anchor: "end",
        font: { size: 15 },
        padding: { bottom: 10 }
      }
    }
  };
}
</script>
