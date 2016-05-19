<?php
class PostController extends Controller {

	public function actionIndex() {
		$posts = Post::model()->findAll(array('order'=>'created_at DESC','limit'=>10));
		$posts_data = array();
		foreach($posts as $post) {
			$posts_data[] = array('status'=>'SUCCESS',
				'id'=>$post->id,
				'title'=>$post->title,
				'content'=>$post->content,
				'author'=>$post->author);
		}
		echo CJSON::encode($posts_data);
	}

	public function actionCreate($content,$title,$author) {
		Post::create(array('author'=>$author,'title'=>$title,'content'=>$content));
		$success = array('status'=>'SUCCESS');
		echo CJSON::encode($success);
	} 

	public function actionShow($postid) {
		$post = Post::model()->findByPk($postid);
		$post_data = array('status'=>'SUCCESS',
				'id'=>$post->id,
				'title'=>$post->title,
				'content'=>$post->content,
				'author'=>$post->author);
		echo CJSON::encode($post_data);
	}

}
?>