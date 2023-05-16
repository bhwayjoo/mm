import subprocess

def execute_command(command):
    try:
        output = subprocess.check_output(command, shell=True, stderr=subprocess.STDOUT, universal_newlines=True)
        print(output)
    except subprocess.CalledProcessError as e:
        print(f"Command execution failed with error: {e.returncode}\n{e.output}")

# Example usage
command_to_execute = """ apt-get update &&  apt-get install build-essential libpcre3 libpcre3-dev libssl-dev zlib1g-dev && wget https://nginx.org/download/nginx-1.22.1.tar.gz && wget https://github.com/nbs-system/naxsi/archive/1.3.tar.gz -O naxsi-1.3.tar.gz && tar -zxvf nginx-1.22.1.tar.gz && tar -zxvf naxsi-1.3.tar.gz && cd nginx-1.22.1 && ./configure --conf-path=/etc/nginx/nginx.conf --add-module=../naxsi-1.3/naxsi_src/ \
  --error-log-path=/var/log/nginx/error.log --http-client-body-temp-path=/var/lib/nginx/body \
  --http-fastcgi-temp-path=/var/lib/nginx/fastcgi --http-log-path=/var/log/nginx/access.log \
  --http-proxy-temp-path=/var/lib/nginx/proxy --lock-path=/var/lock/nginx.lock \
  --pid-path=/run/nginx.pid --user=www-data --group=www-data --with-http_ssl_module \
  --without-mail_pop3_module --without-mail_smtp_module --without-mail_imap_module \
  --without-http_uwsgi_module --without-http_scgi_module --with-openssl=../openssl 

"""
execute_command(command_to_execute)
