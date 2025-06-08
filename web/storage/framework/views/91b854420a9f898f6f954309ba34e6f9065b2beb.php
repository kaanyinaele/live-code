<?php $__env->startSection('content'); ?>
<section class="sec-padding blog-lists-sec">
      <div class="container">
       <div class="row">
       	<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
          <article>
          <figure>
          	 <a href="<?php echo e(route('blog-detail',base64_encode($data->id))); ?>">
          	   <img src="<?php echo e(asset('public/image/blog_image/'.$data->image)); ?>">
          	</a>
          </figure>
          <figcaption>
            <span><?php echo e($data->created_at->format('F dS Y')); ?></span>
            <h4><?php echo e($data->title); ?></h4>
           <p><?php echo e(substr(strip_tags($data->description),0,50)); ?> </p>
          </figcaption>
          </article>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/cms/blog_list.blade.php ENDPATH**/ ?>