<?php if(has_action('alm_paging_installed')){ ?>
<div class="row input paging add-on" id="alm-paging">
   <h3 class="heading" tabindex="0"><?php _e('Paging', 'ajax-load-more'); ?></h3>
   <div class="expand-wrap">
      <div class="section-title">
         <p><?php _e('Replace infinite scrolling with a paged ajax navigation system.', 'ajax-load-more'); ?></p>
      </div>
      <div class="wrap">
         <div class="inner">
            <ul>
                <li>
                 <input class="alm_element" type="radio" name="paging" value="true" id="paging-true" >
                 <label for="paging-true"><?php _e('True', 'ajax-load-more'); ?></label>
                </li>
                <li>
                 <input class="alm_element" type="radio" name="paging" value="false" id="paging-false" checked="checked">
                 <label for="paging-false"><?php _e('False', 'ajax-load-more'); ?></label>
                </li>
            </ul>
         </div>
      </div>

      <div class="clear"></div>
      
      <div id="nav-controls">        

         <hr/>
         <div class="section-title">
            <h4><?php _e('Navigation Classes', 'ajax-load-more'); ?></h4>
   		 	<p><?php _e('Add custom CSS classes to the paging navigation menu.', 'ajax-load-more'); ?></p>
   		 </div>
   		 <div class="wrap">
            <div class="inner">
               <input type="text" class="alm_element" name="paging-classes" id="paging-classes" placeholder="portfolio-paging-menu">
            </div>
         </div>

         <div class="clear"></div>
         <hr/>
         <div class="section-title">
            <h4><?php _e('Show at Most', 'ajax-load-more'); ?></h4>
   		 	<p><?php _e('The maximum amount of page menu items to show at a time. <br/.>0 = no maximum', 'ajax-load-more'); ?></p>
   		 </div>
   		 <div class="wrap">
            <div class="inner">
               <input type="number" class="alm_element numbers-only" name="show-at-most" id="show-at-most" step="2" min="0" value="7">
            </div>
         </div>
         
         <div class="clear"></div>
         <hr/>
         <div class="section-title">
            <h4><?php _e('Controls', 'ajax-load-more'); ?></h4>
   		 	<p><?php _e('Show first/last and next/previous buttons in the paging navigation.', 'ajax-load-more'); ?></p>
         </div>
         <div class="wrap">
            <div class="inner">
               <ul>
                   <li>
                    <input class="alm_element" type="radio" name="paging-controls" value="true" id="paging-controls-true" >
                    <label for="paging-controls-true"><?php _e('True', 'ajax-load-more'); ?></label>
                   </li>
                   <li>
                    <input class="alm_element" type="radio" name="paging-controls" value="false" id="paging-controls-false" checked="checked">
                    <label for="paging-controls-false"><?php _e('False', 'ajax-load-more'); ?></label>
                   </li>
               </ul>
            </div>
         </div>
         <div class="clear"></div>
         <div id="paging-controls-nav">
            
            <div class="clear"></div>
            <hr/>
            <div class="section-title">
               <h4><?php _e('First Page', 'ajax-load-more'); ?> <a href="javascript:void(0)" class="fa fa-question-circle tooltip" title="<?php _e('Leave empty to not render button.', 'ajax-load-more'); ?>"></a></h4>
      		 	<p>
         		 	<?php _e('Label for the <span>First Page</span> button.', 'ajax-load-more'); ?>
      		 	</p>
      		 </div>
      		 <div class="wrap">
               <div class="inner">
                  <input type="text" class="alm_element" name="paging-first-label" id="paging-first-label" placeholder="First">
               </div>
            </div>
            
            <div class="clear"></div>
            <hr/>
            <div class="section-title">
               <h4><?php _e('Last Page', 'ajax-load-more'); ?> <a href="javascript:void(0)" class="fa fa-question-circle tooltip" title="<?php _e('Leave empty to not render button.', 'ajax-load-more'); ?>"></a></h4>
      		 	<p>
         		 	<?php _e('Label for the <span>Last Page</span> button.', 'ajax-load-more'); ?>
      		 	</p>
      		 </div>
      		 <div class="wrap">
               <div class="inner">
                  <input type="text" class="alm_element" name="paging-last-label" id="paging-last-label" placeholder="Last">
               </div>
            </div>
            
            <div class="clear"></div>
            <hr/>
            <div class="section-title">
               <h4><?php _e('Previous Page', 'ajax-load-more'); ?></h4>
      		 	<p>
         		 	<?php _e('Label for the <span>Previous Page</span> button.', 'ajax-load-more'); ?>
      		 	</p>
      		 </div>
      		 <div class="wrap">
               <div class="inner">
                  <input type="text" class="alm_element" name="paging-previous-label" id="paging-previous-label" value="Prev" placeholder="Prev">
               </div>
            </div> 
            
            <div class="clear"></div>
            <hr/>
            <div class="section-title">
               <h4><?php _e('Next Page', 'ajax-load-more'); ?></h4>
      		 	<p>
         		 	<?php _e('Label for the <span>Next Page</span> button.', 'ajax-load-more'); ?>
      		 	</p>
      		 </div>
      		 <div class="wrap">
               <div class="inner">
                  <input type="text" class="alm_element" name="paging-next-label" id="paging-next-label" value="Next" placeholder="Next">
               </div>
            </div> 
                       
         </div>

      </div>

   </div>
</div>
<?php } ?>