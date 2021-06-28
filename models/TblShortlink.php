<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_shortlink".
 *
 * @property integer $id
 * @property string $oringnal_link
 * @property string $code
 * @property string $insertdate
 */
class TblShortlink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_shortlink';
    }
	
	public $short_link;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['oringnal_link', 'code'], 'required'],
            [['oringnal_link'], 'string'],
            [['insertdate','short_link'], 'safe'],
            [['code'], 'string', 'max' => 8],
            [['code'], 'unique'],
            [['oringnal_link'], 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'oringnal_link' => 'Oringnal Link',
            'code' => 'Code',
            'insertdate' => 'Insertdate',
        ];
    }
}
