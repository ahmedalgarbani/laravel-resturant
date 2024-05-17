<section class="fp__download mt_100 xs_mt_70">
    <div class="fp__download_bg" style="background: url({{$appDownload->background}});">
        <div class="fp__download_overlay">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-5 col-md-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__download_img">
                            <img src="{{asset($appDownload->image)}}" alt="download" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__download_text">
                            <div class="fp__section_heading mb_25">
                                <h2>{{$appDownload->title}}</h2>
                                <p>{{$appDownload->short_description}}</p>
                            </div>
                            <ul class="d-flex flex-wrap">
                                @if($appDownload->play_store_link)
                                    <li>
                                        <a href="{{$appDownload->play_store_link}}">
                                            <i class="fab fa-google-play"></i>
                                            <p> <span>download from</span> google play </p>
                                        </a>
                                    </li>
                                @endif
                                    @if($appDownload->apple_store_link)

                                    <li>
                                    <a href="{{$appDownload->apple_store_link}}">
                                        <i class="fab fa-apple"></i>
                                        <p> <span>download from</span> apple store </p>
                                    </a>
                                </li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
