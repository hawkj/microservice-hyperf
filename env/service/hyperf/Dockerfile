FROM hyperf/hyperf:7.4-alpine-v3.11-swoole
MAINTAINER 89424619@qq.com
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories && apk add --no-cache $PHPIZE_DEPS && apk add linux-headers && apk add yaml-dev
# process 1
COPY file/ping.php /usr/local/bin/ping.php
# extention:swoole_tracker74
COPY file/extension/conf.d/50_swoole_tracker74.ini /etc/php7/conf.d/50_swoole_tracker74.ini
COPY file/extension/modules/swoole_tracker74.so /usr/lib/php7/modules/swoole_tracker74.so
# extention:yaml
COPY file/extension/conf.d/50_yaml.ini /etc/php7/conf.d/50_yaml.ini
COPY file/extension/modules/yaml.so /usr/lib/php7/modules/yaml.so




