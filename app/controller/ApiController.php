<?php
namespace app\controller;
use app\service\IPRegionService;
use think\facade\Lang;

class ApiController extends BaseController
{
    public function initialize()
    {
        parent::initialize();
        Lang::load('../lang/zh-cn.php');
        $this->IPRegionService = new IPRegionService();
    }
    /**
     * @title 获取访问ip
     * @desc 获取访问ip
     * @author zhaoyj
     * @version v1
     * @url /api/v1/ip
     * @method get
     * @return json
     * @return int status - 状态码,200ok
     * @return string messages - 提示信息
     * @return string ip - ip地址
     * @return info.Country - 国家
     * @return info.Province - 省
     * @return info.City - 市
     * @noinspection PhpUndefinedClassInspection
     */
    public function GetIP()
    {
        $ip = $this->request->ip();
        $result = [
            "status" => 200,
            "messages" => lang("success_message"),
            "ip" => $ip,
            "info" => $this->IPRegionService->GetInfo($ip),
            "time" => time(),
        ];
        //返回数据
        return json($result);
    }
}
