<!-- About Section -->
<section class="hidden-xs">
 <div class="ws-parallax-header parallax-window">
    <div class="ws-overlay-hard">            
        <div class="ws-parallax-caption">                
            <div class="ws-parallax-holder" >
                <div class="col-sm-6 col-sm-offset-3">
                    <h3 style="color: #fff">{{ config('app.name') }}</h3>         
                    <div class="ws-separator" style="background-color: #fff"></div>
                    @if (Request::is('contacts'))
                        <p>Rua Vasco da Gama, 27 A<br>
                        3830-225 Ílhavo. Portugal<br><br>
                        <abbr title="Phone">T</abbr> +351 234 429 195 / <abbr title="Email">E</abbr> geral@nunosacramento.com.pt<br>
                        GPS 40º 36´ 10,36´´N 8º 39´ 57,73´´W</p>
                    @else
                        <p>In the hope of providing the best service, together with the publics, critics, curators, commissioners and collectors, we intend within the professionalism that characterizes us that our path. With the necessary determination and the risk inherent in this activity, we will continue to launch our motto: "Buying art is both a pleasure and an investment for the future".</p>
                    @endif
                    <div class="btn ws-small-btn-white" style="margin-top: 30px; margin-bottom: 70px;""><a href="mailto:geral@nunosacramento.com.pt">CONTACT US</a></div>
                </div>
            </div>
        </div>    
    </div> 
</div>
</section>
<!-- End About Section --> 