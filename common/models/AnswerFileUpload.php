<?php

namespace app\common\models;

use Yii;

/**
 * This is the model class for table "answer_file_upload".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $file_id
 * @property string $created_at
 * @property int $attempt
 * @property string $file_link
 * @property string $file_type
 * @property int $time_left
 * @property int $created_by
 *
 * @property TestHasAnswerFileUpload[] $testHasAnswerFileUploads
 */
class AnswerFileUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer_file_upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['file_id', 'file_link'], 'required'],
            [['file_id', 'attempt', 'time_left', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['title', 'file_link', 'file_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'file_id' => 'File ID',
            'created_at' => 'Created At',
            'attempt' => 'Attempt',
            'file_link' => 'File Link',
            'file_type' => 'File Type',
            'time_left' => 'Time Left',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestHasFile()
    {
        return $this->hasMany(TestHasAnswerFileUpload::className(), ['answer_file_upload_id' => 'id']);
    }
}
