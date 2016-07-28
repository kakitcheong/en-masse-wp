<section class="video-bar">
	<div class="section-title pull--left"><?php the_field("section_title", $acfw); ?></div> <!-- /.section-title -->
	<div class="video-bar__ext-link"><a href="http://www.youtube.com" target="_blank">See All Videos &#10095;</a></div>
	<div class="clearfix"></div>
	<div class="row">
		<?php if(have_rows("video_bar", $acfw)): ?>
	        <?php while(have_rows("video_bar", $acfw)): the_row(); 
	            $video_thumbnail = get_sub_field("video_thumbnail", $acfw);
	            $video_link = get_sub_field("video_link", $acfw);
	        ?>
	        <a href="<?php echo $video_link; ?>" target="_blank">
			<div class="video-bar__thumbnail">
				<div>
					<img src="<?php echo $video_thumbnail['url']; ?>" alt="<?php echo $video_thumbnail['alt'] ?>">
				</div>
			</div> <!-- /.video-bar__thumbnail -->
		</a>
	    <?php 
	    	endwhile;
			endif;
	    ?>
    </div> <!-- /.row -->
</section> <!-- /.video-bar -->