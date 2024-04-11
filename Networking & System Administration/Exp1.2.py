import subprocess
def traceroute(host):
    result=subprocess.run(['tracert',host],capture_output=True,text=True)
    return result.stdout
host_to_traceroute='google.com'
print(traceroute(host_to_traceroute))