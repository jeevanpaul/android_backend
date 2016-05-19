<?php
class CommentController extends Controller {

	public function actionIndex($id) {
		$comments = Comment::model()->findAll(array('condition'=>'action_item_id = :post_id','params'=>array('post_id'=>$id)));
		$comments_data = array();
		foreach($comments as $comment) {
			$comments_data[] = array('status'=>'SUCCESS',
				'id'=>$comment->id,
				'author'=>$comment->author,
				'content'=>$comment->content);
		}
		echo CJSON::encode($comments_data);
	}

	public function actionCreate($content,$author,$post_id) {
		Comment::create(array('author'=>$author,'content'=>$content,'action_item_type'=>'Post','action_item_id'=>$post_id));
		$success = array('status'=>'SUCCESS');
		echo CJSON::encode($success);
	} 

	public function actionShow($commentid) {
		$comment = Comment::model()->findByPk($commentid);
		$comment_data = array('status'=>'SUCCESS',
				'id'=>$comment->id,
				'content'=>$comment->content,
				'author'=>$comment->author);
		echo CJSON::encode($comment_data);
	}
}
?>