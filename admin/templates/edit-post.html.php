<?php include(ASAPH_PATH.'admin/templates/head.html.php'); ?>

<h2>Edit Post: <?php echo sprintf("%06d", $post['id']); ?></h2>
<form action="<?php echo Asaph_Config::$absolutePath; ?>admin/" method="post">
	<input type="hidden" name="id" value="<?php echo $post['id']; ?>"/>
	<dl>
		<dt>Type:</dt>

		<dd><strong>
			<?php 
				if(!empty($post['image'])) echo 'Image';
				else if(!empty($post['video'])) echo 'Video';
				else if(!empty($post['quote'])) echo 'Quote';
				else echo 'Text/Link';
			?>
		</strong></dd>
		
		<dt>Created:</dt>
		<dd>
			<input type="text" name="created" id="inputCreated" value="<?php echo date( 'Y-m-d H:i', $post['created']);?>"/>
			<script type="text/javascript" src="<?php echo Asaph_Config::$absolutePath; ?>admin/templates/calendar.js"></script>
			<script type="text/javascript">
				created = new Calendar( 'inputCreated' );
			</script>
		</dd>
			
		<?php if( !empty($post['image']) ) { ?>
			<dt>Image:</dt>
			<dd><a href="<?php echo $post['image']['image']; ?>"><img src="<?php echo $post['image']['thumb']; ?>" alt=""/></a></dd>
			<dt>Title:</dt>
			<dd><input id="title" type="text" name="title" class="long" value="<?php echo $post['title']; ?>"/></dd>
			<dt>Description:</dt>
			<dd><textarea id="description" type="text" name="description" class="long"><?php $post['description']; ?></textarea></dd>
			<dt>Site:</dt>
			<dd>
				<input type="text" name="source" class="long" value="<?php echo $post['source']; ?>"/>
			</dd>
		<?php } else if( !empty($post['video']) ) { ?>
			<dt>Video:</dt>
			<dd>
				<embed 
					src="<?php echo $post['video']['src'];?>" 
					type="<?php echo $post['video']['type'];?>" 
					width="256" 
					height="192" 
				/>
			</dd>
			<dt>Title:</dt>
			<dd><input id="title" type="text" name="title" class="long" value="<?php echo $post['title']; ?>"/></dd>
			<dt>Description:</dt>
			<dd><textarea id="description" type="text" name="description" class="long"><?php echo $post['description']; ?></textarea></dd>
			<dt>Site:</dt>
			<dd>
				<input type="text" name="source" class="long" value="<?php echo $post['source']; ?>"/>
			</dd>
		<?php } else if( !empty($post['quote']) ) { ?>
			<dt>Quote:</dt>
			<dd><textarea id="quote" type="text" name="quote" class="long"><?php echo $post['quote']['quote']; ?></textarea></dd>
			<dt>Speaker:</dt>
			<dd><input id="speaker" type="text" name="speaker" class="long" value="<?php echo $post['quote']['speaker']; ?>"/></dd>
			<dd><input id="quoteId" type="hidden" name="quoteId" class="long" value="<?php echo $post['quote']['id']; ?>"/></dd>
			
			<dt>Title:</dt>
			<dd><input id="title" type="text" name="title" class="long" value="<?php echo $post['title']; ?>"/></dd>
			<dt>Description:</dt>
			<dd><textarea id="description" type="text" name="description" class="long"><?php echo $post['description']; ?></textarea></dd>
			<dt>Site:</dt>
			<dd>
				<input type="text" name="source" class="long" value="<?php echo $post['source']; ?>"/>
			</dd>
		<?php } else { ?>
			<dt>Title:</dt>
			<dd><input id="title" type="text" name="title" class="long" value="<?php echo $post['title']; ?>"/></dd>
			<dt>Description:</dt>
			<dd><textarea id="description" type="text" name="description" class="long"><?php echo $post['description'];?></textarea></dd>
			<dt>Site:</dt>
			<dd>
				<input type="text" name="source" class="long" value="<?php echo $post['source']; ?>"/>
			</dd>
		<?php } ?>
		<dt></dt>
		<dd>
			<input type="submit" name="updatePost" value="Save" class="button"/>
			<input type="submit" name="deletePost" value="Delete" class="button" onclick="return confirm('Really delete this Post?');"/>
		</dd>
	</dl>
</form>

<?php include(ASAPH_PATH.'admin/templates/foot.html.php'); ?>