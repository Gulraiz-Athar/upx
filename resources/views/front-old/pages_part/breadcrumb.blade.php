<section class="theme-breadcrumb pad-50">                
    <div class="theme-container container ">  
        <div class="row">
            <div class="col-sm-8 pull-left">
                <div class="title-wrap">
                    <h2 class="section-title no-margin">@yield('heading')</h2>
                    <p class="fs-16 no-margin">@yield('body')</p>
                </div>
            </div>
            <div class="col-sm-4">                        
                <ol class="breadcrumb-menubar list-inline">
                    <li><a href="{{ route('home') }}" class="gray-clr">Home</a></li>                                   
                    <li class="active">@yield('pageTitle')</li>
                </ol>
            </div>  
        </div>
    </div>
</section>