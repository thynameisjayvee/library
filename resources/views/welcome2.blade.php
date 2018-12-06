<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
        <script type="text/javascript" src="{{asset('js/jquery.twbsPagination.min.js')}}"></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.css')}}" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    </head>
    <body>
        <header>
          <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="#"><b>geechs</b> job</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item text-nowrap">
                  <button class="btn btn-primary btn-sm mr-4" href="#">dummy</button>
                </li>
                <li class="nav-item text-nowrap">
                  <img src="{{asset('book1.jpg')}}" alt="..." class="rounded-circle" width="30px" height="30px">
                </li>
              </ul>
            </div>
          </nav>
        </header>

        <main>
          <div class="container-fluid">
            <div class="row mt-2">
              <div class="col-11">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Work Time Management</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="container">
                      <canvas id="myChart"></canvas>
                      <script>
                      var ctx = document.getElementById("myChart").getContext('2d');
                      var myChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                              labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                              datasets: [{
                                  label: '# of Votes',
                                  data: [5, 3, 2.20, 3 , 5.04, 5],
                                  backgroundColor: [
                                      'rgba(255, 99, 132, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(255, 206, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(255, 159, 64, 0.2)'
                                  ],
                                  borderColor: [
                                      'rgba(255,99,132,1)',
                                      'rgba(54, 162, 235, 1)',
                                      'rgba(255, 206, 86, 1)',
                                      'rgba(75, 192, 192, 1)',
                                      'rgba(153, 102, 255, 1)',
                                      'rgba(255, 159, 64, 1)'
                                  ],
                                  borderWidth: 1
                              }]
                          },
                          options: {
                              scales: {
                                  yAxes: [{
                                      ticks: {
                                          beginAtZero:true
                                      }
                                  }]
                              }
                          }
                      });
                      </script>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="container">
                      <nav aria-label="Page navigation example" class="mt-2">
                        <ul id="pagination-demo" class="pagination justify-content-center">
                        </ul>
                        <script type="text/javascript">
                        $('#pagination-demo').twbsPagination({
                            page: 'data',
                            totalPages: 35,
                            visiblePages: 7,
                            onPageClick: function (event, page) {
                                $('#page-content').text('Page ' + page);
                            }
                        });
                        </script>
                      </nav>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">......</div>
                </div>
              </div>
              <div class="col-1 mt-5">
                <ul class="navbar-nav">
                  <li class="mb-5"><i class="fa fa-user fa-3x"></i></li>
                  <li class="mb-5"><i class="fa fa-user fa-3x"></i></li>
                  <li class="mb-5"><i class="fa fa-user fa-3x"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </main>

        <footer>
        </footer>

        <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap-multiselect.js')}}"></script>
    </body>
</html>
