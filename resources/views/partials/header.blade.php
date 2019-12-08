<header>
  <div class="container-fluid fh5co_header_bg">
    <div class="container">
      <div class="row">
        <div class="col-12 fh5co_mediya_center"><a href="#" class="color_fff fh5co_mediya_setting"><i
                class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;<?php echo date("l") . ' , '
					. date("d m 20y");?></a>
          <div class="d-inline-block fh5co_trading_posotion_relative"><a href="#trending"
                                                                         class="treding_btn">Trending</a>
            <div class="fh5co_treding_position_absolute"></div>
          </div>
          <a href="#" class="color_fff fh5co_mediya_setting">This place for your Ad. It is a free.</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-3 fh5co_padding_menu">
          <img src="{{asset('images/logo.png')}}" alt="logo" class="fh5co_logo_width"/>
        </div>
        <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
          <div class="text-center d-inline-block">
            <a class="fh5co_display_table">
              <div class="fh5co_verticle_middle"><i class="fa fa-search"></i></div>
            </a>
          </div>
          <div class="text-center d-inline-block">
            <a class="fh5co_display_table">
              <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
            </a>
          </div>
          <div class="text-center d-inline-block">
            <a class="fh5co_display_table">
              <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
            </a>
          </div>
          <div class="text-center d-inline-block">
            <a href="https://twitter.com/fh5co" target="_blank" class="fh5co_display_table">
              <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
            </a>
          </div>
          <div class="text-center d-inline-block">
            <a href="https://fb.com/fh5co" target="_blank" class="fh5co_display_table">
              <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
      <nav class="navbar navbar-toggleable-md navbar-light ">
        <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
        <a class="navbar-brand" href="#"><img src="{{asset('images/logo.png')}}" alt="logo"
                                              class="mobile_logo_width"/></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          {{ csrf_field() }}
          <ul id="content" class="navbar-nav mr-auto">
            <li class="nav-item mr-4">
              <p class="select-header">Select a country:</p>
              <label class="select">
                <select name="news_country" id="news_country" class="form-control fh5co_text_select_option">
                  <option value="{{$countryId}}">{{$countryName}}</option>
                  @foreach ($newsCountries as $key =>$value)
                    <option value="{{$key}}">{{$value}}</option>
                  @endforeach
                </select>
              </label>
            </li>
            <li class="nav-item">
              <p class="select-header">Select a category:</p>
              <label class="select">
                <select name="news_category" id="news_category" class="form-control fh5co_text_select_option">
                  <option value="{{$categoryId}}">{{$categoryName}}</option>
                  @foreach ($newsCategories as $key =>$value)
                    <option value="{{$key}}">{{$value}}</option>
                  @endforeach
                </select>
              </label>
            </li>
          </ul>
          <object id="spinner" data="{{asset('spinner.svg')}}" type="image/svg+xml" hidden></object>
        </div>
      </nav>
    </div>
  </div>
</header>
