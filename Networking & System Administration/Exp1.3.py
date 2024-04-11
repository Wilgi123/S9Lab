import subprocess
def nslookup(host):
    result=subprocess.run(['nslookup',host],capture_output=True,text=True)
    return result.stdout
host_to_nslookup='google.com'
print(nslookup(host_to_nslookup))