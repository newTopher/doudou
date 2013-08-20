<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-12
 * Time: 下午4:17
 * To change this template use File | Settings | File Templates.
 */
class SignModel extends CFormModel{

    public $id;
    public $username;
    public $name;
    public $sex;
    public $school_id;
    public $grate;
    public $schoolName;
    public $head_img;
    public $tags;

//    public function rules(){
//        return array(
//            array('name,sex,school_id,grate','required','不能为空'),
//        );
//    }

    public function attributeLabels(){
        return array(
            'username'=>'用户昵称',
            'name'=>'姓名',
            'sex'=>'性别',
            'schoolName'=>'学校',
            'grate'=>'年级',
        );
    }

    public function compeletUser(){
        $userModel=UserModel::model()->findByPk($this->id);
        $userModel->name=$this->name;
        $userModel->sex=$this->sex;
        $userModel->school_id=$this->school_id;
        $userModel->grate=$this->grate;
        if($userModel->save()){
            return true;
        }else{
            Yii::log($userModel->errors,CLogger::LEVEL_ERROR);
            return false;
        }
    }

    public function compeletUserHeadImage(){
        $userModel=UserModel::model()->findByPk($this->id);
        $userModel->head_img=$this->head_img;
        $userModel->tags=$this->tags;
        if($userModel->save()){
            return true;
        }else{
            Yii::log($userModel->errors,CLogger::LEVEL_ERROR);
            return false;
        }
    }

}