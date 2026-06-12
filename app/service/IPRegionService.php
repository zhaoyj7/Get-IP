<?php
namespace app\api\services;

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
    public function GetInfo(string $ipAddr)
    {
        $IP2Region = (new \Ip2Region('file', root_path().'extend/ip2region_v4.xdb', root_path().'extend/ip2region_v6.xdb'))->getIpInfo($ipAddr);
        $Country = $IP2Region['country'];
        $Province = $IP2Region['province'];
        $City = $IP2Region['city'];
        $ISP = $IP2Region['isp'];
        if (in_array("Reserved", [$Country, $Province, $City])) {
            $result = "PrivateIP";
        } else $result = ['Country'=>$Country,'Province'=>$Province,'City'=>$City,'ISP'=>$ISP];
        return $result;
    }
}
