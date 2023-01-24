<!-- **Searchform** -->
<?php $search_text = empty($_GET['s']) ? esc_html__("Enter Keyword",'owly') : get_search_query(); ?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url('/') );?>">
    <input id="s" name="s" type="text" 
         	value="<?php echo esc_attr( $search_text );?>" class="text_input"
		    onblur="if(this.value==''){this.value='<?php echo esc_attr($search_text);?>';}"
            onfocus="if(this.value =='<?php echo esc_attr($search_text);?>') {this.value=''; }" />
    <a href="javascript:void(0)" class="dt-search-icon"> <span class="fas fa-times"> </span> </a>
	<input name="submit" type="submit"  value="<?php esc_attr_e('Go','owly');?>" />
</form><!-- **Searchform - End** -->