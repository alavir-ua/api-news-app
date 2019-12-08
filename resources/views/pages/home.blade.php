@extends('app')
@section('content')
  <main>
    <div class="container-fluid pb-4 pt-4 paddding">
      <div class="container paddding">
        <div class="row mx-0">
          <div class="col-md-8 animate-box news" data-animate-effect="fadeInLeft">
            <div>
              <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News&nbsp;<span class="flag flag-{{$countryId}}"></span></div>
            </div>
            @foreach($news as $new)
              <div class="row pb-4">
                <div class="col-md-5">
                  <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="{{$new['urlToImage']}}" alt=""/></div>
                    <div></div>
                  </div>
                </div>
                <div class="col-md-7 animate-box">
                  <p class="fh5co_magna py-2">{{$new['title']}}</p> <a
                      target="_blank" href="{{$new['url']}}"
                      class="fh5co_mini_time py-3">Author: {{$new['author'] ? : "Unknown" }} -
                    @if($news['publishedAt'] !== null)
                      Date
                      Published: {{ Carbon\Carbon::parse($new['publishedAt'])->format('l jS \\of F Y ')
                      }}@else
                      Date Published: Unknown
                    @endif
                  </a>
                  <div class="fh5co_consectetur">{{$new['description']}}
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
            <div>
              <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
            </div>
            <div class="clearfix"></div>
            <div class="fh5co_tags_all">
              <a href="https://www.ft.com/" target="_blank" class="fh5co_tagg">Business</a>
              <a href="https://techcrunch.com/" target="_blank" class="fh5co_tagg">Technology</a>
              <a href="https://www.similarweb.com/website/espn.com" target="_blank" class="fh5co_tagg">Sport</a>
              <a href="https://www.similarweb.com/website/trendyol.com" target="_blank" class="fh5co_tagg">Lifestyle</a>
              <a href="https://www.similarweb.com/website/flickr.com" target="_blank" class="fh5co_tagg">Photography</a>
              <a href="https://frieze.com/editorial" target="_blank" class="fh5co_tagg">Art</a>
              <a href="https://www.similarweb.com/website/instructure.com" target="_blank" class="fh5co_tagg">Education</a>
              <a href="https://www.facebook.com/" target="_blank" class="fh5co_tagg">Social</a>
              <a href="https://vacationidea.com/" target="_blank" class="fh5co_tagg">Best Places</a>
            </div>
            <div>
              <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular
                Sources of {{$countryName}}</div>
            </div>
            @foreach ($sources as $source)
              <div class="row pb-3">
                <div class="col-12 ">
                  <div class="most_fh5co_treding_font"><a
                        target="_blank" href="{{$source['url']}}"
                        class="fh5co_mini_time">{{$source['name']}}</a></div>
                  <div class="most_fh5co_treding_font_123">{{$source['description']}}</div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="row mx-0">
          <div class="col-12 text-center pb-4 pt-4">
            {{ $news->links() }}
          </div>
        </div>
      </div>
    </div>
    <div id="trending" class="container-fluid pb-4 pt-5">
      <div class="container animate-box">
        <div>
          <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
          @foreach ($trending as $trend)
            <div class="item px-2">
              <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><img src="{{$trend['urlToImage']}}" alt="img"/></div>
                <br>
                <div>
                  <div class="d-block fh5co_small_post_heading"><span
                        class="">{{$trend['title']}}</span>
                  </div>
                  <a href="{{$trend['url']}}" target="_blank" class="fh5co_mini_time py-3">
                    @if($trend['publishedAt'] !== null)
                      Date
                      Published: {{ Carbon\Carbon::parse($trend['publishedAt'])->format('l jS \\of F Y ')
                      }}@else
                      Date Published: Unknown
                    @endif
                    Author: {{$trend['author'] ? : "Unknown" }}
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </main>
@endsection
