<!DOCTYPE html>
<html>
   @include('front.includes.head')
   <body id="home">
      <div id="preloader">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <!-- Main Wrapper -->        
      <main class="wrapper">
         @include('front.includes.header')
         <article>
         @yield('content')
         </article>
         @include('front.includes.footer')
      </main>
      <!-- / Main Wrapper -->
      <!-- Top -->
      <div class="to-top theme-clr-bg transition"> <i class="fa fa-angle-up"></i> </div>
      @include('front.includes.scripts')
   </body>
</html>