<?if ( ! defined( 'ABSPATH' ) ) exit;?>
<div id="content-zone">
	<div  class="content">
		<div class="loader"><div></div></div>
		<div class="list" data-cat="<? echo stripslashes($this->catId);?>">
			<div class="back">
				&lt; <?_e('Categories' , 'ts-tree-plugin');?>
			</div>

			<h3>
				<? if( $this->catIsTrash() ){?>
					<?_e('Trash' , 'ts-tree-plugin');?>
				<?}elseif( $this->catName ){?>
					<? echo stripslashes($this->catName);?>
					<span id="add-post" class="dashicons dashicons-plus" title="<?_e('Add an article' , 'ts-tree-plugin');?>"></span>
				<?}?>


				
			</h3>

			<?if( !$this->catIsTrash() ){?>
			<div class="selector-container" >
				<div id="selector_draft" class="selector selected draft" title="<?_e('Show draft articles' , 'ts-tree-plugin');?>" ></div>
				<div id="selector_pending" class="selector selected pending" title="<?_e('Show pending articles' , 'ts-tree-plugin');?>" ></div>
				<div id="selector_future" class="selector selected future" title="<?_e('Show future articles' , 'ts-tree-plugin');?>" ></div>
				<div id="selector_private" class="selector selected private" title="<?_e('Show private articles' , 'ts-tree-plugin');?>" ></div>
				<div id="selector_publish" class="selector selected publish" title="<?_e('Show published articles' , 'ts-tree-plugin');?>" ></div>
			</div>
			<?}?>

		<? if( count($this->elements)> 0){?>
			<ul class="posts">
			<?foreach( $this->elements as $post ){ ?>
				<li id="post_<?echo $post->ID;?>" class="post <?echo $post->post_status;?> " >
					<?echo $post->post_title;?>
					<div class="action">
						<?if( $this->catIsTrash() ){?>
							
							<span class="draft-post dashicons dashicons-yes" title="<?_e('Restore' , 'ts-tree-plugin');?>"></span>
							<span class="delete-post-permanently dashicons dashicons-no" title="<?_e('Delete' , 'ts-tree-plugin');?>"></span>
						<?}else{?>
							<?if( $post->post_status=="draft" ){?><span class="publish-post dashicons dashicons-yes" title="<?_e('Publish' , 'ts-tree-plugin');?>"></span><?}?>
							<?if( $post->post_status=="publish" ){?><span class="draft-post dashicons dashicons-edit" title="<?_e('Unpublish' , 'ts-tree-plugin');?>"></span><?}?>
							<span class="delete-post dashicons dashicons-trash" title="<?_e('Restore' , 'ts-tree-plugin');?>"></span>
							<span class="delete-post-from-cat dashicons dashicons-external" title="<?_e('Delete' , 'ts-tree-plugin');?>"></span>
						<?}?>
					</div>
				</li>
			<?}?>
			</ul>
		<?	}else{ ?>
			<p><?_e('There is no article in this category' , 'ts-tree-plugin');?></p>
		<? } ?>
		</div>
	</div>
</div>

