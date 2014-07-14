<!-- Contact Us Modal -->
<div class="modal fade" id="contactMeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><h2>Contact Us!</h2></h4>
      </div>
      <div class="modal-body">
                <form class="form-horizontal" action="<?php echo URL ?>index/sendEmail" method="post" role="form">
                  <div class="form-group">
                    <div class="col-sm-12">
                        <input class="form-control input-lg" type="text" name="name" placeholder="Name and Surname" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                        <input class="form-control input-lg" type="email" name="email" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                        <input class="form-control input-lg" type="number" name="tel_no" placeholder="Telephone or Mobile Number" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="form-control input-lg" name="message" placeholder="Message" cols="40" rows="10" required></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary btn-lg">Send</button>
                    </div>
                  </div>
                </form>
      </div>
    </div>
  </div>
</div>


<div class="row well well-sm box-shadow" <?php if($url==$login_url  || $url==$dashboard_url){?>style="display:none"<?php } ?> <?php echo $display; ?>>
	<div class="col-sm-12 col-sm-offset-0 well-sm">
		
        
        <div class="row">
			<div class="col-sm-4">
            	<address>
                    <h4>Triad Cycles <small>Bike Shop · Repair Service</small></h4>
                    <p><strong>Address:</strong> # 14 Quezon Ave., Brgy Dona Josefa, Quezon City, Metro Manila Philippines 1113</p>
                    <p><strong>Tel #:</strong> 632 749-4701, 632 412-3994</p>
                    <p><strong>Cel #:</strong> +63 917 854 9922</p>
                    <p><strong>Email:</strong> lester.barretto@triad-cycles.com</p>
                    <p> <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Ftriadcycles&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=423779371029193" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe></p>
                </address>
            </div>
            
            <div class="col-sm-4 vertical-border-left">
            	<h4>Site Map</h4>
                    <ul>
                        <li><a class="no-decor-text" href="<?php echo URL; ?>index">Home</a></li>
                        <li><a class="no-decor-text" href="<?php echo URL; ?>about">Triad Cycles</a></li>
                        <li><a class="no-decor-text" href="<?php echo URL; ?>pyga">Pyga Industries</a></li>
                        <li><a class="no-decor-text" href="<?php echo URL; ?>ballistic">Ballistic Bikes</a></li>
                        <li><a class="no-decor-text" href="<?php echo URL; ?>stanton">Stanton Bikes</a></li>
                        <li><a class="no-decor-text" href="<?php echo URL; ?>visit">Visit Us</a></li>
                        <li><a class="no-decor-text" href="<?php echo URL; ?>news">News and Events</a></li>
                    </ul>
            </div>
            <div class="col-sm-4 vertical-border-left">
            	<h4>Find Us</h4>
            	<p>
                	<span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x"></i>
                    </span><a class="no-decor-text" href="#">Twitter</a><br>
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x"></i>
                    </span><a class="no-decor-text" href="https://www.facebook.com/triadcycles" target="new">Facebook</a>
                    <br>
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-square-o fa-stack-2x"></i>
                        <i class="fa fa-instagram fa-stack-1x"></i>
                    </span><a class="no-decor-text" href="#">Instagram</a><br>
                    <button  class="btn btn-success btn-lg" data-toggle="modal" data-target="#contactMeModal">CONTACT US!</button>
               </p>
            </div>
        </div>    
	</div>
</div>

<!-- FOOTER -->
<footer <?php if($url==$login_url || $url==$dashboard_url){?>style="display:none"<?php } ?> <?php echo $display; ?>>
<p class="pull-right"><a class="no-decor-text" href="#top">Back to top</a></p>
<p>&copy; 2014 Triad Cycles. </p>
<br/>
</footer>

</div>
    
</body>
</html>