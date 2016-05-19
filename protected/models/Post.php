<?php

 /* @property string $id
 /* @property string $title
 /* @property string $author
 /* @property string $content
 /* @property integer $created_at
 /* @property integer $updated_at
 */
class Post extends CActiveRecord
 {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'post_table';
	}

	public function rules() {
		return array(
							array('created_at, updated_at', 'numerical', 'integerOnly'=>true),
							array('title, author', 'length', 'max'=>255),
							array('content', 'safe'),
					);
	}

	public function relations() {
		return array(
			'comment' => array(self::HAS_MANY, 'Comment', 'action_item_id'),
		);
	}

	public function beforeSave() {
		if($this->isNewRecord) { 
			$this->created_at = time();
		}
		$this->updated_at = time();
		return parent::beforeSave();
	}

	public function updateColumns($column_value_array) {
		$column_value_array['updated_at'] = time();
		foreach($column_value_array as $column_name => $column_value)
			$this->$column_name = $column_value;
		$this->update(array_keys($column_value_array));
	}

	public static function create($attributes) {
		$model = new Post;
		$model->attributes = $attributes;
		$model->save();
		return $model;
	}


}