<?php

namespace common\models;

use common\models\query\CommentQuery;
use common\models\query\PostQuery;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $body
 * @property int|null $post_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 * @property Post $post
 */
class Comment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%comment}}';
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [['title', 'body', 'post_id'], 'required'],
            [['body'], 'string'],
            [['post_id', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['title'], 'string', 'max' => 512],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return array|string[]
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'post_id' => 'Post ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \common\models\query\UserQuery|ActiveQuery
     */
    public function getCreatedBy(): \common\models\query\UserQuery|ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Post]].
     *
     * @return PostQuery|ActiveQuery
     */
    public function getPost(): PostQuery|ActiveQuery
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }

    /**
     * {@inheritdoc}
     * @return CommentQuery the active query used by this AR class.
     */
    public static function find(): CommentQuery
    {
        return new CommentQuery(get_called_class());
    }
}
