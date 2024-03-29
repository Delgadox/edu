<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $title Наимнование курса
 * @property string $desc Описание курса
 * @property string $image_text Текст на картинке
 * @property string $image_file Картинка курса
 * @property double $rating Рейтинг
 * @property string $meta_keword Мета keyword
 * @property string $meta_description Meta desc
 * @property string $created_at
 * @property string $update_at
 * @property int $created_by
 * @property string $begin_at
 * @property string $end_at
 *
 * @property Profile $createdBy
 * @property GroupHasCourse[] $groupHasCourses
 */
class Course extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'course';
	}

	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			[
				'class'              => BlameableBehavior::className(),
				'createdByAttribute' => 'created_by',
				'updatedByAttribute' => false,
			],
			[
				'class'              => TimestampBehavior::className(),
				'createdAtAttribute' => 'created_at',
				'updatedAtAttribute' => 'update_at',
				'value'              => new Expression( 'NOW()' ),
			]
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[ [ 'title', 'desc' ], 'required' ],
			[ [ 'title', 'desc' ], 'string' ],
			[ [ 'rating' ], 'number' ],
			[ [ 'created_at', 'update_at', 'begin_at', 'end_at' ], 'safe' ],
			[ [ 'created_by' ], 'integer' ],
			[ [ 'image_text', 'image_file', 'meta_keword', 'meta_description' ], 'string', 'max' => 255 ],
			[ [ 'begin_at' ], 'default', 'value' => new Expression( 'NOW()' ) ],
			[ [ 'end_at' ], 'default', 'value' => new Expression( 'NOW() + INTERVAL 1 YEAR' ) ],
			[
				[ 'created_by' ],
				'exist',
				'skipOnError'     => true,
				'targetClass'     => Profile::className(),
				'targetAttribute' => [ 'created_by' => 'user_id' ]
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'               => Yii::t( 'app', 'ID' ),
			'title'            => Yii::t( 'app', 'Title' ),
			'desc'             => Yii::t( 'app', 'Desc' ),
			'image_text'       => Yii::t( 'app', 'Image Text' ),
			'image_file'       => Yii::t( 'app', 'Image File' ),
			'rating'           => Yii::t( 'app', 'Rating' ),
			'meta_keword'      => Yii::t( 'app', 'Meta Keword' ),
			'meta_description' => Yii::t( 'app', 'Meta Description' ),
			'created_at'       => Yii::t( 'app', 'Created At' ),
			'update_at'        => Yii::t( 'app', 'Update At' ),
			'created_by'       => Yii::t( 'app', 'Created By' ),
			'begin_at'         => Yii::t( 'app', 'Begin At' ),
			'end_at'           => Yii::t( 'app', 'End At' ),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCreatedBy() {
		return $this->hasOne( Profile::className(), [ 'user_id' => 'created_by' ] );
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getGroupHasCourses() {
		return $this->hasMany( GroupHasCourse::className(), [ 'course_id' => 'id' ] );
	}

	public function getCourses() {
		return $this->hasMany( Course::className(), [ 'id' => 'course_id' ] )
		            ->via( 'groupHasCourses' );
	}

	/**
	 * @return array|\yii\db\ActiveRecord[]
	 */
	public static function coursesList() {
		return self::find()->select( [ 'id', 'title' ] )->asArray()->all();
	}
}
