<?php
	$pre_position = '../';
	require($pre_position.'core/init.php'); ?>
<?php 
	//Create BlogModel Object
	$blog = new BlogModel;
	//Create User Object
	$user = new User;

	//Get Template and Assign Vars
	$template = new Template($pre_position.'templates/blog_list.php');
	
	// get necessary info for all blogs
	$all_blogs = $blog->getAllBlogs();
	$tags = array();
	for ($i = 0; $i < count($all_blogs);$i++) {
		$tagsStr = $all_blogs[$i]['tag'];
		$tagsArr = preg_split('/,/',$tagsStr);
		$tags[] = array();
		for ($j = 0; $j < count($tagsArr);$j++) {
			$tag_info = $blog->getTagNameById($tagsArr[$j]);
			$tags[$i][$tag_info['tag']] = $tag_info['tag_color'];
		}
	}
	for ($i = 0; $i < count($all_blogs);$i++) {
		$all_blogs[$i]['reply_num'] = $blog->getBlogReplyCount($all_blogs[$i]['id']);
	}
	//@todo: 暂时hardcode，之后$logged_user_id需要从session里取。
	$logged_user_id = 4;
	$isLoggedUserAdmin = $blog->isLoggedUserAdmin($logged_user_id);
	$template->isAdmin = $isLoggedUserAdmin;
	$template->blogs = $all_blogs;
	$template->tags = $tags;
	echo $template;
?>