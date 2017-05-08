FROM nginx:1.13-alpine

# Remove default nginx configs
RUN rm -f /etc/nginx/conf.d/*
RUN rm -f /etc/nginx/nginx.conf

# Add configuration files.
COPY nginx.conf /etc/nginx/nginx.conf
COPY 00-alpine.conf /etc/sysctl.d/

EXPOSE 80 443