import subprocess

def execute_command(command):
    try:
        output = subprocess.check_output(command, shell=True, stderr=subprocess.STDOUT, universal_newlines=True)
        print(output)
    except subprocess.CalledProcessError as e:
        print(f"Command execution failed with error: {e.returncode}\n{e.output}")

# Example usage
command_to_execute = """apt-get install -y apt-utils autoconf automake build-essential git libcurl4-openssl-dev libgeoip-dev liblmdb-dev libpcre++-dev libtool libxml2-dev libyajl-dev pkgconf wget zlib1g-dev && git clone --depth 1 -b v3/master --single-branch https://github.com/SpiderLabs/ModSecurity 
"""
execute_command(command_to_execute)
