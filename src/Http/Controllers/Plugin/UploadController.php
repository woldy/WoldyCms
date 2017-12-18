<?php
namespace Woldy\Cms\Http\Controllers\Plugin;
use App\Http\Requests;
use Woldy\Cms\Http\Controllers\Controller;
use Tpl;
use Illuminate\Http\Request;
use Validator;
class UploadController extends Controller
{

    public function __construct() {
      //$this->beforeFilter('csrf', array('off' => 'post|put|delete'));
    }
    //markdown 图片上传
    public function mdpic(Request $request){
      $json = [
          'success' => 0,
          'message' => '',
          'url' => '',
      ];
      if ($request->hasFile('editormd-image-file')) {
          $file = $request->file('editormd-image-file');
          $max = [
              'editormd-image-file' => 'max:10240',
          ];
          $message = [
              'editormd-image-file.max' => '上传图片最大不超过10M',
          ];
          $validator = Validator::make($request->all(), $max, $message);
          if ($validator->passes()) {
              $destpath = "upload/images/markdown/";
              $savepath = $destpath . date('Ymd', time());
              if (!is_dir($savepath)) {
                  mkdir($savepath, 0777, true);
              }
              $ext = $file->getClientOriginalExtension();
              if (in_array($ext, ['png', 'jpg', 'jpeg', 'gif']))  {
                      $realpayh = '/' . $savepath . '/' . uniqid() . '_' . date('s') . '.' . $ext;
                      if ($file->isValid()) {
                          $file->move($savepath, $realpayh);
                          $json = array_replace($json, ['success' => 1, 'url' => $realpayh]);
                      } else {
                          $json = array_replace($json, ['success' => 0, 'meassge' => '文件校验失败']);
                      }

              } else {
                  $json = array_replace($json, ['success' => 0, 'meassge' => '文件类型不符合要求']);
              }
          } else {
              $json = array_replace($json, ['success' => 0, 'meassge' => $validator->messages()]);
          }
          return response()->json($json);
      }
    }


}
