<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-12
 * Time: 下午4:17
 * To change this template use File | Settings | File Templates.
 */
class SignModel extends CFormModel{

    public $username;
    public $name;
    public $sex;
    public $school_id;
    public $grate;
    public $schoolName;

    public function attributeLabels()
    {
        return array(
            'username'=>'用户昵称',
            'name'=>'姓名',
            'sex'=>'性别',
            'schoolName'=>'学校',
            'grate'=>'年级',
        );
    }

}