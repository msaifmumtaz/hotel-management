<?php
// +------------------------------------------------------------------------+|
// | @author: Muhammad Saif                                                  |
// | @author_email: m.saifmumtaz@gmail.com                                   |
// | Created Date: Tuesday 30 March 2021                                     |
// +------------------------------------------------------------------------+|
// | HMS - Hotel Management System                                           |
// | Copyright (c) 2021 saifcodes All rights reserved.                       |
// +------------------------------------------------------------------------+|
namespace HMS\Classes;

class FileManager{
    /**
     *  Image Upload 
     *  @param file $image Image to Upload
     *  @param string $image_name Image Name to save
     *  @param 
     */

     public function image_upload($image,$image_name,$path){
        if (isset($image) && $image['error'] === UPLOAD_ERR_OK) {
          // get details of the uploaded file
          $fileTmpPath = $image['tmp_name'];
          $fileName = $image['name'];
          $fileSize = $image['size'];
          $fileType = $image['type'];
          $fileNameCmps = explode(".", $fileName);
          $fileExtension = strtolower(end($fileNameCmps));
       
          // sanitize file-name
          $newFileName = md5($image_name) . '.' . $fileExtension;
       
          // check if file has one of the following extensions
          $allowedfileExtensions = array('jpg', 'jpeg', 'png');
       
          if (in_array($fileExtension, $allowedfileExtensions))
          {
            // directory in which the uploaded file will be moved
            $uploadFileDir = dirname(__FILE__,3).'/uploads/'.$path.'/';
            $dest_path = $uploadFileDir . $newFileName;
       
            if(move_uploaded_file($fileTmpPath, $dest_path)) 
            {
              $message =array("message"=>'File is successfully uploaded.',"path"=>$dest_path,"status"=>200);
            }
            else
            {
              $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
          }
          else
          {
            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
          }
        } else {
            $message = 'There is some error in the file upload. Please check the following error.<br>';
            $message .= 'Error:' . $image['error'];
        }
        return $message;
     }
     /**
      * Delete Images 
      * @param string $image_name Image Name with Extension
      * @param string $path Image Path
      */
     public function delete_image($image_name,$path){
        $image = dirname(__FILE__,3).'/uploads/'.$path.'/'.$image_name;
         if(unlink($image)){
             return true;
         }else{
             return false;
         }
     }
}