        <div id="sidebar"  class="fourcol woocommerce">
            
            <div class="widgetable">
    
            	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar") ) : ?>
            	<?php endif; ?>
            
            </div>
            
            <div class="widgetable widgetable_sticky woocommerce">
    
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar (Sticky)") ) : ?>
                <?php endif; ?>
            
            </div>
               
        </div><!-- #sidebar -->