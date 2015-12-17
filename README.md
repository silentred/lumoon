#Lumoon

Lumen on Swoole

## Depends On

- php >= 5.5.9
- laravel/lumen > 5.1.*
- ext-swoole >= 1.7.19


##Install

```shell
 composer require silentred/lumoon
```

Because Lumen does not use Http Kernel, you have to create a subclass of `\Laravel\Lumen\Application` under `app` directory.
In `bootstrap` directory, change Application in app.php to the new one as `App\Application`

##Usage

```shell
 vendor/bin/lumoon start | stop | reload | restart | quit
```

##Config

In .env , use LUMOON_* to config swoole server. For example

```
LUMOON_REACTOR_NUM=1
LUMOON_WORKER_NUM=4
LUMOON_BACKLOG=128
LUMOON_DISPATCH_MODE=1
```


###pid_file
-----------

```INI
 LUMOON_PID_FILE=/path/to/lumoon.pid
```
default is at /lumen/storage/logs/swoole.pid

###gzip
-------

```INI
 LUMOON_GZIP=1
```

level is in the range from 1 to 9, bigger is compress harder and use more CPU time.

```INI
 LUMOON_GZIP_MIN_LENGTH=1024
```

Sets the mINImum length of a response that will be gzipped.

###deal\_with\_public
---------------------

Use this ***ONLY*** when developing

```INI
 LUMOON_DEAL_WITH_PUBLIC=true
```

###Swoole
---------

Eexample:

```INI
 LUMOON_HOST=0.0.0.0
```

Default host is 127.0.0.1:9050

See Swoole's document:

[简体中文](http://wiki.swoole.com/wiki/page/274.html)

[English](https://cdn.rawgit.com/tchiotludo/swoole-ide-helper/dd73ce0dd949870daebbf3e8fee64361858422a1/docs/classes/swoole_server.html#method_set)

##Work with nginx
-----------------

```Nginx
server {
	listen       80;
	server_name  localhost;

	root /path/to/lumoon/public;

	location ~ \.(png|jpeg|jpg|gif|css|js)$ {
		break;
	}

	location / {
		proxy_set_header   Host $host:$server_port;
		proxy_set_header   X-Real-IP $remote_addr;
		proxy_set_header   X-Forwarded-For $proxy_add_x_forwarded_for;
		proxy_http_version 1.1;

		proxy_pass http://127.0.0.1:9050;
	}
}
```

#License
[MIT](LICENSE)
