FROM nginx:1.13-alpine

# Remove default configuration
RUN rm -f /etc/nginx/conf.d/*
RUN rm -f /etc/nginx/nginx.conf

# Add configuration
COPY shared.conf /etc/nginx/
COPY nginx.conf /etc/nginx/
COPY 00-alpine.conf /etc/sysctl.d/

EXPOSE 80 443