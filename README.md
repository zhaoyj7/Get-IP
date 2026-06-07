# IP-Api
- 使用thinkphp8构建的获取访问ip的api, 可用于动态ip的ddns
## 调用方式
- /api/v1/ip
## Demo Api
- https://api.silveridc.cn/api/v1/ip
## 安装
- php要求:8.0以上,需要fileinfo扩展,推荐安装opcache扩展
- 下载本项目源码 或使用```git clone https://github.com/zhaoyj7/IP-Api.git``` ,然后在源码目录下 运行composer install即可
## 服务器url重写配置
### Nginx
请复制以下内容至你的server block中
```nginx
location / {
  if (!-e $request_filename) {
    rewrite ^(.*)$ /index.php?s=$1 last;
  break;
  }
}
```
### Apache
- public下已有htaccess
## 使用btpanel 
- 请在网站->添加站点新建 PHP版本8.0+
- 创建完成后 在网站的配置->网站目录->运行目录下 把/选择为/public
- 若使用nginx 请 在新建的这个站点的配置->伪静态内 填入上方nginx的url重写配置
## 内嵌server
- 命令行执行composer install后,不要退出目录 在目录下 执行php think run命令即可启动
- 若默认端口提示被占用 可执行php think run -p 你要指定的端口
## 致谢:
[thinkphp](https://github.com/top-think/think)
[think-orm](https://github.com/top-think/think-orm)
[think-helper](https://github.com/top-think/think-helper)
[think-trace](https://github.com/top-think/think-helper)
[think-filesystem](https://github.com/top-think/think-filesystem)
[think-view](https://github.com/top-think/think-view)
[think-dumper](https://github.com/top-think/think-dumper)
[IP2Region](https://github.com/zoujingli/ip2region)
欢迎提交 Issue 或 pr 来帮助改进项目。
