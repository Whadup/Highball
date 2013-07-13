<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Post: Asaph</title>
	<link rel="stylesheet" type="text/css" href="<?php echo ASAPH_POST_CSS; ?>" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body class="Asaph_Post" onload="document.getElementById('title').focus();">
	<!--<h1>
		Post
		<?php if( !empty($_POST['image']) || !empty($_GET['image']) ) { ?>
			Image:
		<?php } else { ?>
			Site:
		<?php } ?>
	</h1>-->
	
	<?php if( !empty($status) ) { ?>
		<div class="warn">
			<?php if( $status == 'not-logged-in' ) { ?>The name or password was not correct!<?php } ?>
			<?php if( $status == 'download-failed' ) { ?>Couldn't load the image!<?php } ?>
			<?php if( $status == 'duplicate-image' ) { ?>This image was already posted!<?php } ?>
			<?php if( $status == 'thumbnail-failed' ) { ?>Couldn't create a thumbnail of the image!<?php } ?>
		</div>
	<?php } ?>
	<?php if( !empty($_POST['image']) || !empty($_GET['image']) ) { ?>
		<img id="image" src="<?php printReqVar('image'); ?>" style="
    	width: 150px;
    	float: left;
    	margin-right: 10px;
    	margin-left:4px;">
    <?php } else if( !empty($_POST['video']) || !empty($_GET['video']) ) { ?>
		<embed 
			src="<?php printReqVar('video'); ?>" 
			type="<?php printReqVar('type'); ?>" 
			width="150" 
			height="100" 
			style="float:left;margin-right:10px;margin-left;4px;"
		/>
    <?php } ?>

	<form action="post.php" method="post"  style="display: block;float: left;width: 420px;">
		<input type="hidden" name="xhrLocation" value="<?php printReqVar('xhrLocation'); ?>"/>
		<?php if( !empty($loginError) ) { ?><span class="warn">The name or password was not correct!</span><?php } ?>
		<dl>
			
			<?php if( !empty($_POST['image']) || !empty($_GET['image']) ) { ?>
				<dt>Title:</dt>
				<dd><input id="title" type="text" name="title" class="long" value="<?php printReqVar('title'); ?>"/></dd>
				<dt>Description:</dt>
				<dd><textarea id="description" type="text" name="description" class="long"><?php printReqVar('description'); ?></textarea></dd>
				<dt>Image:</dt>
				<dd>
					<input type="text" name="image" id ="imageForm" class="long" value="<?php printReqVar('image'); ?>"/>
				</dd>
				<dt>Source:</dt>
				<dd>
					<input type="text" name="source" class="long" value="<?php printReqVar('source'); ?>"/>
				</dd>
			<?php } elseif( !empty($_POST['video']) || !empty($_GET['video']) ) { ?>
				<dt>Title:</dt>
				<dd><input id="title" type="text" name="title" class="long" value="<?php printReqVar('title'); ?>"/></dd>
				<dt>Description:</dt>
				<dd><textarea id="description" type="text" name="description" class="long"><?php printReqVar('description'); ?></textarea></dd>
				
				<input type="hidden" name="video" class="long" value="<?php printReqVar('video'); ?>"/>
				<input type="hidden" name="thumb" class="long" value="<?php printReqVar('thumb'); ?>"/>
				
				<dt>Source:</dt>
				<dd>
					<input type="text" name="source" class="long" value="<?php printReqVar('source'); ?>"/>
				</dd>
				<input type="hidden" name="height" value="<?php printReqVar('height'); ?>"/>
				<input type="hidden" name="width" value="<?php printReqVar('width'); ?>"/>
				<input type="hidden" name="video_type" value="<?php printReqVar('video_type'); ?>"/>
			<?php } elseif( !empty($_POST['quote']) || !empty($_GET['quote']) ) { ?>
				<dt>Title:</dt>
				<dd><input id="title" type="text" name="title" class="long" value="<?php printReqVar('title'); ?>"/></dd>
				<dt>Description:</dt>
				<dd><textarea id="description" type="text" name="description" class="long"><?php printReqVar('description'); ?></textarea></dd>
				<dt>Quote:</dt>
				<dd>
					<dd><textarea id="quote" type="text" name="quote" class="long"><?php printReqVar('quote'); ?></textarea></dd>
				</dd>
				<dt>Speaker:</dt>
				<dd><input id="speaker" type="text" name="speaker" class="long" value="<?php printReqVar('speaker'); ?>"/></dd>
				<dt>Source:</dt>
				<dd>
					<input type="text" name="source" class="long" value="<?php printReqVar('source'); ?>"/>
				</dd>
				<!-- TODO: Link-->
			<?php } else { ?>
				<dt>Titel:</dt>
				<dd><textarea id="title" name="title"><?php printReqVar('title'); ?></textarea></dd>
				<dt>Description:</dt>
				<dd><textarea id="description" type="text" name="description" class="long"><?php printReqVar('description'); ?></textarea></dd>
				<dt>Site:</dt>
				<dd>
					<input type="text" name="url" class="long" value="<?php printReqVar('url'); ?>"/>
				</dd>
			<?php } ?>
			<dt></dt>
			<dd><input type="submit" name="post" value="Post" class="button"/></dd>
		</dl>
	</form>
	<?php if( !empty($_POST['image']) || !empty($_GET['image']) ) { ?>
	<script>

    		$("#imageForm").change(function(){
    			alert("change");
    			$("#image").attr("src", $("#imageForm").val());
    		});
    	</script>
    <?php } ?>
</body>
</html>