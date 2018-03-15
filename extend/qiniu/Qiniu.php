<?php
namespace qiniu;
// 外观
class Qiniu
{
    private $bucket;
    private $prefix;

    public function __construct($prefix='', $bucket='myspace')
    {
        require_once(dirname(__FILE__).'/autoload.php');
        $this->prefix = $prefix;
        $this->bucket = $bucket;
    }

    private function get_auth(){
        // 用于签名的公钥和私钥
        $accessKey = 'O1G6HB3YePMqp1q1WDzPoAxGk9LhQciFUv3vzhSd';
        $secretKey = 'QJ1bQIlR1QD_bEM6rBEfOxdltJzoPA2So3KFCXOW';
        // 初始化签权对象
        $auth = new \Qiniu\Auth($accessKey, $secretKey);
        return $auth;
    }

    public function fileList($mark_s)
    {
        $auth = $this->get_auth();
        $upToken = $auth->uploadToken($this->bucket);
        $bucketMgr = new \Qiniu\Storage\BucketManager($auth);

        $marker = $mark_s;
        $limit = 20;
        list($iterms, $marker, $err) = $bucketMgr->listFiles($this->bucket, $this->prefix, $marker, $limit);
        return [$upToken, $iterms, $marker, $err];
    }

    public function fileDel($file)
    {
        $auth = $this->get_auth();
        $upToken = $auth->uploadToken($this->bucket);

        $bucketMgr = new \Qiniu\Storage\BucketManager($auth);
        //你要测试的空间， 并且这个key在你空间中存在
        $key = $this->prefix.$file;

        //删除$bucket 中的文件 $key
        return $bucketMgr->delete($this->bucket, $key);
    }
    public function fileUp($path, $to_path, $upToken = '')
    {
        if ($upToken === '') {
            $auth = $this->get_auth();
            $upToken = $auth->uploadToken($this->bucket);
        }
       
        // 要上传文件的本地路径
        $filePath = $path;

        // 上传到七牛后保存的文件名
        $key = $this->prefix.$to_path;

        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new \Qiniu\Storage\UploadManager();

        // 调用 UploadManager 的 putFile 方法进行文件的上传
        // [ret, err]
        return $uploadMgr->putFile($upToken, $key, $filePath);
    }
    public function get_img_token()
    {
        $auth = $this->get_auth();
        $upToken = $auth->uploadToken($this->bucket);
        return $upToken;
    }
}