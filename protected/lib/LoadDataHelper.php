<?php
class LoadDataHelper {
	public static function lib() {
		return new LoadDataHelper;
	}
	public function getPostData($post) {
		return array(
			'id'=>$post->id,
			'title'=>$post->title,
			'content'=>$post->content,
			'author'=>$post->author)
	}
}
?>