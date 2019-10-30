<?php

namespace app\common\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $title Название задания
 * @property string $description Краткое описание задания
 * @property string $type Тип задания
 * @property string $begin_at
 * @property string $end_at
 * @property string $deadline_at
 * @property int $count_attempt Количество попвток на выполнение 
 * @property int $is_exam Аттестующий тест
 * @property int $is_draft Черновик
 * @property int $time_limit
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property LectureHasTest[] $lectureHasTests
 * @property TestHasAnswerFileUpload[] $testHasAnswerFileUploads
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'type'], 'required'],
            [['description'], 'string'],
            [['begin_at', 'end_at', 'deadline_at', 'created_at', 'updated_at'], 'safe'],
            [['count_attempt', 'is_exam', 'is_draft', 'time_limit', 'created_by', 'updated_by'], 'integer'],
            [['title', 'type'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'begin_at' => 'Begin At',
            'end_at' => 'End At',
            'deadline_at' => 'Deadline At',
            'count_attempt' => 'Count Attempt',
            'is_exam' => 'Is Exam',
            'is_draft' => 'Is Draft',
            'time_limit' => 'Time Limit',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectureHasTests()
    {
        return $this->hasMany(LectureHasTest::className(), ['test_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestHasAnswerFileUploads()
    {
        return $this->hasMany(TestHasAnswerFileUpload::className(), ['test_id' => 'id']);
    }
}
