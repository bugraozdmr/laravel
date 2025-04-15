<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Localization</title>

  </head>

  <body>
    <div class="container">
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">Navbar</a>
          <form class="d-flex" method="GET" action="/">
            <select class="form-select" name="lang" onchange="this.form.submit()">
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                <option value="tr" {{ app()->getLocale() == 'tr' ? 'selected' : '' }}>Türkçe</option>
            </select>
        </form>         
        </div>
      </nav>


      <div class="row">
        <div class="col-md-6">
          <div class="card mt-3">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ __('messages.card1.title') }}</h5>
              <p class="card-text">{{ __('messages.card1.content') }}</p>
              <a href="#" class="btn btn-primary">{{ __('messages.button.go') }}</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card mt-3">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ __('messages.card2.title') }}</h5>
              <p class="card-text">{{ __('messages.card2.content') }}</p>
              <a href="#" class="btn btn-primary">{{ __('messages.button.go') }}</a>
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>