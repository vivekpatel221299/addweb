<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $Admin_ID
 * @property integer $Admin_Parent_ID
 * @property string $Admin_Name
 * @property string $Admin_Email
 * @property string $Admin_Mobile
 * @property string $Admin_Password
 * @property string $Admin_Type
 * @property string $Admin_Address
 * @property string $Admin_Status
 * @property string $Admin_Last_Login
 * @property string $Created_Date
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
	public $old_password;
	public $new_password;
	public $repeat_password; 
    public function rules()
    {
        return [
            [['Admin_Name', 'Admin_Email', 'Admin_Password','Admin_Type','Admin_Mobile'], 'required'],
			[['old_password', 'new_password', 'repeat_password'], 'required', 'on' => 'changePwd'],
			[['Admin_Email'], 'email'],
            [['Admin_Type', 'Admin_Status'], 'string'],
            [['Admin_Last_Login', 'Created_Date'], 'safe'],
            [['Admin_Name', 'Admin_Password'], 'string', 'max' => 100],
            [['Admin_Email'], 'string', 'max' => 75],
            [['Admin_Mobile'], 'string', 'max' => 25],
            [['Admin_Address'], 'string', 'max' => 200],
            [['old_password','new_password'], 'string', 'max' => 30,'min' => 6],
			[['repeat_password'], 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'],			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Admin_ID' => 'ID',
            'Admin_Parent_ID' => 'Parent  ID',
            'Admin_Name' => 'Name',
            'Admin_Email' => 'Email',
            'Admin_Mobile' => 'Mobile',
            'Admin_Password' => 'Password',
            'Admin_Type' => 'Type',
            'Admin_Address' => 'Address',
            'Admin_Status' => 'Status',
            'Admin_Last_Login' => 'Last  Login',
            'Created_Date' => 'Created  Date',
        ];
    }
}
