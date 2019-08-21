FROM mikegeorgeff/php:worker

COPY ./.docker/worker/supervisord.conf /etc/supervisor/conf.d/worker.conf
COPY ./.docker/worker/before_live /opt/nanobox/hooks/before_live

RUN chmod +x /opt/nanobox/hooks/before_live

COPY . /app 