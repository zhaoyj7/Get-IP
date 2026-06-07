<?php
namespace app\service;

class IPRegionService
{
    /**
     * @title 返回IP对应地区名称
     * @desc 返回IP对应地区名称
     * @author zhaoyj
     * @version v1
     * @param string $ipAddr - ip地址
     * @return array
     * @return string Country - 国家
     * @return string Province - 省
     * @return string City - 市
     */
    public function GetInfo($ipAddr)
    {
        $IP2Region = new \Ip2Region('file');
        $IPInfo = $IP2Region->getIpInfo($ipAddr);
        $Country = $IPInfo['country'];
        $Province = $IPInfo['province'];
        $City = $IPInfo['city'];
        if (in_array("Reserved", [$Country, $Province, $City])) {
            $result = "PrivateIP";
        } else $result = ['Country'=>$Country,'Province'=>$Province,'City'=>$City];
        return $result;
    }
}