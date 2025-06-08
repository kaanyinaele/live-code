<footer class="footer-bg">
     <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="foot-info">
            <a href="<?php echo e(route('/')); ?>">
              <img src="<?php echo e(asset('public/image/logo/'.GlobalTitle()->logo)); ?>">
            </a>
            <p><?php echo GlobalTitle()->content; ?></p>
          </div>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-4">
              <h4 class="foot-head">Important links</h4>
              <ul class="foot-link">
                <li><a href="<?php echo e(route('aboutus')); ?>">About us</a></li>
                <li><a href="<?php echo e(route('contactus')); ?>">Contact Us</a></li>
                <li><a href="<?php echo e(route('question-answer')); ?>">FAQ</a></li>
                <li><a href="<?php echo e(route('term-condition')); ?>">Terms & Conditions</a></li>
                <li><a href="<?php echo e(route('privacy-policy')); ?>">Privacy policy</a></li>
                <li><a href="<?php echo e(route('professionals')); ?>">Ogaworkman Professionals</a></li>
                <li><a href="<?php echo e(route('why-choose-ogaworkman')); ?>">Why Choose Ogaworkman</a></li>
                <li><a href="<?php echo e(route('how-does-it-work')); ?>">How does it work</a></li>
                <li><a href="<?php echo e(route('privacy-policy')); ?>">Privacy policy</a></li>
                <li><a href="<?php echo e(route('download-app')); ?>">Download App</a></li>
                <li><a href="<?php echo e(route('blog-list')); ?>">Blog</a></li>
              </ul>
            </div>
            <div class="col-md-4">
             <h4 class="foot-head">Connect With Us</h4>
             <?php  $socialLinks= GlobalTitle(); ?>
             <ul class="foot-link icon-box-in">
                <li><a href="<?php echo e($socialLinks->facebook); ?>" target="_blank"> <span><i class="fab fa-facebook-f"></i></span> Facebook </a></li>
                <li><a href="<?php echo e($socialLinks->twitter); ?>" target="_blank"><span><i class="fab fa-twitter"></i></span> Twitter </a></li>
                <li><a href="<?php echo e($socialLinks->instagram); ?>" target="_blank"><span><i class="fab fa-instagram"></i></span> Instagram </a></li>
                <li><a href="<?php echo e($socialLinks->pinterest); ?>" target="_blank"><span><i class="fab fa-pinterest-p"></i></span> Pinterest</a></li>
              </ul> 
            </div>
            <div class="col-md-4">
              <h4 class="foot-head">Download The App</h4>
              <ul class="foot-link app-the-link">
                <li><a href="javascript:;"><img src="<?php echo e(asset('public/frontend/images/google-playt-logo-png.png')); ?>"></a></li>
                <li><a href="javascript:;"><img src="<?php echo e(asset('public/frontend/images/google-playt-logo-png1.png')); ?>"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
       <div class="copy-foot">
         © Ogaworkman 2019. All Rights Reserved.
      </div>
  </div>
</footer>
<!-- Start of ogaworkman Zendesk Widget script -->
<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=6ff6bf67-6642-4bf2-b793-e54caf311aa9">
 </script>
<!-- End of ogaworkman Zendesk Widget script -->
<?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/footer.blade.php ENDPATH**/ ?>