<!-- Calculate Your Cost -->
   <section class="calculate pt-100">
      <div class="theme-container container">
         <span class="bg-text right wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> calculate </span>
         <div class="row">
            <div class="col-md-6 text-center">
               <img src="{{ URL::asset('assets/img/block/Courier-Man.png') }}"  alt="" class="wow slideInLeft couriermanimage" data-wow-offset="50" data-wow-delay=".20s" />
            </div>
            <div class="col-md-6">
               <div class="pad-10"></div>
               <h2 class="section-title pb-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" > calculate your cost </h2>
               <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit nonummy nibh 
                  euismod tincidunt ut laoreet.
               </p>
               <div class="calculate-form">
                  <form class="row">
                     <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                        <div class="col-sm-3"> <label class="title-2"> Length (cm): </label></div>
                        <div class="col-sm-9"> <input  type="text" placeholder="Length" class="form-control lengthvalue masknumber"> </div>
                     </div>
                     <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                        <div class="col-sm-3"> <label class="title-2"> width (cm): </label></div>
                        <div class="col-sm-9"> <input  type="text" placeholder="width" class="form-control widthvalue masknumber"> </div>
                     </div>
                     <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                        <div class="col-sm-3"> <label class="title-2"> height (cm): </label></div>
                        <div class="col-sm-9"> <input  type="text" placeholder="height" class="form-control heightvalue masknumber"> </div>
                     </div>
                     
                     
                     <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                        <div class="col-sm-3"> <label class="title-2"> weight (kg): </label></div>
                        <div class="col-sm-9"> <input type="text" placeholder="weight" class="form-control weightvalue masknumber"> </div>
                     </div>
                     
                     
                     <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                        <div class="col-sm-3"> <label class="title-2"> country: </label></div>
                        <div class="col-sm-9">
                           <div class="form-group">
                              <select class="form-control countryvalue"  title="select your Country">
                                 @php $countries = GetCountries(); @endphp
                                 @if(!empty($countries))
                                 @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                 @endforeach
                                 @endif
                                 
                              </select>
                           </div>
                        </div>
                     </div>
                    
                     <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                        <div class="col-sm-9 col-xs-12 pull-right">
                           <div class="btn-1">  Weight : <span class="totalweight"> 0 </span> Kg
                              <span  class="btn-1 dark totalpricequote"  data-name="cost" >
                              <span  class="pr-sign">Total : </span> &#163; <span class="pricecalculation">0.00</span>
                              </span>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="pt-80 hidden-lg"></div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.Calculate Your Cost -->