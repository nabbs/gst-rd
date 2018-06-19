<!-- Main Slider -->

<div class="master-slider" id="masterslider">
  <?php //print_r($sliders);

foreach($sliders as $key=>$val){  ?>
  <div class="ms-slide"><img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/blank.gif" alt="Image description" data-src="/../assets/files/<?php echo $val['pic']; ?>">
    <div class="ms-layer u-ribbon-v1 text-uppercase g-pos-rel g-line-height-1_2 g-font-weight-700 g-font-size-16 g-font-size-18--md g-color-white g-theme-bg-black-v1 g-pa-10 g-mb-10" data-type="text" data-delay="10" data-effect="skewleft(50, 340)" data-ease="easeOutExpo" data-duration="2200">Only From <span class="g-color-primary"><?php echo $val['text_above_title']; ?></span> </div>
    <h3 class="ms-layer text-uppercase g-pos-rel g-line-height-1 g-font-weight-700 g-font-size-35 g-font-secondary g-color-white g-mb-10" data-type="text" data-delay="10" data-effect="skewright(50, 340)" data-ease="easeOutExpo" data-duration="2200"><?php echo $val['title']; ?></h3>
    <div class="ms-layer g-pos-rel g-line-height-1_2 g-max-width-550 ms-hover-active" style="margin: 0px; padding: 0px; font-size: 13.49px; line-height: 15.4171px; display: none;">
      <p class="g-mb-20 g-font-size-18 g-color-white-opacity-0_8"><?php echo $val['content']; ?></p>
      <a class="btn btn-md text-uppercase u-btn-primary g-font-weight-700 g-font-size-12 rounded-0 g-py-10 g-px-25" href="<?php echo $val['button_url']; ?>"><?php echo $val['button_text']; ?></a>
      <?php if(@$val['button_text_two']){ ?>
      <a class="btn btn-md text-uppercase u-btn-primary g-font-weight-700 g-font-size-12 rounded-0 g-py-10 g-px-25" href="<?php echo $val['button_url_two']; ?>"><?php echo $val['button_text_two']; ?></a>
      <?php } ?>
      <?php if(@$val['button_text_three']){ ?>
      <a class="btn btn-md text-uppercase u-btn-primary g-font-weight-700 g-font-size-12 rounded-0 g-py-10 g-px-25" href="<?php echo $val['button_url_three']; ?>"><?php echo $val['button_text_three']; ?></a>
      <?php } ?>
      <?php if(@$val['button_text_four']){ ?>
      <a class="btn btn-md text-uppercase u-btn-primary g-font-weight-700 g-font-size-12 rounded-0 g-py-10 g-px-25" href="<?php echo $val['button_url_four']; ?>"><?php echo $val['button_text_four']; ?></a>
      <?php } ?>
    </div>
    <img class="ms-thumb" src="<?php echo base_url ?>/../assets/files/200X200/<?php echo $val['pic']; ?>"  alt="Image description"> </div>
  <?php } ?>
