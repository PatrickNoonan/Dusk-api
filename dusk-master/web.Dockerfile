FROM mikegeorgeff/php:fpm

LABEL io.nanobox.http_port="80" \
	  io.nanobox.force_ssl="true"

COPY ./.docker/web/vhost.conf /etc/nginx/conf.d/default.conf
COPY ./.docker/web/before_live /opt/nanobox/hooks/before_live

RUN chmod +x /opt/nanobox/hooks/before_live

COPY --chown=www-data:www-data . /app