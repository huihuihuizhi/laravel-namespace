//虚拟主机的搭建（用域名去访问）
1.修改apache配置文件
Include conf/extra/httpd-vhosts.conf #找到该行 将该行前面的#去掉.

2.修改虚拟主机子配置文件 (D:\wamp\bin\apache\apache2.4.17\conf\extra\httpd-vhosts.conf)
<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "D:/wamp/www/two-namespace"  #网站根目录
    ServerName namespace.com    #域名
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>

3.重启wampserver

4.域名解析 修改hosts文件
文件位置  C:\Windows\System32\drivers\etc\hosts
如果不能修改该文件
a)  右键 --- > 将只读属性清除.
b)  右键 --- > 安全 -> 编辑 -> 将用户的权限来个完全控制.
修改内容
127.0.0.1   namespace.com


访问时可以用域名访问：namespace.com