</div>
<!-- end slider --> 
<!-- search tabs -->
<section class="g-bg2colors-primary-black-v1 wow fadeInUp" id="searchBox">
  <div class="container">
    <div class="row">
      <div class="col-md-3 g-mt-50 g-theme-bg-black-v1">
        <h2 class="text-uppercase g-line-height-1_2 g-font-weight-700 g-font-size-26 g-font-secondary g-color-white mb-0 u-divider-right"> <em class="d-block g-font-style-normal g-font-size-20 g-color-primary g-mb-5">Search for </em><span id="tab-heading">your flights</span></h2>
      </div>
      <div class="col-md-9 g-bg-primary">
        <div class="container">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="nav-item nav-link active" id="nav-flight-tab" data-toggle="tab" href="#nav-flight" role="tab" aria-controls="nav-flight" aria-selected="false" data-tabname="your flights" title="Flights"><img src="application/frontend/layout/advanced/assets/img/flight.png" class="mr-2"><span class="d-none">Flights</span></a> <a class="nav-item nav-link" id="nav-hotel-tab" data-toggle="tab" href="#nav-hotel" role="tab" aria-controls="nav-hotel" aria-selected="false" data-tabname="your hotel" title="Hotels"><img src="application/frontend/layout/advanced/assets/img/hotel.png" class="mr-2"><span class="d-none">Hotels</span></a> <a class="nav-item nav-link" id="nav-car-tab" data-toggle="tab" href="#nav-car" role="tab" aria-controls="nav-car" aria-selected="false" data-tabname="your car hire" title="Car Hire"><img src="application/frontend/layout/advanced/assets/img/car.png" class="mr-2"><span class="d-none">Car Hire</span></a> 
              <!--a class="nav-item nav-link" id="nav-holiday-tab" data-toggle="tab" href="#nav-holiday" role="tab" aria-controls="nav-holiday" aria-selected="false" data-tabname="your holiday" title="Holidays"><img src="/application/frontend/layout/advanced/assets/img/holiday.png" class="mr-2"><span class="d-none">Holidays</span></a--> 
              <a class="nav-item nav-link" id="nav-hajj-tab" data-toggle="tab" href="#nav-hajj" role="tab" aria-controls="nav-hajj" aria-selected="false" data-tabname="hajj" title="Hajj"><img src="application/frontend/layout/advanced/assets/img/hajj.png" class="mr-2"> <span class="d-none">Hajj</span></a> <a class="nav-item nav-link" id="nav-umrah-tab" data-toggle="tab" href="#nav-umrah" role="tab" aria-controls="nav-umrah" aria-selected="false" data-tabname="umrah" title="Umrah"><img src="application/frontend/layout/advanced/assets/img/hand.png" class="mr-2"> <span class="d-none">Umrah</span></a> 
              <!--a class="nav-item nav-link" id="nav-cruises-tab" data-toggle="tab" href="#nav-cruises" role="tab" aria-controls="nav-cruises" aria-selected="false" data-tabname="your cruise" title="Cruises"><img src="/application/frontend/layout/advanced/assets/img/cruises.png" class="mr-2"><span class="d-none">Cruises</span></a--> 
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade active show" id="nav-flight" role="tabpanel" aria-labelledby="nav-flight-tab"> 
              <script charset="utf-8" src="//www.travelpayouts.com/widgets/70d87b6b6129e9ad4befe1f25fe3e949.js?v=1016" async></script> 
            </div>
            <div class="tab-pane fade" id="nav-hotel" role="tabpanel" aria-labelledby="nav-hotel-tab"> 
              <script charset="utf-8" src="//www.travelpayouts.com/widgets/97b317f636806a09a2300defc208e489.js?v=1301" async></script> 
            </div>
            <div class="tab-pane fade" id="nav-car" role="tabpanel" aria-labelledby="nav-holiday-tab"> 
              <script src="//c13.travelpayouts.com/content?promo_id=1592&shmarker=129036&locale=en&template=basic&hide-header=true&box-shadow=true&large_button=true&form-hollow=true&hide[1]=hero&hide[2]=cars&hide[3]=suppliers&hide[4]=manage&hide[5]=why&hide[6]=powered" charset="utf-8" async></script> 
            </div>
            <div class="tab-pane fade" id="nav-holiday" role="tabpanel" aria-labelledby="nav-holiday-tab">
              <div style="position: relative;" class='custom_search'>
                <form accept-charset="utf-8"  method='get' action="<?php echo base_url(); ?>holiday" target="_self">
                  <div class="row">
                    <div class="col-md-12">
                      <label>Search</label>
                      <input type="text" class="form-control" placeholder="Enter search text" aria-describedby="basic-addon21">
                      <a class="sortByPrice" href="#">Sort by Price</a> </div>
                  </div>
                  <div class="row"> 
                    <!--div class="col-md-6">
				
                <div class="form-group">
                  
                  <input type="text" class="form-control umrah_starting_date" name="starting_date" id="" placeholder="From Date">
                </div>
                
                </div>
				<div class="col-md-6">
				<div class="form-group">
				<input type="text" class="form-control umrah_end_date" name="hajj_end_date" placeholder="To Date">
				</div>
				</div-->
                    
                    <div class="col-md-12">
                      <div class="btn-group pull-right">
                        <div class="btn-group">
                          <button type="submit" class="btn btn-primary search_button">Search</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!----start for hajj tab---------->
            <div class="tab-pane fade" id="nav-hajj" role="tabpanel" aria-labelledby="nav-hajj-tab">
              <div style="position: relative;" class='custom_search'>
                <form accept-charset="utf-8"  method='get' action="<?php echo base_url(); ?>hajj" target="_self">
                  <div class="row">
                    <div class="col-md-6">
                      <select class="form-control" name="room_type">
                        <option value="">Room Type</option>
                        <option value="1">Quad (4)</option>
                        <option value="2">Triple (3)</option>
                        <option value="3">Double (2)</option>
                        <option value="4">Quin (5)</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <select class="form-control" name="room_rating">
                        <option value="">Room rating</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Star</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control umrah_starting_date" name="starting_date" id="" placeholder="From Date">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control umrah_end_date" name="hajj_end_date" placeholder="To Date">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="btn-group pull-right">
                        <div class="btn-group">
                          <button type="submit" class="btn btn-primary search_button">Search</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-umrah" role="tabpanel" aria-labelledby="nav-umrah-tab">
              <div style="position: relative;" class='custom_search'>
                <form accept-charset="utf-8"  method='get' action="<?php echo base_url(); ?>umrah" target="_self">
                  <div class="row">
                    <div class="col-md-6">
                      <select class="form-control" name="room_type">
                        <option value="">Room Type</option>
                        <option value="1">Quad (4)</option>
                        <option value="2">Triple (3)</option>
                        <option value="3">Double (2)</option>
                        <option value="4">Quin (5)</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <select class="form-control" name="room_rating">
                        <option value="">Room rating</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Star</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control umrah_starting_date" name="umrah_starting_date" id="" placeholder="From Date">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control umrah_end_date" name="umrah_end_date" placeholder="To Date">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="btn-group pull-right">
                        <div class="btn-group">
                          <button type="submit" class="btn btn-primary search_button">Search</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-cruises" role="tabpanel" aria-labelledby="nav-cruises-tab"> cruise </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- search tabs -->