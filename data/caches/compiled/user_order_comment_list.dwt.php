<?php echo $this->fetch('library/user_header.lbi'); ?>
<?php if ($this->_var['show_asynclist']): ?>
<div class="ect-pro-list user-order" style="border-bottom:none;">
    <ul id="J_ItemList">
       <li class="single_item"></li>
       <a href="javascript:;" style="text-align:center" class="get_more"></a>
    </ul>
</div>
<?php else: ?>
	<div class="ect-pro-list user-order" style="border-bottom:none;">
		<ul id="J_ItemList">
		 <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'orders');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['orders']):
        $this->_foreach['goods_list']['iteration']++;
?>
			<li>
			<a href="<?php echo url('user/order_comment_list', array('id'=>$this->_var['orders']['goods_id']));?>">
			<img src="<?php echo $this->_var['orders']['goods_img']; ?>" class="pull-left" />
			<dl>
			   <dd><?php echo $this->_var['orders']['name']; ?></dd></br>			   
			</dl>
			
			<dd>
				 <a  style="" href="<?php echo url('user/order_comment_list',array('id'=>$this->_var['orders']['goods_id']));?>">				
					  <button style="  border: 0px;  position: absolute;  top: 67px;  right: 10px;}">去评价</button>
				 </a> 				
		    </dd>
			</li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>

 <?php echo $this->fetch('library/page.lbi'); ?>
<?php endif; ?>
</div>
<?php echo $this->fetch('library/search.lbi'); ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?>

<script type="text/javascript">
<?php $_from = $this->_var['lang']['merge_order_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
if(<?php echo $this->_var['show_asynclist']; ?>){
get_asynclist('index.php?m=default&c=user&a=async_order_list&pay=<?php echo $this->_var['pay']; ?>' , '__TPL__/images/loader.gif');
}
</script> 
</body></html>