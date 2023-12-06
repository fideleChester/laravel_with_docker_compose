FROM nginx:latest
COPY ./conf.d/* /etc/nginx/conf.d/
ENTRYPOINT ["nginx","-g", "daemon off;"]

