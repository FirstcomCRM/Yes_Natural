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
          [['address', 'details','address1','address2'], 'string'],
          [['email'],'email'],
          [['date_of_birth', 'card_expiry_date', 'date_created', 'date_modified'], 'safe'],
          [['created_by', 'modified_by','active'], 'integer'],
          [['customer_name', 'email'], 'string', 'max' => 75],
          [['country'],'string','max'=>50],
          [['zipcode'],'string','max'=>25],
          [['sex'],'string','max'=>20],
          [['nric'], 'string', 'max' => 12],
          [['mobile_no'], 'string', 'max' => 20],
      ];
    }


}
