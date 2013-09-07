<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-9-1
 * Time: 上午12:07
 * To change this template use File | Settings | File Templates.
 */
class BaseController extends Controller{

    public function actionUploadPhoto(){
        $file = CUploadedFile::getInstanceByName('Filedata');
        if(is_object($file)){
            if($file->getHasError()){
                echo CJSON::encode(array('code'=>'-1','msg'=>'图片上传出错'));
                return false;
            }else{
                if($file->getSize() > 2000000){
                    echo CJSON::encode(array('code'=>'-1','msg'=>'上传图片大小超过限制'));
                    return false;
                }else{
                    $newImageName=$this->generateNewImageName();
                    $uid=Yii::app()->session['user']['id'];
                    $uploadPath=Yii::app()->request->baseUrl.'./uploads/'.$uid;
                    $extension=$file->getExtensionName();
                    if(!is_dir($uploadPath)){
                        if(!mkdir($uploadPath,0755)){
                            echo CJSON::encode(array('code'=>'-1','msg'=>'文件夹创建失败'));
                            return false;
                        }
                    }
                    if($file->saveAs($uploadPath.'/'.$newImageName.'.'.$extension)){
                        echo CJSON::encode(array('code'=>'0','data'=>$uid.'/'.$newImageName.'.'.$extension));
                    }else{
                        echo CJSON::encode(array('code'=>'-1','msg'=>'图片上传出错'));
                        return false;
                    }
                }
            }
        }else{
            echo CJSON::encode(array('code'=>'-1','msg'=>'图片上传出错'));
            return false;
        }

    }

    public function actiondelUploadImage(){
        $imagename = Yii::app()->request->getParam('imagename','');
        if(!empty($imagename)){
            $fullPath='./uploads/'.$imagename;
            if(file_exists($fullPath)){
                if(unlink($fullPath)){
                    echo CJSON::encode(array('code'=>'0','msg'=>'del ok'));
                }else{
                    echo CJSON::encode(array('code'=>'-1','msg'=>'del fair'));
                    return false;
                }
            }else{
                echo CJSON::encode(array('code'=>'-1','msg'=>'file not exists'));
                return false;
            }
        }else{
            echo CJSON::encode(array('code'=>'-1','msg'=>'del error'));
            return false;
        }
    }

}