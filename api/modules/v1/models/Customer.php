<?php

namespace api\modules\v1\models;

use Yii;
use \yii\db\ActiveRecord;

class Customer extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_upload_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'mobile_no', 'date_of_birth'], 'required'],
            [['email'],'email'],
            [['address', 'details'], 'string'],
            [['date_of_birth', 'date_uploaded', 'date_created', 'date_modified'], 'safe'],
            [['customer_upload_id', 'created_by', 'modified_by'], 'integer'],
            [['customer_name', 'email'], 'string', 'max' => 75],
            [['nric'], 'string', 'max' => 12],
            [['mobile_no'], 'string', 'max' => 20],
        ];
    }


}
