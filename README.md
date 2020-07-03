
# Weather Evaluation Project

  

This SPA app displays current weather in Baku, Azerbaijan as well as current time.

  

Deployed version: <a  href="http://wthreval.herokuapp.com">App</a>

  

## Getting Started
  

### Prerequisites

  

The easiest way to run the application is by setting up <a  href="https://laravel.com/docs/7.x/homestead">Laravel Homestead</a> vagrant box.

If you decide not to use Homestead, you can run a project locally as a regular laravel app.  

For your comfort, the project has already been deployed and the link is included above.

This project does not require any database. 
  



## Project Details

The project was initially scaffolded using the laravel/ui package.
### AdminLTE 3
 AdminLTE theme was applied through <a href="https://github.com/jeroennoten/Laravel-AdminLTE">jeroennoten/laravel-adminlte</a> package, which provides a nice interface for AdminLTE components and styles to be used in blade templates.  

### ChartJS
<a href="https://www.chartjs.org/">ChartJS</a> is a highly functional tool for displaying charts using JS. It was used to draw a line chart of the weekly weather forecasts.

### Vue js
Vue components were heavily used in the project. There are 4 of them in total. WeatherComponent and TimeComponent are called in the root template directly. Weather components uses LineChart and CurrentWeather components in itself. LineChart extends the Line component from ChartJS. Such separation gives the code high reusability.

### API Calls
APIs used are: 

 - <a href="https://openweathermap.org">Open Weather</a>
 - <a href="https://worldtimeapi.org">World Time API</a>

Open Weather gives users many free and paid APIs for different purposes. For this project <a href="https://openweathermap.org/api/one-call-api">One Call API</a> was used, as it provides forecast data in addition to current weather.

Requests are made using Axios library. Weather data is fetched once on mount of the component, however the time data is fetched every second.

#### CORS
As both APIs block cross-origin requests, it was not possible to directly call them from client side using axios (except if https://cors-anywhere.herokuapp.com/ was prepended to the url, which is not a very elegant and reliable solution). Considering that, the client requests the backend, which fetches data from the apis and returns it to the client side.
  

## Built With

 
*  [Laravel](https://laravel.com/) - The web framework used

*  [Vue](https://vuejs.org/) - Frontend JS framework
  

## Authors

  

*  **Asad Zeynalov**

## Acknowledgments

  
Thanks to thousands of stackoverflow users, whose answers were so useful when writing this app.
